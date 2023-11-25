<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>

                @foreach ($errors->all() as $error)
                    <div class="alert alert-success">
                        <li>{{ $error }}</li>
                    </div>
                    
                @endforeach

                @if(session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <!-- Laravel Form Opening -->
                    <form method="POST" action="{{ route('cek-login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <!-- Laravel Form Closing -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
