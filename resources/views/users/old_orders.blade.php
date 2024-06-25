@extends('users.show_meals')
@section('meals')
<table class="table" style="position:relative;top:50px;">
    <thead class="thead-dark"  >
      <tr >
        <th scope="col">الرقم</th>
        <th  scope="col">اسم المستخدم</th>
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
      </tr>
    </thead>
    <tbody style="">
      @php
      $num=1
    @endphp
      @foreach ($d as $data)
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
          @php
              if($data->status=='يرجى مراجعة الطلب')
             { echo '<td style="background:#eee">الطلب قيد المراجعة</td>';}
             elseif($data->status=='يتم تحضير الطلب'){
                echo '<td style="background:#25a51e ;color:white">الطلب قيد التحضير</td>';
             }
             else{
                echo '<td style="background:rgb(3, 0, 176) ;color:white">تم تسليم الطلب بنجاح</td>';
             }
          @endphp
        </tr>
        @php
          $num=$num+1;
        @endphp
      @endforeach
    </tbody>
  </table>
@endsection