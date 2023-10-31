@extends('layouts.app')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Submission</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="/user/submission">Submission</a></div>
            <div class="breadcrumb-item">Detail Submission</div>
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
          @if (session('msg'))
          <div class="alert alert-warning">{{ session('msg') }}</div>
          @endif
            <div class="card">
              <div class="card-header">
                <h4>DETAIL SUBMISSION</h4>
              </div>
              <div class="card-body">
                <form action="/user/submission/update/{{ $submission->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Paper Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $submission->title }}">
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
                      <input type="text" class="form-control @error('keyword') is-invalid @enderror" id="keyword" name="keyword" value="{{ old('keyword') ?? $submission->keyword}}">
                      @error('keyword')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="topic">Topic</label>
                      <input type="text" class="form-control" id="topic" name="{{ $submission->topic }}" value="{{ old('topic') ?? $submission->topic}}">
                    </div>
                    <div class="form-group">
                      <label for="abstract_file">Abstract</label>
                      <input type="file" class="form-control mb-2 @error('abstract_file') is-invalid @enderror" id="abstract_file" name="abstract_file">
                      @error('abstract_file')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="paper">Full Paper</label>
                      <input type="file" class="form-control mb-2 @error('paper') is-invalid @enderror" id="paper" name="paper">
                      @error('paper')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="author">Author (<span class="text-danger">*</span>)</label>
                      <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') ?? $submission->author }}">
                      @error('author')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="message">Message (optional)</label>
                      <textarea class="form-control" id="message" name="message">{{ old('message') ?? $submission->message}}</textarea>
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
                          <td> <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->loa) }}" target="_blank">Download LOA</a></td>
                          @else
                          <td>Not yet available</td>
                          @endif
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
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
               <div class="card mt-3">
                 <div class="alert alert-primary"><h6>REVIEWER</h6></div>
                 <div class="card-body">
                  <div class="form-group">
                    <label for="name">Reviewer Comments</label>
                    <textarea type="text" class="form-control mb-2" style="height: 100px" id="name" readonly>{{ $submission->comment }}</textarea>
                    @if ($submission->rev_abstract_file !== null)
                    <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->rev_abstract_file) }}" target="_blank">See what's in correction (abstract)</a> |
                    @endif
                    @if ($submission->rev_paper !== null)
                    <a href="{{ \Illuminate\Support\Facades\Storage::url($submission->rev_paper) }}" target="_blank">See what's in correction (full paper)</a>
                    @endif
                  </div>
              </div>
            </div>
            @if (!in_array($submission->acc, [2,3,4]))
            <button type="submit" class="btn btn-primary mt-3">UPDATE</button>
            @endif
          </form>
        </div>
    </div>
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