@extends('admin.layout.form')

@section('title', 'Pengajuan Surat')
@section('card-title', 'Pengajuan Surat')

@section('form')
    <div class="mb-3">
        <label class="form-label" for="nama">Nama</label>
        <input class="form-control" id="nama" type="email" placeholder="Nama" data-sb-validations="required,email" disabled value="{{$data->name}}" />
        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        <div class="invalid-feedback" data-sb-feedback="nama:email">Nama Email is not valid.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nik">NIK</label>
        <input class="form-control" id="nik" type="text" placeholder="NIK" value="{{$data->nik}}" data-sb-validations="required" disabled/>
        <div class="invalid-feedback" data-sb-feedback="nik:required">NIK is required.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" type="text" placeholder="Alamat" data-sb-validations="required" disabled>{{$data->address}}</textarea>
        <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nomorWhatsapp">Nomor Whatsapp</label>
        <input class="form-control" id="nomorWhatsapp" type="text" placeholder="Nomor Whatsapp" data-sb-validations="required" disabled value="{{$data->whatsapp_number}}" />
        <div class="invalid-feedback" data-sb-feedback="nomorWhatsapp:required">Nomor Whatsapp is required.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nomorWhatsapp">Surat Yang diurus</label>
        <input class="form-control" id="nomorWhatsapp" type="text" placeholder="Nomor Whatsapp" data-sb-validations="required" disabled value="{{$data->document->name}}" />
        <div class="invalid-feedback" data-sb-feedback="nomorWhatsapp:required">Nomor Whatsapp is required.</div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nomorWhatsapp">Status</label>
        @if($data->status == \App\Models\Citizen::$PENDING)
            <input class="form-control" id="nomorWhatsapp" type="text" placeholder="Nomor Whatsapp" data-sb-validations="required" disabled value="Menunggu di proses" />
        @elseif($data->status == \App\Models\Citizen::$PROGRESS)
            <input class="form-control" id="nomorWhatsapp" type="text" placeholder="Nomor Whatsapp" data-sb-validations="required" disabled value="Sedang di proses" />
        @else
            <input class="form-control" id="nomorWhatsapp" type="text" placeholder="Nomor Whatsapp" data-sb-validations="required" disabled value="Selesai di proses" />
        @endif
        <div class="invalid-feedback" data-sb-feedback="nomorWhatsapp:required">Nomor Whatsapp is required.</div>
    </div>
    <div class="d-none" id="submitSuccessMessage">
        <div class="text-center mb-3">
            <div class="fw-bolder">Form submission successful!</div>
            <p>To activate this form, sign up at</p>
            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
        </div>
    </div>
    <div class="d-none" id="submitErrorMessage">
        <div class="text-center text-danger mb-3">Error sending message!</div>
    </div>
    <div class="d-flex justify-content-start mb-3">
        @foreach($data->files as $file)
            <div class="card border-left-primary shadow h-100 py-2 mr-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Buka File</div>
                            <a href="{{$file->url}}" target="_blank" class="h5 mb-0 font-weight-bold text-gray-800">{{$file->requirement->name}}</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="d-grid">
        <a href="{{route('citizen.index')}}" class="btn btn-danger btn-sm" id="submitButton" type="button">Kembali</a>
        <a href="https://wa.me/{{preg_replace('/^0/', '62', $data->whatsapp_number)}}" target="_blank" class="btn btn-success btn-sm" id="submitButton" type="button">Hubungi Nomor Whatsapp</a>
        <form class="d-inline" action="{{route('citizen.update', $data->id)}}" method="POST">
            @csrf
            @method('put')
            @if($data->status == \App\Models\Citizen::$PENDING || $data->status == \App\Models\Citizen::$PROGRESS)
                <input type="hidden" name="status" value="2"/>
                <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Ubah Status Jadi Selesai</button>
            @else
                <input type="hidden" name="status" value="1"/>
                <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Ubah Status Jadi Diproses</button>
            @endif
        </form>
    </div>
@stop
