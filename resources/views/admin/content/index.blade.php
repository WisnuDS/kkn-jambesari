@extends('admin.layout.table')

@section('title', 'Content')
@section('button-add','Create Content')
@section('card-header','List of Content '.$category->title)
@section('create-route','/admin/content/'.$category->id.'/create')
@section('table')
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Judul</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Last Update</th>
            <th>action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>id</th>
            <th>No</th>
            <th>Judul</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Last Update</th>
            <th>action</th>
        </tr>
        </tfoot>
        <tbody></tbody>
    </table>
@stop
@section('datatable-script')
    <script>CATEGORY_ID = '{{$category->id}}'</script>
    <script src="/admin/assets/js/datatables/datatable-content.js"></script>
@stop
