@php
    $contectData = App\Http\Controllers\Contact_controller::getHighlightedContact();

    // echo '<pre>';
    // print_r($contectData);
    // echo '</pre>';
    // die;

@endphp

@extends('layout.dashboard_default')
@section('content')
    <section>
        @if (Session::has('success'))
            <p class="alert alert-primary">{{ Session('success') }}</p>
        @endif

        <?php if (count($contectData) > 2) { ?>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($contectData as $key => $val)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="1500">


                        <img src="{{ url('/storage/assets/uploads/', $val->image) }}" class="d-block w-100 " height="500"
                            alt="..." style="   object-fit: cover; ">
                        <div class="text-center text-capitalize alert alert-success ">

                            <h3>{{ $val->fname }} {{ $val->lname }}</h3>
                            
                            {{-- <a href="#" class="btn btn-outline-primary btn-sm text-black">View
                                <i class="fa-regular fa-hand-point-right"></i></a> --}}
                        </div>
                    </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php } elseif(count($data)>2){?>


        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($data as $key => $val)
                    {{-- <h3>{{ $val->fname }}</h3> --}}

                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="1500">
                        <img src="{{ url('/storage/assets/uploads/', $val->image) }}" class="d-block w-100 " height="400"
                            alt="..." style="object-fit: cover;">
                    </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php }else{?>
        <h1>Welocome </h1>
        <?php }?>
    </section>
@endsection
