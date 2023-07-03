<?php

namespace App\Modules\Invoices\Application\Mapper;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        $products = ProductResource::collection($this->products);
        return [
            'number' => $this->number,
            'created_at' => $this->created_at,
            'due_date' => $this->due_date,
            'total_price' => $this->products->sum(function ($product) {
                return $product->price * $product->quantity;
            }),
            'company' => new CompanyResource($this->company),
            //'billed_company' => new CompanyResource($this->company), // Missing billing company in the provided structure&data
            'products' => $products,
        ];
    }
}
