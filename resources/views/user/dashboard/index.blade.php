@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
        <div id="clock" class="ml-auto h5 mt-2 font-weight-bold">
          <h6>{{ __('Loading...') }}</h6>
        </div>
      </div>
      <div class="alert alert-light alert-dismissible alert-has-icon" id="alert-1" style="background-color: #e3eaef42">
        <div class="alert-icon"><i class="fas fa-bullhorn"></i></div>
        <div class="alert-body mt-1">
            <button class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <p class="text-justify pr-5">
              <em><b>Information!</b> You are registered as an {{ auth()->user()->presence }} participant</em>
            </p>
        </div>
      </div>
      <div class="row">
        @if (auth()->user()->type_user == 'Participant')
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
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
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-file"></i>
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
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Certificate</h4>
              </div>
              <div class="card-body">
                {{ auth()->user()->sertifikat ?? "0" }}
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
      <div class="row my-3">
        <div class="col-lg-6 col-md-12 col-12 col-sm-12 mb-3">
          <div class="card">
            <div class="card-header">
              <h4>DOWNLOAD TEMPLATE</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Download</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Abstract Template</td>
                    <td  class="text-center"><a href="/user/download/template?q=abstract" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Full Paper Template</td>
                    <td  class="text-center"><a href="/user/download/template?q=full_paper" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>PPT Template</td>
                    <td  class="text-center"><a href="/user/download/template?q=ppt" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Background Video Conference (Online)</td> 
                    <td  class="text-center"><a href="/user/download/template?q=vidcon" class="btn btn-sm btn-success"><i class="fa fa-download"></i></a></td>
                  </tr>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 col-sm-12">
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

        jQuery(function($) {
          setInterval(function() {
              var date = new Date(),
                  time = date.toLocaleTimeString();
              $("#clock").html(time);
          }, 1000);
        });
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