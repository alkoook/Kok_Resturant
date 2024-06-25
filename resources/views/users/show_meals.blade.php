<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Show Meal</title>
   <link rel="stylesheet" href="{{asset('show_meals.css')}}">
   <style>
    body{
      direction: rtl;
    }
   </style>
</head>
<body>
  @include('sweetalert::alert')
    @if (!Auth()->user())
  <a href="{{route('register')}}" class="btn btn-warning btn_admin"> تسجيل الدخول أو انشاء حساب جديد</a>
    @endif
    @if(Auth()->user())
    
   <a href="{{route('old_orders',Auth::user()->id)}}" class="btn btn-primary btn_admin" style="color: white">اظهار الطلبات السابقة</a> ' 

    @endif
<div class="cont">
    @yield('meals')
</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>