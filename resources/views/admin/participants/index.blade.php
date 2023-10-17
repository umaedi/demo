@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Participants</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Participants</div>
          </div>
      </div>
      <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input id="search" class="form-control" type="text" name="q" placeholder="Serach by id or name...">
                </div>
                <div class="col-md-3">
                    <select id="presence" class="form-control" name="presence">
                        <option value="">--Presence--</option>
                        <option value="Online">Participant Online</option>
                        <option value="Offline">Participant Offline</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="type_user" class="form-control" name="type_user">
                        <option value="">--User Type--</option>
                        <option value="Presenter">Presenter (Oral)</option>
                        <option value="Participant Only">Participant Only</option>
                    </select>
                </div>
                <div class="col-md-2">
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
            <div class="mb-3">
                <button type="button" class="btn btn-primary">
                    Participant Online <span class="badge badge-light">{{ $online }}</span>
                </button>
                <button type="button" class="btn btn-primary">
                    Participant Offline <span class="badge badge-light">{{ $offline }}</span>
                </button>
                <button type="button" class="btn btn-primary">
                    Presenter (Oral) <span class="badge badge-light">{{ $presenter }}</span>
                </button>
                <button type="button" class="btn btn-primary">
                    Participant Only <span class="badge badge-light">{{ $participant }}</span>
                </button>
            </div>
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
        var q = '';
        var page = 1;
        var pagination = '';
        var presence = '';
        var type_user = '';
        $(document).ready(function() {
            loadData();

            $('#search').on('keypress', function(e) {
                if(e.which == 13) {
                    filterTable();
                    return false;
                }
            });

            $('#presence').on('change', () => {
                filterTable();
            });
            $('#type_user').on('change', () => {
                filterTable();
            });
            $('#page').on('change', () => {
                filterTable();
            });
        });

        function filterTable()
        {
            q = $('#search').val();
            presence = $('#presence').val()
            type_user = $('#type_user').val();
            pagination = $('#page').val();
            loadData();
        }

        async function loadData() {
            var param = {
                method: 'GET',
                url: '{{ url()->current() }}',
                data: {
                    load: 'table',
                    q: q,
                    page: page,
                    presence: presence,
                    type_user: type_user,
                    pagination: pagination
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

    function persence(id, value)
    {
        var param = {
            method: 'POST',
            url: '/admin/persence/user/' + id,
            data: {value : value},
            load: 'table',
         
        }
        transAjax(param).then((res) => {
            filterTable();
        });
    }
</script>
@endpush