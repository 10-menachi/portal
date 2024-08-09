@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product Categories List</h4>
                <div>
                    <div class="d-flex">
                        <div class="me-2">
                            <a href="{{ admin_url('excel/download') }}"
                                class="btn btn-primary waves-effect waves-light submitBtn"> Download Format</a>
                            <button data-bs-toggle="modal" data-bs-target=".bs-upload-excel" type="button"
                                class="btn btn-primary waves-effect waves-light submitBtn"> Upload Excel</button>
                            <a href="{{ admin_url('categories/create') }}"
                                class="btn btn-primary waves-effect waves-light submitBtn"> New Category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <table id="dataTable" class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr No.</th>
                                    <th class="align-middle">Product Category Name</th>
                                    <th class="align-middle">Slug</th>
                                    <th class="align-middle">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="text-capitalize">{{ $item['name'] }} </td>
                                        <td>{{ $item['slug'] }}</td>
                                        <td style="width: 150px">
                                            <a href="{{ admin_url('categories/edit/' . $item['term_id']) }}"
                                                class="btn btn-sm btn-primary"> Edit </a>
                                            <a href="{{ admin_url('categories/detail/' . $item['term_id']) }}"
                                                class="btn btn-sm btn-success"> Detail </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-upload-excel" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title">Choose Excel </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="min-height: 200px">
                    <?= form_open_multipart(admin_url('excel/upload'), []) ?>
                    <input required="required" type="file" name="file" class="form-control mb-3">
                    <button class="btn btn-primary w-100" type="submit"> Upload File</button>
                    <?= form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    <script>
        let dataTable = $("#dataTable");
        $(dataTable).dataTable();
    </script>
@endsection
