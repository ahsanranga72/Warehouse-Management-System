<?php

namespace Modules\ParchaseStatus\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseStatus extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\ParchaseStatus\Database\factories\PurchaseStatusFactory::new();
    }
}
