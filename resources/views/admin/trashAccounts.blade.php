@extends('admin.master')

@section('admin')



<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Trash Accounts</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                        <th scope="col">SL No.</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">User</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Deleted  at</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
            
                    <tbody>
                        @php($i = 1)
                        @foreach($trashAccounts as $account)
                        <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $account->account_name }}</td>
                        <td>{{ $account->account_no }}</td>
                        <td>{{ $account->user->name }}</td>
                        <td>{{ $account->balance }}</td>
                        <td>{{ $account->deleted_at->diffForHumans() }} </td>
                        <td> 
                            <a href="{{ url('restore/account/'.$account->id) }}" class="btn btn-success">Restore</a> 
                            <a href="{{ url('pdelete/account/'.$account->id) }}" class="btn btn-danger">Permanent Delete</a> 
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