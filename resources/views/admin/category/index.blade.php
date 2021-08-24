@extends('admin.layout.table')

@section('title', 'Category')
@section('button-add','Add Category')
@section('card-header','List of Category')
@section('create-route','/admin/category/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Nama Category</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Nama Category</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script src="/admin/assets/js/datatables/datatable-category.js"></script>
@stop
