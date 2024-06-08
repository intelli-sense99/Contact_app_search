<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark navbar-dark ">
    <div class="container-fluid d-flex justify-content-around">
        <a class="navbar-brand" href="#">
            <i class="fa-brands fa-vaadin fs-3 " style="color: #B197FC;"></i>
        </a>
        <div class="">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">
                <li class="nav-item"><a class="nav-link" href="{{ route('subject.create') }}">Register</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('subject.usersList') }}">List</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('subject.loginUser') }}">Login</a></li>

            </ul>
        </div>
    </div>
</nav>
