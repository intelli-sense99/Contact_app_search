@extends('layout.default')
@section('content')
    <section>
        <table class="table table-bordered table-dark table-hover  ">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($output as $key => $value) {?>

                <tr>

                    <th scope="row"><?php echo $value['id']; ?></th>
                    <td><?php echo $value['fname']; ?></td>
                    <td><?php echo $value['lname']; ?></td>
                    <td><?php echo $value['phone']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['password']; ?></td>
                    <td>
                        <a href="/user/delete/<?php echo $value['id']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                        <a href="/user/edit/<?php echo $value['id']; ?>" class="btn btn-outline-success btn-sm">Update</a>
                    </td>
                </tr>
                <?php }?>


            </tbody>

        </table>
        <div class=" d-flex justify-content-center py-3 ">
            {{ $output->links() }}

        </div>
    </section>
@endsection
