<?php

namespace App\Utilities;

use Illuminate\Support\Facades\URL;
use Osiset\ShopifyApp\Macros\TokenUrl;

/**
 * Method for generating a URL to the token route.
 * Used for non-SPAs.
 */
class ShopifyRoute extends TokenUrl
{
    /**
     * Return a URL to token path with shop and target (for redirect).
     *
     * @param string $route    The route name.
     * @param array  $params   Additional route params.
     * @param bool   $absolute Absolute or relative?
     *
     * @example `URL::tokenRoute('orders.view', ['id' => 1]);`
     * @example `<a href="{{ URL::tokenRoute('orders.view', ['id' => 1]) }}">Order #1</a>`
     *
     * @return string
     */
    public function __invoke(string $route, array $params = [], bool $absolute = true): string
    {
        [$url, $params] = $this->generateParams($route, $params, $absolute);
        if (request()->has('token')) {
            $params['token'] = request()->get('token');
        }

        return URL::route($route, $params);
    }
}
