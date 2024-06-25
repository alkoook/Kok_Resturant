@extends('admin.admin_dashboard')

@section('content')
    
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">الرقم</th>
        <th scope="col">اسم المستخدم</th>
        <th scope="col">الايميل</th>
        <th scope="col">الهاتف</th>
        <th scope="col">التاريخ</th>
        <th scope="col">الوقت</th>
        <th scope="col">اسم الوجبة</th>
        <th scope="col">سعر الوجبة</th>
        <th scope="col">العدد</th>
        <th scope="col">المجموع</th>
        <th scope="col">العنوان</th>
        <th scope="col">حالة الطلب</th>
        <th scope="col">الموافقة</th>
        <th scope="col">الرفض</th>
        <th scope="col">اتمام البيع</th>
      </tr>
    </thead>
    <tbody>
      @php
      $num=1
    @endphp
      @foreach ($data as $data)
        <tr>
          <td>{{$num}}</td>
          <td>{{$data->user_name}}</td>
          <td>{{$data->user_email}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->history}}</td>
          <td>{{$data->time}}</td>
          <td>{{$data->meal_name}}</td>
          <td>{{$data->price}}</td>
          <td>{{$data->count}}</td>
          <td>{{$data->sum}}</td>
          <td>{{$data->address}}</td>
          @php if($data->status=='يتم تحضير الطلب')
                 echo "<td style='background: #25a51e;color:white'>$data->status</td>" ;
                elseif($data->status=='تم تسليم الطلب'){ 
                echo "<td style='background:rgb(3, 0, 176);color:white'>$data->status</td>";
              }
              else{
                echo "<td style='background:#c12;color:white'>$data->status</td>";
              }
                @endphp         
          <td><a class="btn btn-success" href="{{route('accept_order',$data->id)}}">الموافقة على الطلب</a></td>
          <td><a class="btn btn-danger" href="{{route('delete_order',$data->id)}}"> رفض الطلب</a></td>
          <td><a class="btn btn-primary" href="{{route('success_order',$data->id)}}">تمت العملية</a></td>
        </tr>
        @php
          $num=$num+1;
        @endphp
      @endforeach
      
    </tbody>
  </table>
@endsection
