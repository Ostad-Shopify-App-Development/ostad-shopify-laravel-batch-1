<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

function getRedirectRoute($routeName, $params = []) {
    $shop = Auth::user();
    $shopDomain = str_replace(".myshopify.com", "", $shop->getDomain()->toNative());
    $path = URL::tokenRoute($routeName, $params);
    //replace http with https
    $path = str_replace("http", "https", $path);
    $path .= "&host=" . base64_encode("admin.shopify.com/store/" . $shopDomain);
    return $path;
}

function getHost() {
    $shop = Auth::user();
    $shopDomain = str_replace(".myshopify.com", "", $shop->getDomain()->toNative());
    return ("admin.shopify.com/store/" . $shopDomain);
}
