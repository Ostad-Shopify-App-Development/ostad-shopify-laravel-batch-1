<?php

namespace App\Http\Controllers;

use Osiset\ShopifyApp\Storage\Models\Plan;

class BillingController extends Controller
{
    public function getPricingPlans()
    {
        $plans = Plan::all();

        return view('pricing', compact('plans'));
    }
}
