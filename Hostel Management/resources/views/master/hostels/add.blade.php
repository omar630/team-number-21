@extends('master.layouts.app')
@section('content')
<form method="post" action="{{route('submitaddhostel')}}">
	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="hostelname">Hostel or Building Name</label>
      <input type="text" class="form-control" id="hostelname" placeholder="Name" name="building_name" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">College</label>
      <select id="inputState" class="form-control" name="institute_id">
      	<option>Choose...</option>
        @foreach($institutes as $institute)
        	<option value="{{$institute->id}}">{{$institute->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="no_of_rooms">Total Number of rooms</label>
      <input type="number" class="form-control" id="no_of_rooms" min="0" name="rooms_count">
    </div>
    <div class="form-group col-md-2">
      <label for="admin">Admin</label>
      <select id="admin" class="form-control" name="user_id">
      	<option>Choose...</option>
        @foreach($admins as $admin)
        	<option value="{{$admin->id}}">{{$admin->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection