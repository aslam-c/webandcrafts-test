@extends('dashboard')
@section('child_content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add new employee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('employees/add-new')}}" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                    <label for="employee_name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="employee_name" placeholder="Name" maxlength='50' required>
                </div>
                @if($errors->first('name'))
                <span class="badge badge-danger">
                    {{$errors->first('name')}}
                </span>
                @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" placeholder="Enter employee email ID" autocomplete="off" required maxlength='100'>
                </div>
                @if($errors->first('email'))
                <span class="badge badge-danger">
                    {{$errors->first('email')}}
                </span>
                @endif
                <div class="form-group">
                    <label for="designation">Select designation</label>
                    <select class="form-control" id="designation" name="designation_id" required>
                        @foreach ($designations as $designation )
                        <option value="{{$designation->id}}">{{$designation->name}}</option>
                        @endforeach
                    </select>
                    @csrf
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Select photo</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" id="exampleInputFile" name="photo">
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Employee</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
