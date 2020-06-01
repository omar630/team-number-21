@extends('admin.layouts.app')
@section('content')
<form method="post" action="{{route('savehostel')}}">
	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="hostelname">Hostel or Building Name</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-university"></i></div>
        </div>
        <input type="text" class="form-control" id="hostelname" placeholder="Name" name="building_name" required="" value="{{$hostel->building_name}}">
      </div>      
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">College</label>
      <select id="inputState" class="form-control" name="institute_id" disabled="">
        <option value="">{{$hostel->name}}</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="far fa-address-card"></i></div>
        </div>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{$hostel->address}}">
      </div>       
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="no_of_rooms">Total Number of rooms</label>
      <input type="number" class="form-control" id="no_of_rooms" min="0" name="room_count" value="{{$hostel->room_count}}">
    </div>
       <div class="form-group col-md-4">
      <label for="capacity">Students Capacity</label>
      <input type="number" class="form-control" id="capacity" min="0" name="capacity" value="{{$hostel->students_capacity}}">
    </div>
  </div>
  <input type="number" name="id" value="{{$hostel->id}}" hidden="" name="hostel_id">
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
