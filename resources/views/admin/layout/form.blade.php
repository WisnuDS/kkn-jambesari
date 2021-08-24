@extends('admin.layout.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield('card-title')</h6>
        </div>
        <div class="card-body">
            <div class="container px-5 my-5">
                @yield('form')
            </div>
        </div>
    </div>
@stop
