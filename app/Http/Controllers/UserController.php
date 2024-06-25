<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show_meals(){
        $pro=Product::all();
        return view('users.meals',compact('pro'));    
    }
    public function order($id){
        // return $id;
        $pro=Product::where('id',$id)->first();
        if(auth()->user()){
            $user=Auth::user();
        return view('users.order_meal',compact('pro','user'));
    }
    else {
        return  view('users.order_meal_not_auth',compact('pro'));

    }}

    public function show_old_orders($id){
        $d=Order::where('user_id',$id)->get();
        return view('users.old_orders',compact('d'));
    }
    public function show_admins(){
        $users=User::all();
        return view('admin.show_users',compact('users'));
    }

    public function create_user(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'status'=>'required'
        ],[
            'name.required'=>'يرجى ادخال اسم المستخدم',
            'email.required'=>'يرجى ادخال ايميل المستخدم',
            'email.unique'=>'الايميل موجود سابقا',
            'password.required'=>'يرجى ادخال كلمة مرور المستخدم',
            'password.min'=>'كلمة مرور قصيرة',
            'status.required'=>'يرجى تحديد نوع المستخدم'
        ]);
        $status=1;
        if($request->status=='admin')$status=0;
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'status'=>$status
        ]);
        Alert::success('تم اضافة المستخدم بنجاح',$request->name);
        return redirect()->back();

    }
    public function edit_user($id){
        $user=User::where('id',$id)->first();
        return view('admin.update_user',compact('user'));
    }
    public function update_user(Request $request,$id){
        $status=1;
        if($request->status=='admin')$status=0;
        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'status'=>$status,
        ]);
        Alert::info('تم تعديل المستخدم بنجاح',$request->name);
        return redirect()->route('show_admins');
    }
    public function delete_user($id){
        $user=User::where('id',$id)->first();
        User::where('id',$id)->delete();
        Alert::warning('تم حذف المستخدم',$user->name);
        return redirect()->back();
    }

}
