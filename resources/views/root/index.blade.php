<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SEKELIK PMPTSP</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/style.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mt-5">
            @if (session()->has('error'))
            <div class="alert alert-warning">{{ session('error') }}</div>
            @endif
            <div class="card">
              <img src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo icomesh" class="rounded-top">
              <div class="card-body">
                <form action="/login" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                  </div>
                  <div class="form-group">
                    {{-- @include('layouts._loading_submit') --}}
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            {{-- <div class="simple-footer">
              Developed by <a href="https://api.whatsapp.com/send?phone={{ env('NO_DEV') }}" target="_blank">Umaedi KH</a>. Copyright &copy; {{ date('Y') }} Diskominfo Tuba
            </div> --}}
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>
