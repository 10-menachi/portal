@extends('layouts.app')

@section('style')
    <link href="{{base_url()}}assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Sale Edit</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Sales</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="d-flex  align-items-center justify-content-end">
                    <div class="me-2">
                        <a href="{{ admin_url('sales') }}" class="btn btn-primary waves-effect waves-light submitBtn">Back</a>
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
                    <?= form_open( admin_url('sales/update') ,['class'=>'themeForm']) ?>
                    <input type="hidden" name="post_id" value="{{ $object['id'] }}">

                    <div class="row">

                        <div class="col-md-3 mb-3">
                            <label class="mb-1">Model Number / Part Number</label>
                            <input id="sku" type="text" class="form-control" required="required" placeholder="Model Number / Part Number" name="sku" value="{{ $object['sku'] }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="mb-1">Product</label>
                            <input  type="hidden" class="form-control" required="required" placeholder="Product" name="productId" value="{{ $object['productId'] }}">
                            <input  type="text" class="form-control" readonly placeholder="Product" name="productName" value="{{ $product['title'] }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="mb-1">Warranty Start Date</label>
                            <input type="text" class="form-control startDate" placeholder="Warranty Start Date"  name="startDate" required="required" value="{{ $object['startDate'] }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="mb-1">Warranty End Date</label>
                            <input type="text" class="form-control endDate"  placeholder="Warranty End Date" name="endDate" required="required" value="{{ $object['endDate'] }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="mb-1">Product Qr Code</label>
                            <input type="text" class="form-control" required="required" placeholder="Product Qr Code" name="qr_code" value="{{ $object['qr_code'] }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="mb-1">Additional Description</label>
                            <textarea id="tinymceTextArea" name="description" class="form-control" rows="5">{{ $object['description'] }}</textarea>
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
    <script>

        tinymce.init({
            selector:'#tinymceTextArea',
            plugins: ['paste','lists','code','table','link','preview'], //image
            branding: false,
            //menubar: true,
            menubar: 'file edit insert view format table tools help',
            toolbar_sticky: true,
            height: 350,
            paste_as_text: true,
            paste_enable_default_filters: true,
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true,
            toolbar: ['undo redo | styleselect | bold italic | link | alignleft aligncenter alignright  | code | template | preview'],
        });

        let startpicker= flatpickr(".startDate",{
            enableTime: false,
            dateFormat: "Y-m-d",
            minDate: new Date(),
            onClose: function(selectedDates, dateStr, instance) {
                endpicker.set('minDate', dateStr);
            },
        });

        let endpicker = flatpickr(".endDate",{
            enableTime: false,
            dateFormat: "Y-m-d",
            onClose: function(selectedDates, dateStr, instance) {
                startpicker.set('maxDate', dateStr);
            },
        });

        $("#category").on("change",function (e){
            e.preventDefault();
            $("#product").find(".drop").remove();
            axiosWithLoader.post( "{{ admin_url('api/productsByCategory') }}", $.param({'categoryId': $(this).val() })
            ).then(function (response) {
                console.log(response);
                let res = response.data;
                if(res.status===true){
                    $.each(res.data, function(index, val) {
                        let zHtml ='<option class="drop" data-sku="'+ val.sku +'" value="'+ val.post_id +'" >'+ val.title+'</option>';
                        $("#product").append(zHtml);
                    });
                }
            })
        });

        $("#product").on('change',function (e){
            e.preventDefault();
            let sku = $(this).find(':selected').attr('sku');
            $("#sku").val(sku);
        })

        $('.themeForm').parsley({
            errorClass: 'is-invalid',
            successClass: 'is-valid',
            errorsWrapper: '<ul class="parsley-errors-list list-unstyled"></ul>',
            errorTemplate: '<li class="parsley-error text-danger font-size-10"></li>'
        });

    </script>
@endsection