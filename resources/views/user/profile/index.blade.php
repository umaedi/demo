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
        @if (session('status'))
        <div class="alert alert-success">
          @if (session('status')=='profile-information-updated')
          Profile has been updated.
          @endif
          @if (session('status')=='password-updated')
          Password has been updated.
          @endif
          @if (session('status')=='two-factor-authentication-disabled')
          Two factor authentication disabled.
          @endif
          @if (session('status')=='two-factor-authentication-enabled')
          Two factor authentication enabled.
          @endif
          @if (session('status')=='recovery-codes-generated')
          Recovery codes generated.
          @endif
        </div>
        @endif
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>UPDATE PROFILE</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->img) }}" loading="lazy" alt="photo" width="100%" >
                      <input id="image" type="file" class="form-control @error('img') is-invalid @enderror" name="img" tabindex="1" value="" onchange="previewImage()" accept=".jpg, .jpeg, .png">
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" tabindex="1" value="{{ auth()->user()->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="2" value="{{ auth()->user()->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="salutation">Salutation</label>
                      <select class="form-control @error('salutation') is-invalid @enderror" id="salutation" name="salutation" tabindex="3" value="{{ auth()->user()->salutation }}">
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
                      <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" tabindex="4" value="{{ auth()->user()->gender }}">
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
                      <input id="institution" type="text" class="form-control @error('institution') is-invalid @enderror" name="institution" tabindex="5" value="{{ auth()->user()->institution }}">
                      @error('institution')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="country">Country of Institution</label>
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" tabindex="5" value="{{ auth()->user()->country }}">
                      @error('country')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ auth()->user()->no_tlp }}">
                      @error('no_tlp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="gender">Participant Type</label>
                      <select class="form-control @error('type_user') is-invalid @enderror" id="gender" name="type_user" tabindex="7" value="{{ auth()->user()->type_user }}">
                        <option value="Presenter" {{ auth()->user()->type_user == 'Persenter' ? 'selected' : '' }}>Presenter (Oral)</option>
                        <option value="Participant" {{ auth()->user()->type_user == 'Participant' ? 'selected' : '' }}>Participant Only</option>
                      </select>
                      @error('type_user')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="persence">Persence</label>
                      <input id="persence" type="text" class="form-control" name="persence" tabindex="6" readonly value="{{ auth()->user()->persence }}">
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
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>UPDATE PASSWORD</h4>
              </div>
              <form method="POST" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" tabindex="3">
                  @error('current_password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gender">New Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="3">
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    UPDATE PASSWORD
                  </button>
                </div>
              </div>
            </form>
            </div>
          </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>TWO-FACTOR AUTHENTICATION</h4>
                </div>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))  
                <div class="card-body">
                  @if(! auth()->user()->two_factor_secret)
                    {{-- Enable 2FA --}}
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Enable Two-Factor</button>
                    </form>
                    @else
                    {{-- Disable 2FA --}}
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">
                            Disable Two-Factor
                        </button>
                    </form>
                    @if(session('status') == 'two-factor-authentication-enabled')
                    {{-- Show SVG QR Code, After Enabling 2FA --}}
                    <div class="mt-4">
                      Two-factor authentication is now enabled. Scan the following QR code using your phone's authenticator app. We recommend using <a class="text-bold" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US" target="_blank"> Google Authenticator </a>
                    </div>

                    <div class="mb-3 mt-4">
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    </div>
                    @endif

                    {{-- Show 2FA Recovery Codes --}}
                    <div class="mt-4">
                      Store this recovery code safely. It can be used to restore access to your account if your two-factor authentication device is lost.
                    </div>

                    <div style="background: rgb(44, 44, 44);color:white" class="rounded p-3 mb-2 mt-4">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                        @endforeach
                    </div>

                    {{-- Regenerate 2FA Recovery Codes --}}
                    <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                        @csrf

                        <button type="submit"
                            class="mt-4 btn btn-primary">
                            Regenerate Recovery Codes
                        </button>
                    </form>
                @endif
                </div>
                @endif
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