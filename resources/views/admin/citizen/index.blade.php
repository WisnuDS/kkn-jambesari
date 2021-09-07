@extends('admin.layout.table')

@section('title', 'Pengajuan Surat')
@section('button-add','Add Surat')
@section('card-header','List of Pengajuan Surat')
@section('create-route','#')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Nomor WA</th>
            <th>Surat</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Nomor WA</th>
            <th>Surat</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-citizen.js"></script>
@stop
