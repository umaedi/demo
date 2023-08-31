@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->img) }}" loading="lazy" alt="photo" width="100%" >
                </div>
              </div>
            </div>
            <div class="col-md-9">
              @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
              @endif
              <div class="card">
                <div class="card-body">
                    <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                      @method('PUT')
                        @csrf
                      <div class="form-group">
                        <label for="img">Photo</label>
                        <input id="image" type="file" class="form-control" name="img" tabindex="1" value="" onchange="previewImage()">
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="name" class="form-control" name="name" tabindex="1" value="{{ auth()->user()->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" tabindex="2" value="{{ auth()->user()->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="salutation">Salutation</label>
                        <select class="form-control" id="salutation" name="salutation" tabindex="3" value="{{ auth()->user()->salutation }}">
                          <option value="Mr" {{ auth()->user()->salutation == 'Mr' ? 'selected' : '' }}>Mr</option>
                          <option value="Mrs"  {{ auth()->user()->salutation == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                          <option value="Ms"  {{ auth()->user()->salutation == 'Ms' ? 'selected' : '' }}>Ms</option>
                          <option value="Dr"  {{ auth()->user()->salutation == 'Dr' ? 'selected' : '' }}>Dr</option>
                          <option value="Prof"  {{ auth()->user()->salutation == 'Prof' ? 'selected' : '' }}>Prof</option>
                        </select>
                        @error('salutation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" tabindex="4" value="{{ auth()->user()->gender }}">
                          <option value="L" {{ auth()->user()->gender == 'L' ? 'selected' : '' }}>Male</option>
                          <option value="P" {{ auth()->user()->gender == 'P' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="institution">Institution</label>
                        <input id="institution" type="text" class="form-control" name="institution" tabindex="5" value="{{ auth()->user()->institution }}">
                        @error('institution')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="country">Country of Institution</label>
                        <input id="country" type="text" class="form-control" name="country" tabindex="5" value="{{ auth()->user()->country }}">
                        @error('country')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">Mobile Number/WhatsApp</label>
                        <input id="no_tlp" type="number" class="form-control" name="no_tlp" tabindex="6" value="{{ auth()->user()->no_tlp }}">
                        @error('no_tlp')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="gender">Participant Type</label>
                        <select class="form-control" id="gender" name="type_user" tabindex="7" value="{{ auth()->user()->type_user }}">
                          <option value="Presenter" {{ auth()->user()->type_user == 'Persenter' ? 'selected' : '' }}>Presenter (Oral/Poster)</option>
                          <option value="Participant" {{ auth()->user()->type_user == 'Participant' ? 'selected' : '' }}>Participant Only</option>
                        </select>
                        @error('type_user')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="gender">New Password</label>
                        <input id="password" type="password" class="form-control" name="password" tabindex="3">
                        @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          SAVE CHANGES
                        </button>
                      </div>
                    </form>
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
    function previewImage()
    {
        const imgPreview = document.querySelector('#imgPreview');
        const image = document.querySelector('#image');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>
@endpush