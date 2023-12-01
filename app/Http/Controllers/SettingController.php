<?php

namespace App\Http\Controllers;

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

        $user = $request->user();

        $user->settings()->updateOrCreate([
            'shop_id' => $user->id,
            'shop_shopify_id' => $user->shopify_id,
        ], [
            'general' => [
                'faq' => $faq,
            ],
        ]);

        //TODO: update data to shopify metafields

        return Redirect::tokenRedirect('setting.index');
    }
}
