@extends('users.show_meals')
@section('meals')
    
@php
$left=10;
$top=50;
@endphp
@foreach ($pro as $p )

<div class="child" style="left:{{$left}}px;top:{{$top}}px;">
<img src="{{asset('images/'.$p->photo)}}" alt="">
<div class="meal">{{$p->name}}</div>
<div class="meal"> سعر الوجبة :{{$p->price}}</div>
<a class="btn btn-success" href="{{route('user_order',$p->id)}}" >اطلب الان</a>
</div>

@php
$left+=240;
if($left>1100)
{
  $left=10;
  $top+=310;
}

@endphp
@endforeach



@endsection