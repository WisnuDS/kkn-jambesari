@extends('admin.layout.form')

@section('title', 'Edit Jabatan')
@section('card-title', 'Edit Jabatan')

@section('form')
    <form id="contactForm" action="{{route('level.update', $level->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label" for="level">Level</label>
            <input class="form-control" id="level" type="number" name="level" placeholder="Level" data-sb-validations="required" value="{{$level->level}}" />
            <div class="invalid-feedback" data-sb-feedback="level:required">Level is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jabatan">Jabatan</label>
            <input class="form-control" id="jabatan" type="text" name="title" placeholder="Jabatan" data-sb-validations="required" value="{{$level->title}}"/>
            <div class="invalid-feedback" data-sb-feedback="jabatan:required">Jabatan is required.</div>
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
            <a href="/admin/level" class="btn btn-danger btn-sm" id="submitButton" >Cancel</a>
            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
@stop
