@extends('admin.admin_dashboard')

@section('content')
    <div class="con" style="position: relative;">
        <form action="{{ROUTE('create_meal')}}" 
        enctype="multipart/form-data"
        method="POST" style="position:absolute;width:200px;background:white;border-radius:10px;padding:5px;right:20px;">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1"  value="{{old('name')}}"  placeholder=" ادخال اسم الوجبة">
                @error('name')
                  <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
              </div>
              <div class="mb-3">
                <input type="text" class="form-control @error('price')is-invalid @enderror" name='price' id="exampleFormControlInput1"  value="{{old('price')}}"  placeholder="ادخال سعر الوجبة">
                @error('price')
                  <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
              </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">ادخال تفاصيل الوجبة</label>
              <textarea class="form-control @error('content')is-invalid @enderror" name='content' id="exampleFormControlInput1"rows="3" cols="50"  value="{{old('content')}}" >
              </textarea>
                @error('content')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
              @enderror
            </div>
            <div class="mb-3">
                <input type="file" class="form-control @error('content')is-invalid @enderror" name="photo" id="upload">
                <label for="upload"> تحميل صورة المنتج <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-upload"  viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                  </svg></label>

                @error('photo')
                  <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
              </div>
             <div class="mb-3">
                <select name="category" class="form-control @error('category')is-invalid @enderror" style="width: 100%">
                    <option disabled selected>اختار الصنف</option>
                    @foreach ($cats as $cat )
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                @error('category')
                  <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
             </div>


              <input type="submit" class="btn btn-success" value='ارسال' style='width:100%; '>  
           

        </form>
        <table class="table table-hover" style="position:absolute;right:230px;width:1040px;">
           <thead>
            <tr>
                <th>اسم الوحبة </th>
                <th>سعر الوجبة</th>
                <th>تفاصيل الوحبة</th>
                <th>صورة الوجبة</th>
                <th>الصنف</th>
                <th>تعديل الوحبة</th>
                <th> حذف الوجبة</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($pro as $p )
             <tr>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->content}}</td>
                
                <td>
                    
                 
                  <img style="width:60;height:60px;border-radius:20px;" src="
                
                 {{asset('images/'.$p->photo)}}"
                
                  alt="">
                 </td>
                <td>@php
                    foreach($cats as $c){
                        if($c->id==$p->cat_id)
                        echo $c->name;
                    }
                @endphp</td>
                <td><a href="{{route('edit_meal',$p->id)}}" class="btn btn-primary">تعديل</a></td>
                <td><a href="{{route('delete_meal',$p->id)}}" class="btn btn-danger">حذف</a></td>
             </tr>
         @endforeach
        </tbody>
          </table>
          {{-- @foreach ($image as $img)
          <img src="{{asset('app/images.'$img->path)}}" alt="">
            
          @endforeach
           --}}
    </div>

@endsection