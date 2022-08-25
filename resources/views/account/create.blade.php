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
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <form class="col border p-4 row g-3 rounded" action="{{ route('add.account')}}" method="POST">
                @csrf
                <h3 class="display-6"> Account details </h3>

                <div class="col-md-6">
                    <label class="m-2">Account type</label>
                    <select class="form-select" aria-label="Default select example" name="account_type">
                        <option value=""> Select an Account </option>
                        <option value="1">Fahari</option>
                        <option value="2">Junior Jumbo</option>
                        <option value="3">Chap Chap</option>
                    </select>
                    @error('account_type')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="exampleInputEmail1" class="form-label"> Account Name </label>
                    <input type="text" class="form-control rounded" name="account_name">
                    @error('account_name')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <h1></h1>
                <div class="col-md-4">
                    <label for="exampleInputEmail1" class="form-label"> Currency Type </label>
                        <select class="form-select" aria-label="Default select example" name="currency_type">
                            <option value=""> Select </option>
                            <option value="TZS"> TZS </option>
                            <option value="USD"> USD </option>
                            <option value="EUR"> EUR </option>
                        </select>
                    @error('currency_type')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <br>
                <div class="col-md-4">
                    <label for="exampleInputEmail1" class="form-label"> Card type </label>
                        <select class="form-select" aria-label="Default select example" name="card_type">
                            <option value=""> Select </option>
                            <option value="2"> Master card </option>
                            <option value="1"> Visa card </option>
                            <option value="3"> Tembo card </option>
                        </select>
                    @error('card_type')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <h1></h1>
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label"> Monthly Earn</label>
                    <input type="text" class="form-control rounded" name="monthly_earnings" >
                    @error('monthly_earnings')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <div class="form-text">We'll never share this info with anyone else.</div>
                </div>
                <div class="">
                        <button type="submit" class="btn btn-primary btn-lg text-dark" style="float:right;">Create Account</button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>