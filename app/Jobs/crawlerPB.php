<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Product;
use App\Product_description;
use bbstudios\ExItem;

class crawlerPB implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $item = new ExItem(html_entity_decode($this->product->description->name));
//
        $this->product->mpn = $item->grabMpn();
        $this->product->save();
        echo Carbon::now();
        echo $this->product->model.'-'.$this->product->mpn;
        echo '<br>';
//        Log::info(Carbon::now());
    }
}
