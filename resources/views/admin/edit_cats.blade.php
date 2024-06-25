@extends('admin.admin_dashboard')

@section('content')
<div class="continer" style="position: relative; width:400px;right:500px">
    <form action="{{route('update_cat',$cat->id)}}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1" value={{$cat->name}} >
            @error('name')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <input type="submit" class="btn btn-success"  value='ارسال' style='width:100%;'>  
       

    </form>
</div>

@endsection