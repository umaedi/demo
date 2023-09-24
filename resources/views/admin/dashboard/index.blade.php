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
    <div class="row">
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <a href="/admin/submission" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Users</h4>
              </div>
              <div class="card-body">
                4
              </div>
            </div>
          </div>
        </a>
    </div>
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <a href="/admin/submission" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Participants</h4>
              </div>
              <div class="card-body">
                {{ $participants }}
              </div>
            </div>
          </div>
        </a>
    </div>
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <a href="/admin/submissions" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Submissions</h4>
              </div>
              <div class="card-body">
                4
              </div>
            </div>
          </div>
        </a>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>ZOOM</h4>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="#">ID</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="#">Password</label>
            <input type="text" class="form-control">
          </div>
          <button class="btn btn-primary btn-block">SAVE</button>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Participants</h4>
          <div class="card-header-action">
            <div class="btn-group">
              <button onclick="participantsOffline('Offline')" class="btn btn-primary">Offline : {{ $participantsOffline }}</button>
              <button onclick="participantsOnline('Online')" class="btn btn-primary">Online : {{ $participantsOnline }}</button>
            </div>
          </div>
        </div>
          <div class="card-body"> 
            <button id="loading" class="btn btn-primary btn-block btn-lg d-none" type="button">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Please wait...
            </button>
            <div class="table-responsive" id="dataTable">

            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
@push('js')
<script type="text/javascript">
var _data = "";
  $(document).ready(function() {
    loadData();

    jQuery(function($) {
      setInterval(function() {
          var date = new Date(),
              time = date.toLocaleTimeString();
          $("#clock").html(time);
      }, 1000);
    });
  });

  function participantsOffline(value) {
    loadData(value);
  }

  function participantsOnline(value) {
    $('#loading').removeClass('d-none');
    loadData(value);
  }

  async function loadData(value)
  {
    var param = {
        method: 'GET',
        url: '{{ url()->current() }}',
        data: {
          load: 'table',
          data: value
        }
    }

    loading(true);
    await transAjax(param).then((result) => {
          loading(false);
          $('#dataTable').html(result)

      }).catch((err) => {
        loading(false);
          $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
    });

    function loading(state)
    {
      if(state) {
        $('#loading').removeClass('d-none');
      }else {
        $('#loading').addClass('d-none');
      }
    }
  }
</script>
@endpush