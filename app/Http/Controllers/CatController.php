<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;



class CatController extends Controller
{
    public function show_cats(){
        $cats=Cat::all();
        return view('admin.show_cats',compact('cats'));
    }
    public function create(Request $request){
        
        $request->validate([
            'name'=>'required',
        ],['name.required'=>'يرجى ادخال الصنف']);


        Cat::create(['name'=>$request->name]);
        Alert::success('تم ادخال الصنف بنجاح',$request->name);

        return redirect()->back();
    }


    public function delete($id){
    // $cat_name=Cat::where('id',$id)->get('name');
    // $sub1=substr($cat_name,10,20);
    $cat=Cat::find($id);
    Cat::destroy($id);
   Alert::warning('لقد تم حذف',$cat->name);
    return redirect()->back();
    }


    public function edit($id){
        $cat=Cat::find($id);
        return view('admin.edit_cats',compact('cat'));
    }


    public function update($id , Request $req)
    {
 
        $req->validate([
            'name'=>'required',
        ],['name.required'=>'يرجى تعديل الصنف']);
        $data['name']=$req->name;
        
        $old=Cat::find($id);
        Cat::where('id',$id)->update($data);
        Alert::info('تم التعديل بنجاح'," من ". $old->name.' الى '.$req->name);
        return redirect()->route('show_cats');
    }
    
}
