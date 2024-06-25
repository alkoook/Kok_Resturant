<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Cat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function show_meals(){
        $pro=Product::all();
        $cats=Cat::all();
        return view('admin.show_meals',compact(['cats','pro']));
    }
    public function create_meal(Request $request){

        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'content'=>'required|min:20',
            'category'=>'required',
            'photo'=>'required'
        ],[
            'name.required'=>'يرجى ادخال اسم الوجبة',
            'price.required'=>'يرجى ادخال سعر الوجبة',
            'price.numeric'=>'يجب ادخال أرقام حصرا',
            'content.required'=>'يرجى ادخال تفاصيل الوجبة',
            'category.required'=>'يرجى تحديد الصنف',
            'photo.required'=>'يرجى ادخال صورة الوجبة',
            

        ]);
        $image=$request->file('photo')->getClientOriginalName();
       $cat_id= DB::table('cats')->where('name',$request->category)->first();
        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'content'=>$request->content,
            'cat_id'=>$cat_id->id,
            'photo'=>$image
        ]);
       $request->file('photo')->storeAs('/',$image,'kok');
        Alert::success('لقد تم ادخال الوجبة بنجاح',$request->name);
        return redirect()->route('show_meals');
    }
    public function delete_meal($id){
    
        $pro=Product::where('id',$id)->first();
       Storage::disk('kok')->delete($pro->photo);
        Product::destroy($id);
        Alert::warning('لقد تم حذف',$pro->name);
        return redirect()->back();
    }
    public function edit_meal($id){
        $cats=Cat::all();
        $pro=Product::where('id',$id)->first();
        return view('admin.edit_meal',compact('cats','pro'));
    }
    public function update_meal($id, Request $request){
        $pro=Product::where('id',$id)->first();
        Storage::disk('kok')->delete($pro->photo);
      $request->validate([
            'name'=>'required',
            'price'=>'required',
            'content'=>'required',
            'photo'=>'required',
            'category'=>'required'
        ],[
            'name.required'=>'يرجى تحديث اسم الوجبة',
            'price.required'=>'يرجى تحديث سعر الوجبة',
            'price.numeric'=>'يجب ادخال أرقام حصرا',
            'content.required'=>'يرجى تحديث تفاصيل الوجبة',
            'category.required'=>'يرجى تحديد الصنف',
            'photo.required'=>'يرجى تحديث صورة الوجبة',
        ]);
      $file=$request->file('photo')->getClientOriginalName();
        $cat_id=Cat::where('name',$request->category)->first();
        $data['name']=$request->name;
        $data['price']=$request->price;
        $data['content']=$request->content;
        $data['photo']=$file;
        $data['cat_id']=$cat_id->id;
        Product::where('id',$id)->update($data);
      $request->file('photo')->storeAs('/',$file,'kok');
     
        return redirect()->route('show_meals');
    }
}
