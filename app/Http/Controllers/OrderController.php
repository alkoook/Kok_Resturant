<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Events\Old_Orders;


class OrderController extends Controller
{
    public function show_orders()
    {
        $data=Order::all();
    
       return view('admin.show_orders', compact('data'));

    }
    public function create_order(Request $request){
        //return $request;
        $request->validate([
            'phone'=>'required|phone:SY,IQ',
            'address'=>'required|min:10',
            'history'=>'required',
            'time'=>'required',
            'count'=>'required'
        ],[
            'phone.required'=>'يرجى ادخال رقم هاتف صالح',
            'phone.phone'=>' فقط ارقام سوريةأو عراقية' ,
            'phone.phone:IQ'=>'  فقط ارقام عراقية' ,
            'address.required'=>'يرجى ادخال العنوان',
            'address.min'=>'العنوان قصير و غير واضح',
            'history.required'=>'يرجى ادخال تاريخ التسليم',
            'time.required'=>'يرجى ادخال وقت التسليم',
            'count.required'=>'يرجى تحديد عدد الوجبات',
            
        ]);
        // 
        $sum=$request->price*$request->count;
        $user_id=User::where('email',$request->user_email)->first()->id;
        Order::create([
            'user_name'=>$request->user_name,
            'user_email'=>$request->user_email,
            'meal_name'=>$request->meal_name,
            'phone'=>$request->phone,
            'history'=>$request->history,
            'time'=>$request->time,
            'count'=>$request->count,
            'address'=>$request->address,
            'price'=>$request->price,
            'sum'=>$sum,
            'user_id'=>$user_id 
        ]);
        Alert::success('لقد تم اضافة الطلب',$request->name);
        return redirect()->route('main');
    }
    public function accept_order($id){
        Order::where('id',$id)->update([
            'status'=>'يتم تحضير الطلب'
        ]);
        $info=Order::where('id',$id)->first();
        alert::success('يتم تحضير الطلب',$info->meal_name.$info->count."x");
        return back();
    }  
      public function delete_order($id){
        $info=Order::where('id',$id)->first();
        Order::where('id',$id)->delete();
        alert::warning('لقد تم حذف الطلب',$info->meal_name.$info->count."x");
        return back();
    }  
      public function success_order($id){
        $info=Order::where('id',$id)->first();
        Order::where('id',$id)->update([
            'status'=>'تم تسليم الطلب'
        ]);
        alert::info('تم تسليم الطلب',$info->meal_name.$info->count."x");
        return back();
    }  
    }
