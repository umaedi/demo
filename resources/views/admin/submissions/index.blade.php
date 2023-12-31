@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submissions</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Submissions</div>
          </div>
      </div>
      <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <select id="status" class="form-control" name="status">
                        <option value="">--Status--</option>
                        <option value="2">Accepted</option>
                        <option value="1">Revised</option>
                        <option value="3">Rejected</option>
                        <option value="0">No Set</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="topic" class="form-control" name="topic">
                        <option value="">--Topic--</option>
                        <option value="Biomolecular">Biomolecular</option>
                        <option value="Genetic">Genetic</option>
                        <option value="Degenerative Desease">Degenerative Desease</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="page" class="form-control" name="page">
                        <option value="">--Perpage--</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
              <div class="card">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <button id="loading" class="btn btn-primary btn-block btn-lg" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Please wait...
                </button>
                <div class="card-body table-responsive" id="dataTable">
                    
                </div>
            </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Download Abstract, Paper & PPT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="downloadData">
            <button class="btn btn-primary btn-block btn-lg" type="button" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Please wait...
            </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        var page = 1;
        var pagination = 10;
        var status = '';
        var topic = '';
        $(document).ready(function() {
            loadData();

            $('#status').on('change', () => {
                filterTable();
            });
            $('#topic').on('change', () => {
                filterTable();
            });
            $('#page').on('change', () => {
                filterTable();
            });
        });

        function filterTable()
        {
            topic = $('#topic').val()
            status = $('#status').val();
            pagination = $('#page').val();
            loadData();
        }

        async function loadData() {
            var param = {
                method: 'GET',
                url: '{{ url()->current() }}',
                data: {
                    load: 'table',
                    page: page,
                    topic: topic,
                    status: status,
                    paginate: pagination
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
        filterTable()
    }

    //download
    async function downloadData(id)
    {
      var param = {
        method : "GET",
        url: '/admin/download/submission/'+id,
        data: {
          load: 'table'
        }
      }

      await transAjax(param).then((result) => {
        $('#downloadData').html(result);
      }).catch((err) => {
        $('#downloadData').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`);
      });
    }
</script>
@endpush