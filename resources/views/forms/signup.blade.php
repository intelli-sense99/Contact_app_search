@extends('layout.default')
@section('content')
    <section>
        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session('success') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="alert alert-danger">{{ Session('error') }}</p>
        @endif
        <div class="container container_signup">
            <h2>Registration Form</h2>
            <form action="<?php echo route('subject.store'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="exampleInputfirstname" name="firstname"
                            value="{{ old('firstname') }}">
                        @error('firstname')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputlastname" name="lastname"
                            value="{{ old('lastname') }}">
                        @error('lastname')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="Email1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group col-md-6">
                        <label for="image">Email address</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror

                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="phoneno">Phone Number</label>
                        <input type="text" class="form-control" id="exampleInputphoneno" name="phone"
                            value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 ">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword" name="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center py-2">
                    <button type="submit" class="btn btn-primary" name="create">Sign up</button>

                </div>
            </form>
        </div>


    </section>
@endsection
