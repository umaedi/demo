@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission Accepted</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/reviewer/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
            {{-- <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Search by name...">
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="perPage" name="pagination">
                                <option value="12">--Topic--</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="perPage" name="pagination">
                                <option value="12">--Perpage--</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                      </div>
                </div>
            </div> --}}
            <div class="card">
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