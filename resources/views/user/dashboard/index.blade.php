@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        @if (auth()->user()->type_user == 'Participant')
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/user/profile" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
                {{ auth()->user()->name }}
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-6 col-12 mb-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Certificate</h4>
              </div>
              <div class="card-body">
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/user/profile" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
                {{ auth()->user()->name }}
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Certificate</h4>
              </div>
              <div class="card-body">
                {{ $sertifikat }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="/user/submission" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Submission</h4>
              </div>
              <div class="card-body">
                {{ $submission }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <a href="/user/loa" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>LOA</h4>
              </div>
              <div class="card-body">
                {{ $loa }}
              </div>
            </div>
          </div>
        </div>
        </a>
        @endif
      </div>
      <div class="row mt-4">
        <div class="col-lg-4 col-md-12 col-12 col-sm-12 mb-3">
          <div class="card">
            <div class="card-header">
              <h4>TICKET</h4>
            </div>
                <div class="card-body img-fluid" id="qrcode">
                  {!! QrCode::size(300)->generate(env('APP_URL'). '/user/qr_code/validation?='. auth()->user()->qrcode); !!}       
                </div>
              <a href="/user/scan-qr" class="btn btn-primary">SCAN ME</a>
          </div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>CERTIFICATE</h4>
              @if (auth()->user()->sertifikat !== NULL)
              <div class="card-header-action">
                <a href="/user/download-sertifikat" class="btn btn-primary">Download</a>
              </div> 
              @endif
            </div>
            <div class="card-body">
              @if (auth()->user()->sertifikat !== NULL)
              <img src="{{ asset('sertifikat/' . auth()->user()->sertifikat  . '.jpg') }}" class="img-fluid" alt="Sertifikat">
              @else
              <img data-src="{{ asset('sertifikat/sertifikat.png') }}" class="lazyload img-fluid" alt="Sertifikat">
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
    <script type="text/javascript">
      $(document).ready(function() {
        loadSertifikat();
        $('#qrcode svg').attr('width', '100%');
        $('#qrcode svg').attr('height', '100%');
      });

      async function loadSertifikat()
      {
          var param = {
              method: 'GET',
              url: '{{ url()->current() }}',
          }

          await transAjax(param).then((result) => {
            console.log('sertifikat successfully generate');
          });
      }
    </script>
@endpush