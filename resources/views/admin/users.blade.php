@extends('admin.master')

@section('admin')
    <div class="m-4 w-50">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">SL No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
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
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection