<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function showGeneralFaqWidget(): View
    {
        $shop = User::where('name', \request()->get('shop'))->firstOrFail();

        $setting = $shop->settings;

        $faqs = Faq::where('shop_id', $shop->id)
            ->where('group_id', 1)
            ->get();

        return view('storefront.general-widget', compact('faqs', 'setting'));
    }
}
