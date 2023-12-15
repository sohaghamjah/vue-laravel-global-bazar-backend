<?php

namespace App\Http\Resources\Seller;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Seller\SellerProductsResource;

class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'email'          => $this->email,
            'phone'          => $this->phone,
            'image'          => $this->image,
            'shop_name'      => $this->shop_name,
            'slug'           => $this->slug,
            'products_count' => $this->whenCounted('products'),
            // 'products'       => $this->when($request->slug, SellerProductsResource::collection($this->products)),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
