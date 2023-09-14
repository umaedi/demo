@extends('layouts.page')
@section('content')
<section class="section">
    <div class="container">
      <div class="page-error">
        <div class="page-inner">
          <img data-src="{{ asset('img/access_denied.png') }}" width="500" class="lazyload img-fluid" alt="Closing">
          {{-- <div class="page-description">
              Pendaftaran calon pimpinan baznas <br>sudah ditutup!
          </div> --}}
          {{-- <div class="page-search">
            <form>
              <div class="form-group floating-addon floating-addon-not-append">
                <div class="input-group">
                  <div class="input-group-prepend">
                  </div>
                  <a href="https://api.whatsapp.com/send?phone=6281273537355" target="_blank" class="btn btn-success btn-block">HUBUNGI ADMIN</a>
                </div>
              </div>
            </form>
          </div> --}}
        </div>
      </div>
      {{-- <div class="simple-footer">
          Developed by <a href="https://api.whatsapp.com/send?phone={{ env('NO_DEV') }}" target="_blank">Umaedi KH</a>. Copyright &copy; 2023 Diskominfo Tuba
      </div> --}}
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
@endsection
