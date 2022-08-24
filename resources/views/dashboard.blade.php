<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        Hi... <b>{{ Auth::user()->name }}</b> 


        </h2>
    </x-slot>


    <div class="row g-3 m-4 d-flex centre gap-2 ">
        <div class="col-md-2 border border-dark b-radius-8">
            <h1 class="display-6 ">Balance {{ $display[0]['balance'] }}</h1>
        </div>

        <div class="col-md-2 border border-dark b-radius-8">
            <h1 class="display-6">Total Deposit {{ $deposit }}</h1>
        </div>
        <div class="col-md-2 border border-dark radius-8">
            <h1 class="display-6">Total Withdrawn {{ $withdraw }}</h1>
        </div>
        
    </div> 
    
<div class="container">
    <div class="row">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">All Accounts</div>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">SL No.</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                </tr>
            </thead>

            <tbody>
                @php($i = 1)
                @foreach($transaction as $account)
                <tr>
                <td scope="row">{{ $i++ }}</td>
                <td>{{ $account->sender_acc_no }}</td>
                <td>{{ $account->receiver_acc_no }}</td>
                <td>{{ $account->amount }}</td>
                <td>{{ $account->created_at }}</td>
                <td>{{ $account->created_at->diffForHumans() }} </td>
                
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
<a target="_blank" href="{{ route('print') }}" class="btn btn-primary btn-lg text-dark">Print statement</a>
</div>









</x-app-layout>
