@extends('admin.layout.form')

@section('title', 'Add RT/RW')
@section('card-title', 'Add RT/RW')

@section('form')
    <form action="/admin/staff/upload" class="dropzone mb-2" id="my-dropzone">
        @csrf
        <div class="dz-message" data-dz-message>
            <div class="icon">
                <i class="flaticon-file"></i>
            </div>
            <h4 class="message">Drag and Drop cover here</h4>
            <div class="note">(Upload foto untuk cover content <strong>Kurang dari 3 MB</strong>)</div>
        </div>
        <div class="fallback">
            <input name="file" type="file"/>
        </div>
    </form>
    <form id="contactForm" action="{{route('staff.store')}}" method="post">
        @csrf
        <input type="hidden" name="image" id="image">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama</label>
            <input class="form-control" id="nama" type="text" name="name" placeholder="Nama"
                   data-sb-validations="required"/>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="jabatan">Jabatan</label>
            <select class="form-select form-control" id="jabatan" aria-label="Jabatan" name="level_id" name="level_id">
                @foreach($levels as $level)
                    <option value="{{$level->id}}">{{$level->title}}</option>
                @endforeach
            </select>
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
            <a href="/admin/staff" class="btn btn-danger btn-sm" id="submitButton">Cancel</a>
            <button class="btn btn-primary btn-sm disabled" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
@stop

@push('scripts')
    <script src="/admin/assets/js/dist/dropzone.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        Dropzone.options.myDropzone = {
            // Note: using "function()" here to bind `this` to
            // the Dropzone instance.
            init: function () {
                this.on("success", (file, response) => {
                    $('#image').val(response)
                });
            }
        };
    </script>
@endpush

@push('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 800px;
        }
    </style>
    <link rel="stylesheet" href="/admin/assets/js/dist/dropzone.css">
@endpush
