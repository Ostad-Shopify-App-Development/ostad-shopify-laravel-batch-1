<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Osiset\ShopifyApp\Storage\Models\Plan;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Plan::truncate();

        $plansData = [
            [
                "type" => "RECURRING",
                "name" => "Starter",
                "price" => 9.99,
                "interval" => "EVERY_30_DAYS",
                "capped_amount" => 20,
                "terms" => "No extra charges are applied. You'll be notified once you reach the monthly review request email limit and you can decide whether to upgrade.",
                "test" => true,
                "trial_days" => 7,
                "on_install" => false,
            ],  [
                "type" => "RECURRING",
                "name" => "Gold",
                "price" => 19.99,
                "interval" => "EVERY_30_DAYS",
                "capped_amount" => 50,
                "terms" => "No extra charges are applied. You'll be notified once you reach the monthly review request email limit and you can decide whether to upgrade.",
                "test" => true,
                "trial_days" => 7,
                "on_install" => false,
            ],
        ];

        foreach ($plansData as $planData) {
            $plan = new Plan();
            $plan->fill($planData);

            $plan->save();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
