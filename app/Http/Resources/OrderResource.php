<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            'order' => $this->order,
            'address' => $this->address,
            'phone' => $this->phone,
            'note' => $this->note,
            'products' => $this->products,
            'discount' => $this->discount,
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'state' => $this->state,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'delivery_address' => $this->delivery_address,
            'delivery_address2' => $this->delivery_address2,
            'delivery_city' => $this->delivery_city,
            'delivery_postal' => $this->delivery_postal,
            'delivery_building_no' => $this->delivery_building_no,
            'payment_method' => $this->payment_method,
            'invoice_id' => $this->invoice_id,
            'paid' => $this->paid,
            'created_at' => $this->created_at->format('F d, Y'),

        ];
    }
}
