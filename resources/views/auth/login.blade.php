<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USer Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel = "stylesheet"
        integrity="sha384-2s6VKaIe6zUH36nE0J2a4ZHhj5Bw19zI0e1WmbyaDhZITmMqQg1S5PYk2Ef7N7fWA"
        crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4.col-md-offset-4" style="margin-top:20px;">
                <h4>Login</h4>
                <hr>
                <form action="{{route('login-user')}}" method="post">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('fail'))
                <div class="alert alert-danger">
                <p>{{ $message }}</p>
                </div>
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{old('email')}}">
                        <span class="text-danger">@error('name'){{$message}}@enderror</spam>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter Password" value="">
                        <span class="text-danger">@error('password'){{$message}}@enderror</spam>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <br>
                    <a href="registration">New User !! Register Here.</a>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-2s6VKaIe6zUH36nE0J2a4ZHhj5Bw19zI0e1WmbyaDhZITmMqQg1S5PYk2Ef7N7fWA"
    crossorigin="anonymous">
</script>

</html>