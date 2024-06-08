@extends('layout.dashboard_default')
@section('content')
    <section>
        @if (Session::has('success'))
            <div class="alert alert-primary text-center">{{ Session('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger text-center">{{ Session('error') }}</div>
        @endif
        {{-- search contact --}}
        <div class="container my-4 d-flex justify-content-end">
            <div class="row">
                <div class="col-12">
                    <form class="" action="{{ route('contact.search') }}" method="GET">
                        @error('search')
                            <span class=" px-3 py-1  text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input class="form-control me-2 " type="search" placeholder="Search" name="search">

                        <button class="btn btn-outline-success py-1" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-dark table-bordered table-hover mt-5 ">
            <thead>

                <tr>
                    <th scope="col">Author Name</th>

                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Highlight</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key=>$val){?>

                <tr>
                    <td scope="row">{{ $val->author->fname }}</td>

                    <td scope="row">
                        <?php if(isset($val->image)){?>
                        <img src="{{ asset('/storage/assets/uploads') . '/' . $val->image }}" height="40" width="40"
                            alt="Null" style="border-radius:50%;">
                        <?php }else{?>
                        <img src="{{ asset('storage/assets/uploads/dumy.png') }}" height="40" width="40"
                            alt="Null" style="border-radius:50%;">
                        <?php }?>
                    </td>

                    <td scope="row">{{ $val->fname }}</td>
                    <td scope="row">{{ $val->lname }}</td>
                    <td scope="row">{{ $val->email }}</td>
                    <td scope="row">{{ $val->phone }}</td>
                    <td scope="row">{{ $val->address }}</td>
                    <td scope="row">{{ $val->city }}</td>

                    <td scope="row " class="text-center">
                        @if ($val->is_highlighted == 1)
                            <i class="fa-solid fa-check-double" style="color: #FFD43B;"></i>
                        @else
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        @endif
                    </td>


                    <td>
                        <a href="{{ url('/contact/edit/' . $val->id) }} " class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="{{ url('/contact/delete/' . $val->id) }} "
                            class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>


                </tr>
                <?php }?>

            </tbody>
        </table>

        <div class=" d-flex justify-content-center py-3 ">
            {{ $data->links() }}
        </div>
    </section>
@endsection
