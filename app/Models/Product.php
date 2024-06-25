<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cat;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id', 'name', 'price', 'content','cat_id','photo', 'created_at', 'updated_at'];
    protected $table='products';
    public function order(){
        $this->hasMany(Order::class);
    }
    public function cat(){
        $this->beLongsTo(Cat::class);
    }
}
