@extends('admin.layout.table')

@section('title', 'Jabatan')
@section('button-add','Add Jabatan')
@section('card-header','List of Jabatan')
@section('create-route','/admin/level/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Level</th>
            <th>Jabatan</th>
            <th>Created By</th>
            <th>action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Level</th>
            <th>Jabatan</th>
            <th>Created By</th>
            <th>action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-level.js"></script>
@stop
