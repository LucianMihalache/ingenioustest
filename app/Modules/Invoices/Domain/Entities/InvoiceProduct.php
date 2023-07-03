<?php

namespace App\Modules\Invoices\Domain\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InvoiceProduct extends Pivot
{
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'invoice_product_lines';

    /**
     * @var array
     */
    protected $guarded = [];
}
