<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function page(): View
    {
        $user = auth()->user();
        $settings = $user->settings();
        $generalSettings = $settings->general ?? [];

        return view('settings', compact('generalSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'general-faq' => 'required|boolean',
            'product-faq' => 'required|boolean',
        ]);

        $faq = [
            'faq' => [
                'general' => $request->integer('general-faq'),
                'product' => $request->integer('product-faq'),
            ],
        ];

        $shop = $request->user();

        $setting = $shop->settings()->updateOrCreate([
            'shop_id' => $shop->id,
            'shop_shopify_id' => $shop->shopify_id,
        ], [
            'general' => $faq,
        ]);

        if ($setting) {
            $this->addMetafields($shop, $faq);
        }

        //TODO: update data to shopify metafields

        return Redirect::tokenRedirect('setting.index');
    }


    protected function addMetafields(User $shop, array $data)
    {

        $metafieldsData = [
            "namespace" => "ostad",
            "key" => "settings",
            "value" => json_encode($data),
            "type" => "json",
            "ownerId" => "gid://shopify/Shop/{$shop->shopify_id}",
        ];

        $shop->api()->graph(require resource_path('views/graphql/metafield.graph.php'), [
            'metafields' => $metafieldsData,
        ]);
    }
}
