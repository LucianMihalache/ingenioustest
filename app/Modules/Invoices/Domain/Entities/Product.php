<?php

namespace App\Modules\Invoices\Domain\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;

    /**
     * @var array
     */
    protected $guarded = [];
}
