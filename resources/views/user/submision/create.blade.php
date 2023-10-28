@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/user/submission">Submission</a></div>
            <div class="breadcrumb-item">Create Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
          @if (session('msgQueue'))
          <div class="alert alert-warning">{{ session('msgQueue') }}</div>
          @endif
            <div class="card">
              <div class="card-header">
                <h4>CREATE SUBMISSION</h4>
              </div>
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
            <div class="card mt-3">
                <div class="card-body">
                    <form action="/user/submission/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Paper Title (<span class="text-danger">*</span>)</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                          @error('title')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="abstract">Abstract (<span class="text-danger">*</span>)</label>
                          <textarea type="text" class="content form-control @error('abstract') is-invalid @enderror" id="abstract" name="abstract">{{ old('abstract') }}</textarea>
                          @error('abstract')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="keyword">Keyword (<span class="text-danger">*</span>)</label>
                          <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{ old('keyword') }}">
                          @error('keyword')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="topic">Topic (<span class="text-danger">*</span>)</label>
                          <select name="topic" class="form-control  @error('topic') is-invalid @enderror" id="gender" name="topic" tabindex="4" value="{{ old('topic') }}">
                            <option value="">--Please select one--</option>
                            @foreach ($categories as $ct)
                            <option value="{{ $ct->name }}">{{ $ct->name }}</option>
                            @endforeach
                          </select>
                          @error('topic')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="abstract_file">Abstract (<span class="text-danger">*</span>)</label>
                          <input type="file" class="form-control @error('abstract_file') is-invalid @enderror" id="abstract_file" name="abstract_file">
                          @error('abstract_file')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="paper">Full Paper</label>
                          <input type="file" class="form-control @error('paper') is-invalid @enderror" id="paper" name="paper">
                          @error('paper')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="author">Author (<span class="text-danger">*</span>)</label>
                          <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author">
                          @error('author')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="message">Message (optional)</label>
                          <textarea class="form-control" id="message" name="message">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script>
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