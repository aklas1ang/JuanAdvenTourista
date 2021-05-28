<?php include '../inc/navbar/sidebar.php'; ?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Hotel and Resort Admins</h1>
    <div class="container-fluid mt-5">
        <button class="float-left btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create a New Admin</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Firstname</label>
                                <input type="text" class="form-control" name="firstname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Middlename</label>
                                <input type="text" class="form-control" name="middlename">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lastname</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Type</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected value="1">Hotel</option>
                                    <option value="2">Resort</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Middlename</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Judy Ann</td>
                    <td>Arquisal</td>
                    <td>A</td>
                    <td>Hotel</td>
                    <td><a href="" class="btn btn-danger">Remove</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                    <td><button class="btn btn-danger">Remove</button></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>

</body>

</html>