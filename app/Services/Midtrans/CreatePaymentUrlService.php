<?php

namespace App\Services\Midtrans;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Midtrans\Snap;

class CreatePaymentUrlService extends Midtrans
{
    protected $order;

    public function __construct()
    {
        parent::__construct();

        // $this->order = $order;
    }

    public function getPaymentUrl($order)
    {
        $items_detail = new Collection();

        foreach ($order->orderItems as $item) {
            // Product search by product_id
            $product = Product::find($item->product_id);

            $items_detail->push([
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => $item->quantity,
                'name' => $product->name,
            ]);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->number,
                'total_price' => $order->total_price,
            ],
            'item_details' => $items_detail,
            'customer_details' => [
                'name' => $order->user->name,
                'email' => $order->user->email,
            ]
        ];

        $paymentUrl = Snap::createTransaction($params)->redirect_url;

        return $paymentUrl;
    }
}
