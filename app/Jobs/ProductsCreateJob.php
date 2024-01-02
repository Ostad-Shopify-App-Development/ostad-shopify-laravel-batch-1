<?php namespace App\Jobs;

use App\Models\Product;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Osiset\ShopifyApp\Objects\Values\ShopDomain;
use stdClass;

class ProductsCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Shop's domain
     * @var ShopDomain|string
     */
    public ShopDomain|string $shopDomain;

    /**
     * The webhook data
     *
     * @var object
     */
    public object $data;

    /**
     * Create a new job instance.
     * @param string   $shopDomain The shop domain.
     * @param object $data The webhook data (JSON decoded).
     * @return void
     */
    public function __construct(string $shopDomain, object $data)
    {
        $this->shopDomain = $shopDomain;
        $this->data = $data;
    }

    /**
     * Execute the job.
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        $shop  = \App\Models\User::where('name', $this->shopDomain)->firstOrFail();
        $productModel = new Product();
        $product = $productModel->where('shopify_id', $this->data->id)->where('shop_id', $shop->id)->first();

        if ($product) {
            $product->update([
                'handle' => $this->data->handle,
                'name' => $this->data->title,
            ]);

            return;
        }

        $productModel->fill([
            'shopify_id' => $this->data->id,
            'shop_id' => $shop->id,
            'handle' => $this->data->handle,
            'name' => $this->data->title,
        ]);

        $productModel->save();
    }
}
