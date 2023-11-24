<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use URL;
use App\Models\Faq;

class DummyController extends Controller
{
    function theCurrentShop(Request $request){
        // $shop = $request->user();
        // $domain = $shop->getDomain()->toNative();
        // $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];
        // return response($shopApi,200);
        return view('shop.form');
    }

    function handlePost(Request $request){
        // $name = $request->input('name');
        // $description = $request->input('description');
        // $shop = $request->user();
        // $domain = $shop->getDomain()->toNative();


        // return response([
        //     'name' => $name,
        //     'description' => $description,
        //     'domain' => $domain
        // ],200);

        // $path = URL::tokenRoute('group.index');
        // //replace http with https
        // $path = str_replace("http","https",$path);
        // $path= $path."&host=YWRtaW4uc2hvcGlmeS5jb20vc3RvcmUvb3N0YWRzdG9yZTE2";
        // return view('utils.redirect',[
        //     'path' => $path
        // ]);
        $path = getRedirectRoute('group.index');

        return redirect($path);
    }

    function submissionHandler(Request $request){
        $shop = $request->user();
        $domain = $shop->getDomain()->toNative();
        $id = $shop->getId()->toNative();
        // $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];
        // // return response($shopApi,200);
        return response([
            'domain' => $domain,
            'id' => $id
        ],200);
    }

    function redirectTest(){
        return redirect()->tokenRedirect("shop.submission");
    }

    function checkAuth(Request $request){
        $shop = $request->user();
        $domain = $shop->getDomain()->toNative();
        $id = $shop->getId()->toNative();
        // $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body']['shop'];
        // // return response($shopApi,200);
        return response([
            'domain' => $domain,
            'id' => $id
        ],200);
    }



}
