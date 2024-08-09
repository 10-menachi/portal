@extends('layouts.app')

@section('style')
    <link href="{{ base_url() }}assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Product Category Create</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="me-2">
                        <a href="{{ admin_url('categories') }}"
                            class="btn btn-primary waves-effect waves-light submitBtn">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <form id="salesForm" action="{{ admin_url('categories/create') }}" method="post">
        @csrf
        <div id="formContainer" class="formContainer">
            <div class="row">
                <div class="col-12 align-items-center">
                    <div class="card ">
                        <div class="card-body">
                            <div class="row formTemplate">
                                <div class="col-md-12">
                                    <div class="col-md-3 mb-3">
                                        <label class="mb-1">Product Category</label>
                                        <input type="text" class="form-control name" placeholder="Product Category Name"
                                            name="name" required="required">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="mb-1">Category Slug Name</label>
                                        <input type="text" class="form-control slugName" placeholder="Category Slug Name"
                                            name="slug_name" required="required">
                                    </div>
                                </div>
                            </div>
                            <div id="submitContainer" class="col-md-3 mb-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ base_url() }}assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ base_url() }}assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ base_url() }}assets/libs/flatpickr/flatpickr.min.js"></script>
@endsection
