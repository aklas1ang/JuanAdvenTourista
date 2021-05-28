<?php include '../inc/navbar/sidebar.php'; ?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Pending Spots</h1>
    <div class="container-fluid">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Spot Name</th>
                    <th scope="col">Location</th>
                    <th width="300px">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Panagsama Beach</td>
                    <td>Moalboal</td>
                    <td>
                        <div>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
                            <button class="btn btn-primary">Approve</button>
                            <button class="btn btn-warning">Decline</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>

                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Panagsama Beach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clearfix">
                        <div class="col-md-6 float-mb-end mb-3 border border-primary">
                            <img height="100%" width="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
</body>

</html>