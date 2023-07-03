<?php

namespace App\Modules\Invoices\Domain\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasUuids;

    /**
     * @var string
     */
    protected $table = 'companies';

    /**
     * @var array
     */
    protected $guarded = [];
}
