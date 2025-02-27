@extends('admin.layouts.app')

@section('content')


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="page-inner">
    <div class="page-header">

        <h3 class="fw-bold mb-3">Faq Management</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a>
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a>Faq Update Form</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
             
                <div class="card-body">
                    <form method="POST" action="{{ route('faqs.update', dEncrypt($faq->id)) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question:</strong>
                                    <input type="text" minlength="1" maxlength="200" name="question" value="{{ $faq->question ??"" }}" placeholder="question" class="form-control preventnumeric">

                                    @error('question')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Answer:</strong>
                                    <textarea name="answer" placeholder="answer" class="form-control">{!! $faq->answer ??''  !!}</textarea>
                                </div>
                            </div>

                           
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sort Order:</strong>
                                    <input type="text" name="order" minlength="1" maxlength="3" placeholder="Sort order" class="form-control mobile_no" value="{{ $faq->order ??"" }}">
                                    @error('order')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Content Name:</strong>
                                    <br />
                                    <select name="content_id" class="form-control">
                                        <option value=''>Section Option</option>
                                        @foreach($contentId as $contentlist)
                                        <option value='{{ $contentlist->id  ??""}}' @if($contentlist->id == $faq->content_id) selected @endif>
                                            {{ $contentlist->title ??"" }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="status" value="{{ $faq->status }}" class="form-control">


                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger" href="{{ route('faqs.index') }}"> Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    CKEDITOR.replace('answer');
   
</script>

@endsection
