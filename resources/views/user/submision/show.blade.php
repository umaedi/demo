@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/user/submission">Submission</a></div>
            <div class="breadcrumb-item">Show Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
          <button class="btn btn-danger mb-3">Withdraw</button>
          <button class="btn btn-warning mb-3">Delete</button>
          @if (session('msg.persentation'))
          <div class="alert alert-success">{{ session('msg.persentation') }}</div>
          @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="name">Gender</label>
                      <input type="text" class="form-control" id="name" value="{{ auth()->user()->gender == 'L' ? 'Male' : 'Female' }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" id="country" value="{{ auth()->user()->country }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number / Whatsapp</label>
                      <input type="number" class="form-control" id="no_tlp" name="institution" value="{{ auth()->user()->no_tlp }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="institution">Institution</label>
                      <input type="text" class="form-control" id="institution" name="institution" value="{{ auth()->user()->institution }}" readonly>
                    </div>
                </div>
            </div>
          <div class="card my-3">
            <div class="alert alert-primary"><h6>SUBMISSION HISTORIES</h6></div>
              <div class="card-body table-responsive" id="dataTable">
                <button class="btn btn-primary btn-block btn-lg" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Please wait...
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
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
            load: 'table'
          }
        }

        await transAjax(param).then((result) => {
            $('#dataTable').html(result);
        }).catch((err) => {
            $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });
    }

    var editor_config = {
        selector: "textarea.content",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        height: 500
    };

    tinymce.init(editor_config);
</script>
@endpush