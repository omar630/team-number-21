@extends('master.layouts.app')
@section('content')
<form method="post" action="{{route('postaddcollege')}}">
  @csrf
  <input type="number" name="user_id" value="{{$user->id}}" placeholder="" hidden="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">College Name</label>
      <input type="text" class="form-control" id="name" placeholder="Email" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Code</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="College Code" name="code">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
  </div>
  <div class="form-row">
    <!--<div class="form-group col-md-4">
      <label for="inputState">Type</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>-->
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection