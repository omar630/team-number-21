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
                        Hostels:{{count($hostels)}}<br>
                        Courses:@if(count($institute->courses)>0)
                                  @foreach($institute->courses as $course)
                                    {{$course}}&nbsp;
                                  @endforeach
                                @endif
                                <button type="button" class="btn btn-primary btn-sm addcourse" data-toggle="modal" data-target="#exampleModal" data-college="{{$institute->name}}" data-institute="{{$institute->id}}" style="float: right;">+</button>
                                <br><hr>
                    @endforeach
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="course" id="addcourse">
          <<input type="text" name="institute_id" value="" placeholder="">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">College:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="department">Department</label>
      <select id="department" class="form-control" name="department">
        <option selected>Choose...</option>
        @foreach($departments as $department)
          <option value="{{$department->id}}">{{$department->short_code}}</option>
        @endforeach
      </select>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
@section('js')
<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var college = button.data('college') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Add new Course to ' + college)
  modal.find('.modal-body input').val(college)
})

$('#addcourse').submit(function() {
        $.ajax({
            type: "get",
            url: "{{route('addcoursecollege')}}",
            data: $('form.course').serialize(),
            success: function(response) {
                console.log(response);
            },
            error: function() {
                alert('Error');
            }
        });
        return false;
    });

</script>
@endsection