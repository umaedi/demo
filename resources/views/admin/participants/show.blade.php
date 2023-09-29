@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/admin/participants">Participants</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>PROFILE</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url($participant->img) }}" loading="lazy" alt="photo" width="100%" >
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input id="name" type="name" class="form-control" name="name" tabindex="1" value="{{ $participant->name }}">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="text" class="form-control" name="email" tabindex="2" value="{{ $participant->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Salutation</label>
                        <input type="text" class="form-control" name="email" tabindex="2" value="{{ $participant->salutation }}">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <input type="text" class="form-control" name="email" tabindex="2" value="{{ $participant->gender == "L" ? "Male" : "Female" }}">
                    </div>
                    <div class="form-group">
                      <label for="institution">Institution</label>
                      <input type="text" class="form-control" name="email" tabindex="2" value="{{ $participant->institution }}">
                    </div>
                    <div class="form-group">
                      <label for="country">Country of Institution</label>
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" tabindex="5" value="{{ $participant->country }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ $participant->no_tlp }}">
                    </div>
                    <div class="form-group">
                      <label for="gender">Participant Type</label>
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" tabindex="5" value="{{ $participant->type_user }}">
                    </div>
                    <div class="form-group">
                      <label for="persence">Presence</label>
                      <input id="persence" type="text" class="form-control" name="persence" tabindex="6" readonly value="{{ $participant->presence }}">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                        DELETE PARTICIPANT
                      </button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>SUBMISSIONS HISTORIES</h4>
              </div>
              <div class="card-body tanle-responsive" id="dataTable">
                <button id="loading" class="btn btn-primary btn-block btn-lg" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Please wait...
                </button>
              </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
<script type="text/javascript">
    $(document).ready(function() {
        loadData();
    });

    async function loadData()
    {
      var param = {
        url: '{{ url()->current() }}',
        method: 'GET',
        data: {load: 'table'},
      }

      await transAjax(param).then((ressult) => {
        $('#dataTable').html(ressult);
      }).catche((err) => {
        $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
      });
    }
</script>
@endpush