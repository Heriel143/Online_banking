<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        Hi... <b>{{ Auth::user()->name }}</b> 
        <span style="float: right;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account no. {{ $display[0]['account_no'] }}
          </a>
          <ul class="dropdown-menu">
            @php($i = 0)
            @foreach ($display as $displays)
            <p class="hidden">{{ $i++ }}</p>
              @if ($i == 1)
                @continue;
              @endif
              <li><a class="dropdown-item" href="{{ url('dashboard/'.$displays->account_no) }}">{{ $displays->account_no }}-{{ $displays->account_name }}</a></li>
              <li><hr class="dropdown-divider"></li>
              
            @endforeach
          </ul>
        </li>
        </ul>
        </span>

          {{-- <span style="float: right;">
          <select class="form-select form-select-lg  " aria-label=".form-select-lg example">
            <option selected>Account no. {{ $display[0]['account_no'] }} </option>
            @php($i = 0)
            @foreach ($display as $displays)
            {{ $i++ }}
              @if ($i == 1)
                @continue;
              @endif
              <option > <a href="{{ url('dashboard/'.$displays->account_no) }}"> {{ $displays->account_no }}-{{ $displays->account_name }}</a></option>
              
            @endforeach
          </select>
        </span>
        </h2> --}}

    </x-slot>


    <section class="content w-75 mx-auto my-4">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    
                  <h3> <span class="dollars1">{{ $display[0]['balance'] }} </span></h3>
  
                  <p>Balance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3> <span class="dollars1">{{ $deposit }} </span></h3>
  
                  <p>Total Deposited</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><span class="dollars1">{{ $withdraw }}</span></h3>
  
                  <p>Total withdrawn</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
              </div>
            </div>
            <!-- ./col -->
            
        </div>
          <!-- /.row -->
          
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
    
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
            <div class="card-header">Latest Transactions</div>
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
                @foreach($transaction as $accounts)
                <tr>
                <td scope="row">{{ $i++ }}</td>
                <td> {{ $accounts->account->account_name }}</td>
                {{-- dd($accounts); --}}
                <td>{{ $accounts->rock->account_name }}</td>
                <td>{{ $accounts->amount }}</td>
                <td>{{ $accounts->created_at }}</td>
                <td>{{ $accounts->created_at->diffForHumans() }} </td>
                
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
<a target="_blank" href="{{ route('print') }}" class="btn btn-primary btn-lg text-dark">Print statement</a>
</div>









</x-app-layout>
