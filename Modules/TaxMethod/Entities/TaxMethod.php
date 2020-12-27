<?php

namespace Modules\TaxMethod\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxMethod extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\TaxMethod\Database\factories\TaxMethodFactory::new();
    }
}
