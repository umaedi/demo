@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/reviewer/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/reviewer/submission">Submission</a></div>
            <div class="breadcrumb-item">Edit Submission</div>
          </div>
      </div>
      <form action="/reviewer/submission/update/{{ $submission->id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
          @csrf
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" value="{{ $submission->user->name }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="name">Gender</label>
                      <input type="text" class="form-control" id="name" value="{{ $submission->user->gender == 'L' ? 'Male' : 'Female' }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" id="country" value="{{ $submission->user->country }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $submission->user->email }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">Mobile Number / Whatsapp</label>
                      <input type="number" class="form-control" id="no_tlp" name="institution" value="{{ $submission->user->no_tlp }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="institution">Institution</label>
                      <input type="text" class="form-control" id="institution" name="institution" value="{{ $submission->user->institution }}" readonly>
                    </div>
                </div>
            </div>
    </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>DETAIL SUBMISSION</h4>
              </div>
              <div class="card-body">
                    <div class="form-group">
                      <label for="title">Paper Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $submission->title }}" readonly>
                      @error('title')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="abstract">Abstract</label>
                      <textarea type="text" class="content form-control @error('abstract') is-invalid @enderror" id="abstract" name="abstract">{{ old('abstract') ?? $submission->abstract}}</textarea>
                      @error('abstract')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="keyword">Keyword</label>
                      <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" readonly value="{{ old('keyword') ?? $submission->keyword}}">
                      @error('keyword')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="topic">Topic</label>
                      <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" readonly value="{{ old('topic') ?? $submission->topic}}">
                      @error('topic')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="paper">Abstract</label>
                      <input type="file" class="form-control mb-2 @error('paper') is-invalid @enderror" id="paper" name="paper">
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->abstract_file) }}" target="_blank">Link Abstract</a>
                      @error('paper')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="paper">Full Paper</label>
                      <input type="file" class="form-control mb-2 @error('paper') is-invalid @enderror" id="paper" name="paper">
                      @if ($submission->paper == "")
                      <a href="javascript:void()">Not yet available</a>
                      @else
                      <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->paper) }}" target="_blank">Link Full Paper</a>
                      @endif
                      @error('paper')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="message">Message (optional)</label>
                      <textarea class="form-control" id="message" name="message" readonly>{{ old('message') ?? $submission->message}}</textarea>
                    </div>
                  </div>
               </div>
               <div class="card my-3">
                <div class="alert alert-primary"><h6>SUBMISSION INFORMATION</h6></div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Submission Status</th>
                          <th scope="col">LOA</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @if ($submission->status == '1')
                          <td>Revised</td>
                          @elseif($submission->status == '2')
                          <td>Accepted</td>
                          @elseif($submission->status == '3')
                          <td>Rejected</td>
                          @else
                          <td>No set</td>
                          @endif
                          @if ($submission->status == '2')
                          <td> <a href="/user/loa_download/{{ $submission->id }}">Download LOA</a></td>
                          @else
                          <td>Not yet available</td>
                          @endif
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
              @if ($submission->status == "2")
              <div class="card my-3">
                <div class="alert alert-primary"><h6>PERSENTATION & PAPER</h6></div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Abstract</th>
                        <th scope="col">Full Paper</th>
                        <th scope="col">PPT</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if ($submission->abstract_file !== null)
                        <td> <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->abstract_file) }}" target="_blank">Download Abstarct</a></td>
                        @else
                        <td>Not yet available</td>
                        @endif
                        @if ($submission->paper !== null)
                        <td> <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->paper) }}" target="_blank">Download Full Paper</a></td>
                        @else
                        <td>Not yet available</td>
                        @endif
                        @if ($submission->ppt !== null)
                        <td> <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->ppt) }}" target="_blank">Download PPT</a></td>
                        @else
                        <td>Not yet available</td>
                        @endif
                      </tr>
                    </tbody>
                  </table>
              </div>
              </div>
              @endif
               <div class="card mt-3">
                 <div class="alert alert-primary"><h6>REVIEWER</h6></div>
                 <div class="card-body">
                  <div class="form-group">
                    <label for="name">Reviewer Comments</label>
                    <textarea type="text" name="comment" class="form-control mb-2" style="height: 100px" id="name">{{ $submission->comment }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Submission Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="exampleFormControlSelect1">
                      <option value="">--Select one--</option>
                      <option value="1">Revised</option>
                      <option value="2">Accepted</option>
                      <option value="3">Rejected</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div id="loa" class="form-group d-none">
                    <label for="loa">LOA</label>
                    <input type="file" class="loa form-control" name="loa">
                  </div>
              </div>
            </div>
            @if ($submission->acc !== 1 && $submission->status != "3")
            <button type="submit" class="btn btn-primary mt-3">UPDATE</button>
            @endif
        </div>
      </div>
    </form>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
<script type="text/javascript">
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