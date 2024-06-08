@extends('layout.dashboard_default')
@section('content')
    <section>
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2 class="text-center">Edit Contact data</h2>

                    <form action="{{ route('subject.updateContact') }}" method="post" enctype="multipart/form-data">
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

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="address" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="address"
                                    value="{{ $data->address ? $data->address : '' }}">
                                @error('address')
                                    <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="phoneno">Phone Number</label>
                                <input type="text" class="form-control" id="exampleInputphoneno" name="phone"
                                    value="{{ $data->phone ? $data->phone : '' }}">
                                @error('phone')
                                    <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 ">
                                <label for="image">Update Image</label>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                    <div class="alert alert-danger text-center p-1 my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row px-3">
                            <div class="mb-2 form-check">
                                <input type="checkbox" class="form-check-input" name="is_highlight"
                                    {{ $data->is_highlighted == 1 ? 'checked' : '' }} value="1" />
                                <label class="form-check-label px-2 py-1 ">Change Hightlight Status</label>
                            </div>
                        </div>
                        <div class="form-group text-center py-2">
                            <button type="submit" class="btn btn-info" name="create">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>
@endsection
