<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Admin Dashboard</title>
    <style>
   
      body{
        direction: rtl;
        width:100%;
        height:100%;
    
            }
         table,th,td   {
  border: 1px solid black;
}
    td{
          
  }
      input[type='file']
      {
        display: none;
      }
      label[for="upload"]{
        display: inline-block;
        text-transform: uppercase;color:#fff;
        background:#c0392b;
        text-align:center;padding: 15px;
        font-size: 18px;
        user-select: none;
        cursor:pointer;
        border-radius:5px;
        box-shadow:5px 15px 25px rgba(0,0,0,0.35); 
        transition: .1s;

      }
      label[for="upload"]:active{
        transform: scale(0.9);
      }
      a{
        text-decoration:none;
        color:white;
      }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src=" 'sweetalert2/dist/sweetalert2.js'"></script>
    <link rel="stylesheet" href="'sweetalert2/src/sweetalert2.scss'"> --}}
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

</head>
<body>

    
   <nav class="navbar bg-body-tertiary" style='width:100%'>
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('show_cats')}}">عرض الاصناف</a>
      <a class="navbar-brand" href="{{route('show_meals')}}">عرض الوجبات</a>
      <a class="navbar-brand" href="{{route('show_orders')}}">عرض الطلبات</a>
      <a class="navbar-brand" href="{{route('show_admins')}}">عرض الادمن</a>
    </div>
    
  </nav>
 
  @include('sweetalert::alert')
<div class="content" style="width:100%;height:100%;position:relative;">
   @yield('content')
  </div>

  

 

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>