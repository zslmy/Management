@extends('layout.left')
@section('content')

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">VIP顾客信息</h1>

        </div>

   
<div class="btn-toolbar list-toolbar">
     <a class="btn btn-primary" href="{{url('customervip/create')}}"><i class="fa fa-plus"></i>添加VIP会员</a>

</div>

        <div class="main-content">
            


<div class="row">

<div class="col-sm-6 col-md-12">


        <div class="panel panel-default">
            <div class="panel-heading no-collapse">服务员前六销量</div>
            <table class="table table-bordered table-striped" >
              <thead>
         <tr>
      <th>姓名</th>
      <th>身份证信息</th>
      <th>联系方式</th>
      <th>地址</th>
      <th>积分</th>
      <th style="width: 3.5em;"></th>
    </tr>
              </thead>
              <tbody>
@foreach($customers as $customer)
    <tr>
      <td>{{$customer->cname}}</td>
      <td>{{$customer->ccard}}</td>
      <td>{{$customer->cphone}}</td>
      <td>{{$customer->caddress}}</td>
       <td>{{$customer->cpoint}}</td>
      <td>
          <a href="{{url('customervip').'/'.$customer->cid}}" class="update" ><i class="fa fa-pencil"></i></a>
          <a href="#" role="button" data-toggle="modal" class="delete" value="{{$customer->cid}}"><i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
 
@endforeach
              </tbody>
            </table>
        </div>
    </div>


</div>







<script type="text/javascript">
$('.delete').click(function(){
  var that=$(this).parent().parent();
    var cid=$(this).attr('value');
    $.post("{{url('customer')}}/"+cid,{'_method':'delete','_token':'{{csrf_token()}}'},function(data){
      if (data.state) {
       layer.msg(data.msg);  
       that.remove();
      }else{
        layer.msg(data.msg);
      }

    },'json');
 
});


</script>


<ul class="pagination">
 
  {!!$customers->render()!!}
  

</ul>



@endsection
      