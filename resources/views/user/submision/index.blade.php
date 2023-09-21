@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
            <a href="/user/submission/create" class="btn btn-primary mb-3">CREATE SUBMISSION</a>
            @if ($submission->status ?? '')
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#uploadPPT">UPLOAD PERSENTATION</button>
            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#uploadPaper">UPLOAD FULL PAPER</button>
            @endif
            @if (session('msg.persentation'))
            <div class="alert alert-success">{{ session('msg.persentation') }}</div>
            @endif
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if($errors->has('ppt'))
                <div class="alert alert-warning">{{ $errors->first('ppt') }}</div>
            @endif
            @if($errors->has('paper'))
                <div class="alert alert-warning">{{ $errors->first('paper') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>SUBMISSION</h4>
                  </div>
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
    <!-- Modal upload PPT-->
    <div class="modal fade" id="uploadPPT" tabindex="-1" role="dialog" aria-labelledby="uploadPPTLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="uploadPPTLabel">UPLOAD PERSENTATION</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/user/persentation/ppt/{{ $submission->id ?? '' }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
            <input type="file" name="ppt" id="ppt" class="form-control" required>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Modal uploadPaper-->
    <div class="modal fade" id="uploadPaper" tabindex="-1" role="dialog" aria-labelledby="uploadPaperLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="uploadPaperLabel">UPLOAD FULL PAPER</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/user/persentation/paper/{{ $submission->id ?? ''}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
            <input type="file" name="paper" id="paper" class="form-control" required>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            </div>
        </div>
        </div>
    </div>
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