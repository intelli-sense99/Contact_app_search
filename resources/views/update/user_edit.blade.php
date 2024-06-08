@extends('layout.default')
@section('content')
    <section>
        <div class="container">
            <h2>Edit User data</h2>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form action="{{ route('subject.updateUser') }}" method="post">
                <input type="hidden" class="form-control" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="exampleInputfirstname" name="firstname"
                            value="{{ $data->fname ? $data->fname : '' }}">
                        @error('firstname')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputlastname" name="lastname"
                            value="{{ $data->lname ? $data->lname : '' }}">
                        @error('lastname')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Email1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror

                    </div>
                </div> --}}
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="phoneno">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputphoneno" name="phone"
                            value="{{ $data->phone ? $data->phone : '' }}">
                        @error('phone')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="Password">Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword" name="password"
                            value="{{ $data->password ? $data->password : '' }}">
                        @error('password')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center py-2">
                    <button type="submit" class="btn btn-info" name="create">Submit</button>

                </div>
            </form>
        </div>


    </section>
@endsection
