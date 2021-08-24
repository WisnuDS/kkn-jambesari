@extends('admin.layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a href="@yield('create-route')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> @yield('button-add')</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('card-header')</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @yield('table')
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <!-- Page level plugins -->
    <script src="/admin/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    @yield('datatable-script')
@endpush

@push('styles')
    <!-- Custom styles for this page -->
    <link href="/admin/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
