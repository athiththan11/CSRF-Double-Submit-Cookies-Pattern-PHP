<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSRF Double Submit Cookies Pattern | Error</title>
</head>

<body>

    <ul class="nav justify-content-center mt-3">
        <li class="nav-item">
            <a class="btn btn-link" href="/index.php">Home</a>
        </li>
    </ul>

    <div class="container">
        <div class="row">

            <div class="col-md-5 mt-5 mx-auto p-5">
                <p class="lead text-center text-danger">
                    <b>Error</b>
                </p>
                <p class="text-center">
                    The provided csrf token and the cookie stored token are not same. So, the transaction between the end-points is interrupted.
                </p>
            </div>

        </div>
    </div>

</body>

</html>