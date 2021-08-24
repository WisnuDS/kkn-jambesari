@extends('admin.layout.table')

@section('title', 'RT/RW')
@section('button-add','Add RT/RW')
@section('card-header','List of RT/RW')
@section('create-route','/admin/association/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Nomor Jabatan</th>
            <th>Alamat</th>
            <th>action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Nomor Jabatan</th>
            <th>Alamat</th>
            <th>action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-association.js"></script>
@stop
