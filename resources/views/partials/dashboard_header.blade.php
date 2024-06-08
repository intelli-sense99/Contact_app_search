<?php
$userData = App\Http\Controllers\Subscriber_controller::userDetail();

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark navbar-dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('subject.dashboard') }}">


            <?php foreach($userData as $key=>$val){?>

            <?php if(isset($val->image)){?>
            <img src="{{ asset('storage/assets/uploads') . '/' . $val->image }}" height="40" width="40"
                alt="Null" style="border-radius:50%;">

            <?php }else{?>
            <img src="{{ asset('storage/assets/uploads/dumy.png') }}" height="40" width="40" alt="Null"
                style="border-radius:50%;">
            <?php }?>
            <?php }?>



        </a>
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex">


                {{-- dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Contacts
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item py-0" href="{{ route('subject.contactAdd') }}">Add</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item py-0" href="{{ route('subject.contactList') }}">List</a></li>

                    </ul>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-danger" onmouseover="this.style.textDecoration='underline'"
                        onmouseout="this.style.textDecoration='none'" href="{{ route('subject.logout') }}">Logout</a>
                </li>


            </ul>

        </div>
    </div>
</nav>
