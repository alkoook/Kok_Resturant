<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use app\Model\Product;
use app\Model\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['id','user_name','user_email','meal_name', 'phone', 'history','price', 'time', 'count', 'sum', 'address', 'status', 'user_id' ,'created_at', 'updated_at'];
    protected $table='orders';
    public function user(){
        $this->belongsTo(User::class);
    }
}
