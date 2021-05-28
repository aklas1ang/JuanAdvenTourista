<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Admin Login</title>
</head>

<body>
    <div class="container py-5 d-flex justify-content-center align-items-center flex-column">
        <div class="mt-5 mb-3">
            <h1>Admin Login</h1>
        </div>
        <div class="w-50">
            <?php
                if(isset($_GET['Error'])){
            ?>
                    <div class="alert alert-danger">
                        <?php echo $_GET['Error']; ?>
                    </div>
            <?php
                }
            ?>
            <form action="../verification/adminVerification.php" method="POST" class="text-center">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Log In</button>
            </form>
        </div>

    </div>
</body>

</html>