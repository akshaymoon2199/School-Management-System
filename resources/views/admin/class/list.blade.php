 
 @extends('layouts.app')   
@section('content')
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Subject List</h1>
        </div>
        <div class="col-sm-6" style="text-align:right">
            <a href="{{url('admin/class/add')}}" class="btn btn-primary">Add New Class</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  {{-- search bar --}}
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12"> 
          <div class="card">
            <div class="card-header col-md-12 ">
              <h3 class="card-title"> Search</h3>
            </div>    
              <div class="card-body p-0">
                <form method="get" method="">
                  <div class="row m-2">
                      <div class="col-md-3 ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" id="validationCustom01" placeholder="Enter Name" >
                      </div>
                      <div class="col-md-3">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date" value="{{Request::get('date')}}" id="validationCustom01" placeholder="Enter Name" >
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top:31px;">Search</button>
                        <a href="{{route('add_list')}}" class="btn btn-success"  style="margin-top:31px;">Reset</a>
                      </div>
                  </div>
                </form>
              </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
 
  {{-- serarc bar exit --}}
<!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @include('message')
        <div class="col-md-12"> 
          <div class="card">
            <div class="card-header col-md-12 ">
              {{-- <h3 class="card-title">Admin List  (Total : {{$getrecords->total()}})</h3>   --}}
              <h3 class="card-title">Subject List  (Total :{{$getrecords->total()}} )</h3>  
            </div>
             <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="">Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created by</th>
                    <th style="">Create Date</th>
                    <th style=" text-align: center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getrecords as $value)  

                 <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                      @if($value->status ==  0)
                      <b>Active</b> 
                      @elseif($value->status == 1)
                      <b>Inactive</b>
                      @endif
                    </td>
                    <td>{{$value->create_by_name}}</td> 
                    <td>{{date('d-m-y H:i A',strtotime($value->created_at))}} </td>
                    <td style=" text-align: center">
                      <a href="{{url('admin/class/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                      <a href="{{url('admin/class/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                 </tr>
                @endforeach
                </tbody>
              </table>
              <div class="" style="padding:10px; float:right; padding">
                {!! $getrecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection