@extends('admin.master')

@section('admin')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">All Accounts</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th scope="col">SL No.</th>
            <th scope="col">Account Name</th>
            <th scope="col">Number</th>
            <th scope="col">User</th>
            <th scope="col">Balance</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @php($i = 1)
            @foreach($accounts as $account)
            <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $account->account_name }}</td>
            <td>{{ $account->account_no }}</td>
            <td>{{ $account->user->name }}</td>
            <td>{{ $account->balance }}</td>
            <td><span class="badge text-bg-{{ $account->status > 0 ? 'success': 'warning' }} text-center">{{ $account->status > 0 ? 'active' : 'inactive'}}</span></td>
            <td>{{ $account->created_at->diffForHumans() }} </td>
            <td> 
                <a href="{{ url('account/edit/'.$account->id) }}" class="btn btn-info">Edit</a> 
                <a href="{{ url('account/status/'.$account->id) }}" class="btn {{ $account->status > 0 ? 'bg-warning': 'bg-success' }}">{{ $account->status > 0 ? 'Deactivate' : 'Activate'}}</a> 
                <a href="{{ url('softdelete/account/'.$account->id) }}" class="btn btn-danger">Delete</a> 
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