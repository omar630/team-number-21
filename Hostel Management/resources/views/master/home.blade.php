@extends('master.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Name:{{$user->name?? 'not set'}}<br>                
                    @foreach($institutes as $institute)
                        Institute:{{$institute->name ?? 'not set'}}<br>
                        Address:{{$institute->address ?? 'not set'}}<br>
                        Hostels:{{count($hostels)}}
                    @endforeach
                    <br><hr>
                    <a class="btn btn-primary btn-sm" href="{{route('getaddcollege')}}" role="button">Add College</a>
                    <a class="btn btn-primary btn-sm" href="{{route('addadmin')}}" role="button">Add Admin</a>
                    <a class="btn btn-primary btn-sm" href="{{route('addhostel')}}" role="button">Add Hostel</a>
                </div>
            </div>
        </div>        
    </div>
    <br>
    @if(count($hostels)>0)
        <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Admin</th>
          <th scope="col">Address</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @php $i=1; @endphp    
        @foreach($hostels as $hostel)
        <tr>
          <th scope="row">{{$i++}}</th>
          <td>{{$hostel->building_name}}</td>
          <td>{{$hostel->name}}</td>
          <td>{{$hostel->address}}</td>
          <td><a href="{{route('edithostel',['id'=>$hostel->id])}}" role="button"><i class="fas fa-edit"></i></a>&nbsp;<a href="{{route('edithostel',['id'=>$hostel->id])}}" role="button"><i class="far fa-trash-alt"></i></i></a></td>
        </tr>
        @endforeach    
      </tbody>
    </table>
    @endif
</div>
@endsection