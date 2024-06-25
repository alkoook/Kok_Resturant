@extends('admin.admin_dashboard')
@section('content')
<div class="con" style="position: relative;width:100%">
    <form action="{{route('create_user')}}" method="POST" style="position:absolute;width:200px;height:100px;background:white;border-radius:10px;padding:5px;right:20px;">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1"  value="{{old('name')}}"  placeholder="ادخال مستخدم جديد">
            @error('name')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <div class="mb-3">
            <input type="email" class="form-control @error('email')is-invalid @enderror" name='email' id="exampleFormControlInput1"  value="{{old('email')}}"  placeholder="ادخال ايميل جديد">
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
    <table class="table table-hover" style="position: absolute;right:250px; width:calc(100% - 250px)">
       <thead>
        <tr>
            <td>اسم المستخدم </td>
            <td>الايميل</td>
            <td>النوع</td>
            <td> تعديل المستخدم</td>
            <td> حذف المستخدم</td>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@php
                    if($user->status==0)
                    echo "Admin";
                else echo "User";
                @endphp</td>
                <td><a href="{{route('edit_user',$user->id)}}"  class='btn btn-primary'>تعديل</a></td>
                <td><a href="{{route('delete_user',$user->id)}}" class='btn btn-danger' id='delete'>حذف</a></td>
            </tr>
            @endforeach
    </tbody>
      </table>
      
</div>

@endsection