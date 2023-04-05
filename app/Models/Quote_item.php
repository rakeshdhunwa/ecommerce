<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote_item extends Model
{
    use HasFactory;
    protected $table = 'quote_items';
    protected $fillable = [
        'quote_id',
        'product_id',
        'name',
        'sku',
        'price',
        'qty',
        'row_total',
    ]; 
    public function products(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
