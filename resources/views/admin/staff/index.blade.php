@extends('admin.layout.table')

@section('title', 'Perangkat Desa')
@section('button-add','Add Perangkat Desa')
@section('card-header','List of Perangkat Desa')
@section('create-route','/admin/staff/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-staff.js"></script>
@stop
