@extends('admin.layout.table')

@section('title', 'Document')
@section('button-add','Create new Document')
@section('card-header','List of Document')
@section('create-route','/admin/document/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Surat</th>
            <th>Created At</th>
            <th>Last Update</th>
            <th>action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Surat</th>
            <th>Created At</th>
            <th>Last Update</th>
            <th>action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-document.js"></script>
@stop
