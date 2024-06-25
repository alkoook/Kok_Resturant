@extends('admin.admin_dashboard')
@section('content')
<form action="{{route('update_user',$user->id)}}" method="POST" style="position:absolute;width:30%;height:100%;background:white;border-radius:10px;padding:5px;right:35%;">
    @csrf
    <div class="mb-3">
        <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1"  value="{{$user->name}}"  placeholder="ادخال مستخدم جديد">
        @error('name')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
      </div>
      <div class="mb-3">
        <input type="email" class="form-control @error('email')is-invalid @enderror" name='email' id="exampleFormControlInput1"  value="{{$user->email}}"  placeholder="ادخال ايميل جديد">
        @error('email')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
      </div>
      <div class="mb-3">
        <input type="password" class="form-control @error('password')is-invalid @enderror" name='password' id="exampleFormControlInput1"    placeholder="ادخال كلمة مرور جديدة">
        @error('password')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
      </div>    
      <div class="mb-3">
        <input type="radio"  name='status' value="admin" id="exampleFormControlInput1">Admin
        <br>
        <input type="radio"  name='status' value="user" class="@error('status')is-invalid @enderror" id="exampleFormControlInput1">User
        @error('status')
          <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
      </div>    
      <input type="submit" class="btn btn-success" value='ارسال' style='width:100%;'>  
   

</form>
@endsection