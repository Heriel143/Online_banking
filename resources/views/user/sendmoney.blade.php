<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        Hi... <b>{{ Auth::user()->name }}</b> 


        </h2>
</x-slot>
    <div class="row d-flex justify-content-center p-10 m-4  col-12 ">
        <div class="w-50 m-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success','warning')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <form class="col border p-4 row g-3 rounded" action="{{ route('send')}}" method="POST">
                @csrf
                <h3 class="display-6"> Send Money </h3>

            
                <div class="col-md-8">
                    <label for="exampleInputEmail1" class="form-label"> Account Name </label>
                    <input type="text" class="form-control rounded" name="account_name">
                    @error('account_name')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="exampleInputEmail1" class="form-label"> Account Number </label>
                    <input type="text" class="form-control rounded" name="account_no">
                    @error('account_no')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label"> Amount </label>
                    <input type="text" class="form-control rounded" name="amount" >
                    @error('amount')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary btn-lg text-dark" style="float:right;" >
                        Send
                    </button>
                    <!-- <button type="submit" class="btn btn-primary text-dark" style="float:right;">Send</button> -->
                </div>
            </form>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        
    </div>
</x-app-layout>