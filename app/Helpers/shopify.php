<?php
use URL;
function getRedirectRoute($routeName, $params = [])
{
    $path = URL::tokenRoute($routeName, $params);
    //replace http with https
    $path = str_replace("http", "https", $path);
    $path .= "&host=".base64_encode("admin.shopify.com/store/".env("SHOPIFY_SHOP"));
    return $path;
}

function getHost(){
    return base64_encode("admin.shopify.com/store/".env("SHOPIFY_SHOP"));
}
