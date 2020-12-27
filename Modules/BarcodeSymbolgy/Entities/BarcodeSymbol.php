<?php

namespace Modules\BarcodeSymbolgy\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarcodeSymbol extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\BarcodeSymbolgy\Database\factories\BarcodeSymbolFactory::new();
    }
}
