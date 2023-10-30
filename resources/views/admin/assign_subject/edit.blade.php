 
 @extends('layouts.app')   
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Admin</h1>
            </div>
            <div class="col-sm-6" style="text-align:right">
               <a href="{{url('admin/class/list')}}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>
      </section>


    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary"> 
          {{-- @php
              echo "<pre>";
                print_r();
              echo "</pre>";
          @endphp --}}
          <form method="POST" action="{{url('admin/assign_subject/update/'.$records->id)}}">
            @php
                echo "<pre>";
                  print_r($records);
                echo "</pre>";
            @endphp
            @csrf 
              <div class="card-body">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" name="class_name" value="{{ old('class_id', $records->class_id)}}" id="validationCustom01" placeholder="Enter Name" >
               <div style="color:red">{{$errors->first('class_name')}}</div>  
              </div>
              <div class="card-body">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" name="subject_name" value="{{ old('subject_name', $records->subject_name)}}" id="validationCustom01" placeholder="Enter Name" >
               <div style="color:red">{{$errors->first('subject_name')}}</div>  
              </div>
              <div class="card-body">   
                <label>Status</label>
                <select class="form-control" name="status" value="{{old('status', ) }}"    id="exampleInputEmail1" placeholder="select status ">
                <option {{!empty($records->status == 0) ? 'selected' : '' }} value="0">Active</option>
                <option {{!empty($records->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                </select>
                <div style="color:red">{{$errors->first('status')}}</div>  
              </div>  

            </div>
            <div class="card-footer">
              <button type="submit"  class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
</div>
@endsection