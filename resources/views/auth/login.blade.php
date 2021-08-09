<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Voting | Login</title>
    {{-- Boostrap CSS --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- Page specific CSS --}}
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}">
</head>
<body>
    <div class="card box-login box">
        <div class="card-body">
            <h3 class="card-title text-center mt-3">E-Voting</h3>
            {{-- Error --}}
            <div class="mt-5">
                @error('email')
                    <small class="form-text text-danger text-center">{{ $message }}</small>
                @enderror
                @error('password')
                    <small class="form-text text-danger text-center">{{ $message }}</small>
                @enderror
            </div>
            {{-- End Error --}}
            <form class="mt-5" action="{{ route('login') }}" method="POST">
            @csrf
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-describedby="passwordHelp" name="password">
                </div>
                <div class="form-group">
                    <button class="btn w-100" type="submit">Login</button>
                </div>
            </form>
            <p>Don't have an account yet? <a href="{{ route('register') }}">Click here</a> to register</p>
        </div>
    </div>
    {{-- Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>