@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission Revised</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/reviewer/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4>SUBMISSION</h4>
                  </div>
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-body table-responsive" id="dataTable">
                    <button class="btn btn-primary btn-block btn-lg" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Please wait...
                      </button>
                </div>
            </div>
          </div>
      </div>
    </section>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        var page = 1;
        $(document).ready(function() {
            loadData();
        });

        async function loadData() {
            var param = {
                method: 'GET',
                url: '{{ url()->current() }}',
                data: {
                    load: 'table',
                    page: page,
                }
            }
            loading(true);
            await transAjax(param).then((result) => {
                loading(false);
                $('#dataTable').html(result)

            }).catch((err) => {
                $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });

        function loading(state) {
            if(state) {
                $('#loading').removeClass('d-none');
            } else {
                $('#loading').addClass('d-none');
            }
        }

      }

   //paginate
    function loadPaginate(to) {
        page = to
        loadData()
    }
</script>
@endpush