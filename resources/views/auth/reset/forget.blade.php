<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Your Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        @if(Session::has('email'))
        <div class="alert alert-danger mt-3">{{Session::get('email')}}</div>
        @endif
        @if(Session::has('status'))
        <div class="alert alert-success mt-3">{{Session::get('status')}}</div>
        @endif
        <div class="card border-0 shadow-sm mx-auto mt-5 rounded-0" style="width :35%;">
            <div class="card-header bg-success border-0 text-center text-white rounded-0">
                <h4 class="fw-bold">Reset Your Password</h4>
            </div>
            <form action="{{route('password.request')}}" method="post">
                @csrf
                <div class="card-body">
                    <label for="" class="mt-2 mb-2">Enter Your Email </label>
                    <input type="text" class="form-control" name="email">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="card-footer">
                    <button class="btn btn-success text-white form-control">Send Link</button>
                    <a href="{{route('login.index')}}" class="d-block pt-2 pb-2 float-end">back to login</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>