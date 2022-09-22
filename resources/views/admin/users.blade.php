@extends('admin.master')

@section('admin')

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">SL No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($users as $user)
                <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }} </td>
                <td> 
                    <a href="{{ url('#'.$user->id) }}" class="btn btn-info">Edit</a> 
                    <a href="{{ url('#'.$user->id) }}" class="btn bg-success">View</a> 
                    <a href="{{ url('#'.$user->id) }}" class="btn btn-danger">Delete</a> 
                </td>
                </tr>
                @endforeach
            </tbody>
            
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
</div>
</div>
@endsection

