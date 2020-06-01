@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($hostels as $hostel)
                        <b>Institute<i class="fas fa-university"></i>:</b>{{$hostel->name ?? 'not set'}}({{$hostel->code}})<br>
                        <b>Hostel Name<i class="far fa-building"></i>:</b>{{$hostel->building_name ?? 'not set'}}<br>
                        <b>Address<i class="far fa-address-card"></i>:</b>{{$hostel->address ?? 'not set'}}<br>
                        <b>Rooms: </b>{{$hostel->room_count ?? 'not set'}}<br>
                        <b>Capacity: </b>{{$hostel->students_capacity*$hostel->room_count ?? 'not set'}}
                        <br><hr>
                        <a class="btn btn-primary btn-sm" href="{{route('editmyhostel',['id'=>$hostel->id])}}" role="button">Edit</a>
                        <a class="btn btn-primary btn-sm" href="{{route('addstudents',['id'=>$hostel->id])}}" role="button">Add Students</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection