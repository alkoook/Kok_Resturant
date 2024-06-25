@extends('users.show_meals')
@section('meals')
    
    <div class="parent">
        <div class="the_meal">
            <h3  style="margin-top:20px;">معلومات الوحبة</h3>
            <img src="{{asset('images/'.$pro['photo'])}}" alt="" class="meal">
            <h3 style="">اسم الوجبة:{{$pro->name}}</h3>
            <h3 style="">سعر الوجبة:{{$pro->price}}</h3>
            <h3>👇محتوى الوجبة</h3>
           <div class="d"> {{$pro->content}}</div>
            
        </div>
        <div class="order"><h3 style="margin-top:20px;">يمكنك الطلب من هنا</h3>
            <form action="{{route('create_order')}}" method="post" class="form_order">
                @csrf
                <input type="text" name="user_name"  class="form-control" value="{{$user->name}}" readonly>
                <input type="text" name="user_email"  class="form-control" value="{{$user->email}}" readonly>
                {{-- <div class="mb-3">ظ --}}
                <input type="text" name="phone"  class="form-control @error('phone')is-invalid @enderror" value="{{old('phone')}}"  placeholder="يرجى ادخال رقم الهاتف">
                @error('phone')
                    <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
                {{-- </div> --}}
                <input type="text" name="address"  class="form-control  @error('address')is-invalid @enderror" value="{{old('address')}}" placeholder="يرجى ادخال العنوان">
                @error('address')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
                <input type="date" name="history"  class="form-control  @error('history')is-invalid @enderror" value="{{old('history')}}" placeholder="يرجى ادخال تاريخ التسليم">
                @error('history')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
                <input type="time" name="time"  class="form-control  @error('time')is-invalid @enderror" value="{{old('time')}}" placeholder="يرجى ادخال وقت التسليم">
               
                @error('time')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror 
                <input type="text" name="meal_name"  class="form-control" value="{{$pro->name}}" readonly>
                <input type="text" name="price"  class="form-control" value="  {{$pro->price}}" readonly>
                <input type="number" name="count"  class="form-control @error('count')is-invalid @enderror"value="{{old('count')}}" placeholder="عدد الوجبات">
                @error('count')
                <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
                @enderror
                <input type="submit" class="form-control btn btn-success" value="ارسال">


                
            </form>
        </div>
    </div>

@endsection