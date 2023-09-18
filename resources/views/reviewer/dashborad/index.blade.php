@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/reviewer/submission" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-file"></i>
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
        </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/reviewer/submission/revised" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Submission Revised</h4>
              </div>
              <div class="card-body">
                {{ $submission_revised }}
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/reviewer/submission/accepted" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
             <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Submission Accepted</h4>
              </div>
              <div class="card-body">
                {{ $submission_accepted }}
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
          <a href="/reviewer/submission/rejected" style="text-decoration: none">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Submission Rejected</h4>
              </div>
              <div class="card-body">
                {{ $submission_rejected }}
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>SUBMISSION REVISED</h4>
              <div class="card-header-action">
                <a href="/reviewer/submission/revised" class="btn btn-primary">SHOW MORE</a>
              </div> 
            </div>
            <div class="card-body">
              <div class="card-body table-responsive" id="dataTable">
                <button class="btn btn-primary btn-block btn-lg" type="button">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Please wait...
                </button>
            </div>
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
        loadData();
      });

      async function loadData()
      {
          var param = {
              method: 'GET',
              url: '{{ url()->current() }}',
              data: {
                load: 'table',
              }
          }

          await transAjax(param).then((result) => {
                $('#dataTable').html(result)

            }).catch((err) => {
              console.log(err);
                $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });
      }
    </script>
@endpush