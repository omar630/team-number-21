@extends('admin.layouts.app')
@section('content')
<form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">First name</label>
      <input type="text" class="form-control" id="name" placeholder="First name Last name" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="rollno">Roll No.</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">#</span>
        </div>
        <input type="text" class="form-control" id="rollno" placeholder="10 digits roll number" aria-describedby="rollno" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="department">Department</label>
      <select id="department" class="form-control">
        <option selected>Choose...</option>
        @foreach($departments as $department)
        	<option value="{{$department->id}}">{{$department->short_code}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">State</label>
      <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
    </div>
      <div class="form-group col-md-1.5">
      <label for="year">Year</label>
      <select id="year" class="form-control">
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
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection