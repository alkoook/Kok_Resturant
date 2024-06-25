@extends('users.show_meals')
@section('meals')
<div class="parent">
    <div class="the_meal">
        <h3  style="margin-top:20px;">معلومات الوحبة</h3>
        <img src="{{asset('images/'.$pro->photo)}}" alt="" class="meal">
        <h3 style="">اسم الوجبة:{{$pro->name}}</h3>
        <h3 style="">سعر الوجبة:{{$pro->price}}</h3>
        <h3>👇محتوى الوجبة</h3>
       <div class="d"> {{$pro->content}}</div>
        
    </div>
    <div class="order"><h3 style="margin-top:20px;">يمكنك الطلب من هنا</h3>
        
       <a href="{{route('register')}}" class="btn btn-warning">يجب عليك تسجيل الدخول اولا</a>
    </div>
</div>
@endsection