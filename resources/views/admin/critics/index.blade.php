@extends('admin.layout.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kritik dan Saran</h1>
    </div>

    @foreach($critics as $critic)
    <div class="col-xl-12 col-md-12 mb-5">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                            {{$critic->name}} ({{$critic->nik}})
                        </div>
                        <div class="text-lg-start mb-0 font-weight-bold text-gray-800">{{$critic->content}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@stop
