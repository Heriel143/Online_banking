@extends('admin.master')

@section('admin')


<div class="row d-flex justify-content-center p-10 m-4  col-12 ">
        <div class="w-50 m-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <form class="col border p-4 row g-3 rounded" action="{{ url('account/update/'.$accounts->id)}}" method="POST">
                @csrf
                <h3 class="display-6">Update Account details </h3>

                <div class="col-md-6">
                    <h3 class="m-2">Account type</h3>
                    <select class="form-select" aria-label="Default select example" name="account_type" value="{{$accounts->account_type}}">
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
                    <input type="text" class="form-control rounded" name="account_name" value="{{$accounts->account_name}}">
                    @error('account_name')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="m-1">
                    <label for="exampleInputEmail1" class="form-label"> Currency </label>

                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="TSHs" name="currency_type" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            TSHs
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="" name="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            USD
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="" name="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            EUR
                        </label>
                    </div>
                    @error('currency_type')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label"> Monthly Earn</label>
                    <input type="text" class="form-control rounded" name="monthly_earnings" value="{{$accounts->monthly_earnings}}" >
                    @error('monthly_earnings')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                    <div class="form-text">We'll never share this info with anyone else.</div>
                </div>
                <div class="">
                        <button type="submit" class="btn btn-primary btn-lg text-dark" style="float:right;">Update Account</button>
                    </div>
            </form>
        </div>
    </div>


@endsection