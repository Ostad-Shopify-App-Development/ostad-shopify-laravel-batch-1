<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Osiset\ShopifyApp\Actions\AuthenticateShop;
use Osiset\ShopifyApp\Exceptions\MissingAuthUrlException;
use Osiset\ShopifyApp\Exceptions\MissingShopDomainException;
use Osiset\ShopifyApp\Exceptions\SignatureVerificationException;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use Osiset\ShopifyApp\Util;

class AuthController extends Controller
{
    /**
     * Installing/authenticating a shop.
     *
     * @throws MissingShopDomainException if both shop parameter and authenticated user are missing
     *
     * @return View|RedirectResponse
     */
    public function authenticate(Request $request, AuthenticateShop $authShop)
    {
        if ($request->missing('shop') && !$request->user()) {
            // One or the other is required to authenticate a shop
            throw new MissingShopDomainException('No authenticated user or shop domain');
        }

        // Get the shop domain
        $shopDomain = $request->has('shop')
            ? ShopDomain::fromNative($request->get('shop'))
            : $request->user()->getDomain();

        // If the domain is obtained from $request->user()
        if ($request->missing('shop')) {
            $request['shop'] = $shopDomain->toNative();
        }

        // Run the action
        [$result, $status] = $authShop($request);

        if ($status === null) {
            // Show exception, something is wrong
            throw new SignatureVerificationException('Invalid HMAC verification');
        } elseif ($status === false) {
            if (!$result['url']) {
                throw new MissingAuthUrlException('Missing auth url');
            }

            $shopDomain = $shopDomain->toNative();
            $shopOrigin = $shopDomain ?? $request->user()->name;

            return \view(
                'shopify-app::auth.fullpage_redirect',
                [
                    'apiKey' => Util::getShopifyConfig('api_key', $shopOrigin),
                    'appBridgeVersion' => Util::getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '',
                    'authUrl' => $result['url'],
                    'host' => $request->get('host'),
                    'shopDomain' => $shopDomain,
                ]
            );
        } else {
            logger('Authenticated shop', ['shop_domain' => $shopDomain->toNative()]);
            $shop = User::where('name', $shopDomain->toNative())->first();

            if ($shop) {
                $this->afterAuth($shop);
            }

            return Redirect::route(
                Util::getShopifyConfig('route_names.home'),
                [
                    'shop' => $shopDomain->toNative(),
                    'host' => $request->get('host'),
                ]
            );
        }
    }

    protected function afterAuth(User $shop)
    {
        $resp = $shop->api()->rest('GET', '/admin/shop.json');
        $shopData = $resp['body']->shop;
        $shop->shopify_id = $shopData->id;
        $shop->save();

    }

    protected function addMetafields(User $shop)
    {

        $metafieldsData = [
            "namespace" => "ostadapp",
            "key" => "settings",
            "value" => json_encode(['widget' => ['status' => 1]]),
            "type" => "json",
            "ownerId" => "gid://shopify/Shop/{$shop->shopify_id}",
        ];
        $shop->api()->graph(require resource_path('views/graphql/metafield.graph.php'), [
            'metafields' => $metafieldsData,
        ]);
    }


}
