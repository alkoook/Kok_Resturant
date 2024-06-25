@extends('admin.admin_dashboard')

@section('content')
<div class="continer" style="position: relative; width:400px;right:500px">
    <form enctype="multipart/form-data" action="{{route('update_meal',$pro->id)}}" method="POST" style='text-align:center'>
        @csrf
        <img style="width:120px;height:120px;border-radius:50%;margin:10px;" src="{{asset('images/'.$pro->photo)}}" alt="">
        <div class="mb-3">
            <input type="text" class="form-control @error('name')is-invalid @enderror" name='name' id="exampleFormControlInput1" value={{$pro->name}} >
            @error('name')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>

          <div class="mb-3">
            <input type="text" class="form-control @error('price')is-invalid @enderror" name='price' id="exampleFormControlInput1" value={{$pro->price}} >
            @error('price')
              <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
            @enderror
          </div>
          <div class="mb-3">
            <textarea name="content" class="form-control @error('content')is-invalid @enderror" cols="40" rows="4" >{{$pro->content}}
          </textarea>
            @error('content')
            <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
          @enderror
          </div>
          <div class="mb-3">
            <input type="file" class="form-control @error('photo')is-invalid @enderror" name="photo" id="upload">
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


          <input type="submit" class="btn btn-success"  value='ارسال' style='width:100%;'>  
       

    </form>
</div>

@endsection