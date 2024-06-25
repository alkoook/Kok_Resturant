@extends('admin.admin_dashboard')

@section('content')
    <div class="con" style="position: relative;">
        <form action="{{route('create_cat')}}" method="POST" style="position:absolute;width:200px;height:100px;background:white;border-radius:10px;padding:5px;right:20px;">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1"  value="{{old('name')}}"  placeholder="ادخال صنف جديد">
                @error('name')
                  <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
              </div>
              <input type="submit" class="btn btn-success" value='ارسال' style='width:100%;'>  
           

        </form>
        <table class="table table-hover" style="position: absolute;right:250px; width:100%">
           <thead>
            <tr>
                <td>اسم الصنف </td>
                <td>تعديل الصنف</td>
                <td> حذف الصنف</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($cats as $cat )
                <tr>
                    <td>{{$cat->name}}</td>
                    <td><a href="{{route('edit_cat',$cat->id)}}"  class='btn btn-primary'>تعديل</a></td>
                    <td><a href="{{route('delete_cat',$cat->id)}}" class='btn btn-danger' id='delete'>حذف</a></td>
                </tr>
            @endforeach
        </tbody>
          </table>
          
    </div>

@endsection
 


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>