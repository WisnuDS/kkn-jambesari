@extends('admin.layout.form')

@section('title', 'Add RT/RW')
@section('card-title', 'Add RT/RW')

@section('form')
    <form id="contactForm" action="{{route('association.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" id="nama" name="name" type="text" placeholder="Nama" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="rt" value="RT" type="radio" name="position" data-sb-validations="required" />
                <label class="form-check-label" for="rt">RT</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="rw" value="RW" type="radio" name="position" data-sb-validations="required" />
                <label class="form-check-label" for="rw">RW</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="position:required">One option is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomerRtRw">Nomer RT/RW</label>
            <input class="form-control" id="nomerRtRw" name="association_number" type="text" placeholder="Nomer RT/RW" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nomerRtRw:required">Nomer RT/RW is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">Alamat</label>
            <input class="form-control" id="alamat" type="text" name="address" placeholder="Alamat" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
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
        <div class="d-grid">
            <a href="/admin/association" class="btn btn-danger btn-sm" id="submitButton" type="submit">Cancel</a>
            <button class="btn btn-primary btn-sm disabled" id="submitButton" type="submit">Save</button>
        </div>
    </form>
@stop
