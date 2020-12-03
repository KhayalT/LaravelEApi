<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalprice' => round((1 - $this->discount / 100) * $this->price, 2),
            'rating' => $this->review->count() > 0 ? round($this->review->sum('star') / $this->review->count(), 2)
                : 'No Rating Yet!',
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show', $this->id)

            ],
        ];
    }
}
