@extends('layouts.auth')
@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="card card-primary">
            <div class="card-body">
                <div class="card-body img-fluid" id="qrcode">
                    {!! QrCode::size(300)->generate(env('APP_URL'). '?qrcode='. auth()->user()->qrcode); !!}       
                </div>
            </div>
            <button class="btn btn-primary" disabled>SCAN ME</button>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#qrcode svg').attr('width', '100%');
      $('#qrcode svg').attr('height', '100%');
    });
  </script>
@endpush
