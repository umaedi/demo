@extends('layouts.auth')
@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card card-primary">
            <div class="card-header"><h4>Lupa Password</h4></div>
            <div class="card-body">
              <form method="POST" action="/forgot-password">
                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" tabindex="1" required autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                  <button type="submit" id="btn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Reset Password
                  </button>
                </div>
              </form>
            </div>
          </div>
          {{-- <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div> --}}
        </div>
      </div>
    </div>
  </section>
@endsection
@push('js')
    <script type="text/javascript">
        // let btn = document.getEelementById('btn');
        // btn.click(function() {
        //     console.log('ok');
        // });
    </script>
@endpush
