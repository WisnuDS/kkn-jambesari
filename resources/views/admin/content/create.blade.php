@extends('admin.layout.form')

@section('title', 'Add New Content')
@section('card-title', 'Add New Content')

@section('form')
    <form action="/admin/content/upload" class="dropzone mb-2" id="my-dropzone">
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

    <form id="contactForm" action="{{route('content.store')}}" method="post">
        @csrf
        <input type="hidden" name="category_id" value="{{$id}}">
        <input type="hidden" name="cover" id="cover">
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" id="title" type="text" name="title" placeholder="Title" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="title:required">Title is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="bodyContent">Body Content</label>
            <textarea name="body" id="editor"></textarea>
            <div class="invalid-feedback" data-sb-feedback="bodyContent:required">Body Content is required.</div>
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
            <a href="/admin/content/{{$id}}" class="btn btn-danger btn-sm" id="submitButton" type="submit">Cancel</a>
            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Submit</button>
        </div>
    </form>


@stop

@push('scripts')
    <script src="/admin/assets/js/dist/dropzone.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );

        Dropzone.options.myDropzone = {
            // Note: using "function()" here to bind `this` to
            // the Dropzone instance.
            init: function() {
                this.on("success", (file, response) => {
                    $('#cover').val(response)
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
