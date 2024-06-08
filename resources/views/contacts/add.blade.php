@extends('layout.dashboard_default')
@section('content')
    <section>

        @php
            $id = session()->has('id') ? session('id') : null;
        @endphp

        @if (Session::has('success'))
            <p class="alert alert-primary">{{ Session('success') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="alert alert-primary">{{ Session('error') }}</p>
        @endif

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2 class="text-center">Add Your Contacts</h2>
                    <hr>
                    <form method="POST" action="{{ route('subject.contactStore') }}" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" class="form-control" name="author_id" value="{{ $id }}">

                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
                                @error('firstName')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="{{ old('lastName') }}">
                                @error('lastName')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" rows="1" style="max-height:10px" value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">

                            <div class="mb-2 col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2 col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                @error('city')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-12">
                                <label for="file" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                    <div class="text-center text-danger m-0 p-0">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row px-3">
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" name="is_highlight" value="1" />
                            <label class="form-check-label px-2 py-1 ">Check The Box, Want To Highlight Your Contact.</label>
                        </div>

                        </div>
                        <div class=" text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
