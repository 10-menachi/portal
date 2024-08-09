@extends('layouts.app')

@section('style')
    <link href="{{ base_url() }}assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Product Edit</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="d-flex  align-items-center justify-content-end">
                    <div class="me-2">
                        <a href="{{ admin_url('products') }}"
                            class="btn btn-primary waves-effect waves-light submitBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open(admin_url('products/update'), ['class' => 'themeForm']) ?>
                    <input type="hidden" name="id" value="{{ $object['id'] }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3 mb-3">
                                <label class="mb-1">Title</label>
                                <input type="text" class="form-control postTitle" placeholder="Product name"
                                    name="postTitle" required="required" value="{{ $object['post_title'] }}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="mb-1">Name</label>
                                <input type="text" class="form-control postName" placeholder="Product Name"
                                    name="postName" required="required" value="{{ $object['post_name'] }}">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="mb-1">Product Excerpt</label>
                            <textarea id="tinymceTextArea" name="postExcerpt" class="form-control" rows="5">{{ $object['post_excerpt'] }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="mb-1">Additional Description</label>
                            <textarea id="tinymceTextArea" name="postContent" class="form-control" rows="5">{{ $object['post_content'] }}</textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-primary" type="submit"> Submit </button>
                        </div>

                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ base_url() }}assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ base_url() }}assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ base_url() }}assets/libs/flatpickr/flatpickr.min.js"></script>
@endsection
