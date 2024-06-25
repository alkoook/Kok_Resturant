<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cat extends Model
{
    use HasFactory;
    protected $fillable=['id', 'name'];
    protected $table='cats';
    public function products()
    {
        $this->hasMany(Product::class);
    }
}
