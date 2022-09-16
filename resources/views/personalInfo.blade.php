<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        Hi... <b>{{ Auth::user()->name }}</b> 


        </h2>
</x-slot>
<div class="">
        <div class="row d-flex justify-content-center p-10 m-4 ">
            <div class="w-50 m-2">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form class="border p-4 row g-3 rounded" action="{{ route('store.info')}}" method="POST">
                    @csrf
                    <h3 class="display-6 text-center"> Personal Information </h3>
                    <div class="col-md-6 ">
                        <label for="exampleInputPassword1" class="form-label"> Mobile No. </label>
                        <input type="text" class="form-control rounded" name="mobile_no">
                        @error('mobile_no')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 ">
                        <label for="exampleInputPassword1" class="form-label"> Birth Date </label>
                        <input type="date" class="form-control rounded" name="birth_date">
                        @error('birth_date')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="exampleInputPassword1" class="form-label"> Physical Address </label>
                        <input type="text" class="form-control rounded" name="physical_address">
                        @error('physical_address')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label"> Postal Address </label>
                        <input type="text" class="form-control rounded" name="postal_address">
                        @error('postal_address')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputPassword1" class="form-label"> Nationality </label>
                        <select class="form-select " aria-label="Default select example" name="nationality">
                            <option value=""> Select </option>
                            <option value="Tanzanian">Tanzanian</option>
                            <option value="Kenyan">Kenyan</option>
                            <option value="Ugandan">Ugandan</option>
                        </select>
                        @error('nationality')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    
                    
                    <div class="col-md-4">
                        <h3 class="m-2">ID Card type</h3>
                        <select class="form-select" aria-label="Default select example" name="id_card_type">
                            <option value=""> Select </option>
                            <option value="Voter"> Voter </option>
                            <option value="National"> National </option>
                            <option value="Lisence"> Lisence </option>
                        </select>
                        @error('id_card_type')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputPassword1" class="form-label"> ID No. </label>
                        <input type="text" class="form-control rounded" name="id_no">

                        @error('id_no')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror

                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-lg text-dark" style="float:right;">Submit</button>
                    </div>
                    
                    
                    
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>