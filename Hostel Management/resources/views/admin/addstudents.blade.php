@extends('admin.layouts.app')
@section('content')
<form method="post" action="{{route('savestudent')}}" enctype="multipart/form-data">
	@csrf
	<input type="number" name="{{$hostel->id}}" value="" placeholder="" hidden="">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="First name Last name" value="" required name="name">
    </div>
    <div class="col-md-4 mb-3">
      <label for="rollno">Roll No.</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">#</span>
        </div>
        <input type="text" class="form-control" id="rollno" placeholder="10 digits roll number" aria-describedby="rollno" required name="rollno">
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="department">Department</label>
      <select id="department" class="form-control" name="department">
        <option selected>Choose...</option>
        @foreach($departments as $department)
        	<option value="{{$department->id}}">{{$department->short_code}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4 mb-3">
      <div class="">
      <label for="mobile">Ph No.</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-mobile"></i></span>
        </div>
        <input type="text" class="form-control" id="rollno" placeholder="10 digits roll number" aria-describedby="rollno" required name="mobile">
      </div>
    </div>
    </div>
      <div class="form-group col-md-1.5">
      <label for="year">Year</label>
      <select id="year" class="form-control" name="year">
        <option value="1-1" selected="">1-1</option>
        <option value="1-2">1-2</option>
        <option value="2-1">2-1</option>
        <option value="2-2">2-2</option>
        <option value="3-1">3-1</option>
        <option value="3-2">3-2</option>
        <option value="4-1">4-1</option>
        <option value="4-2">4-2</option>        
      </select>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <label for="year">Sample file</label>
                    <div class="col-md-9">
                    <input type="file" name="sample_file" value="" placeholder="">
                    </div>
                </div>
            </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection