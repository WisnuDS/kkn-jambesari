@extends('admin.layout.form')

@section('title', 'Add Jabatan')
@section('card-title', 'Add Jabatan')

@section('form')
    <form id="contactForm" action="{{route('document.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="level">Nama Surat</label>
            <input class="form-control" id="level" type="text" name="document_name" placeholder="Masukan Nama Surat"
                   data-sb-validations="required" required/>
            <div class="invalid-feedback" data-sb-feedback="level:required">Level is required.</div>
        </div>
        <div id="requirements">

        </div>
        <button class="btn btn-sm btn-success mb-3" onclick="addForm()" type="button">Tambah Persyaratan</button>
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
            <a href="/admin/document" class="btn btn-danger btn-sm" id="submitButton">Cancel</a>
            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
@stop

@push('scripts')
    <script>
        let COUNTER = 0

        function getForm(index) {
            return '<div class="mb-3">' +
                '<label class="form-label" for="jabatan">Syarat ' + index + '</label>' +
                '<div class="row">' +
                '    <div class="col-11">' +
                '        <input class="form-control" id="jabatan" type="text" name="requirement[]" placeholder="Masukan Nama Syarat" data-sb-validations="required" />' +
                '    </div>' +
                '    <div class="col-1">' +
                '        <button class="btn btn-sm btn-danger" onclick="deleteForm()" type="button">Hapus</button>' +
                '    </div>' +
                '</div>' +
                '</div>'
        }

        function addForm() {
            COUNTER++
            $('#requirements').append(getForm(COUNTER))
        }

        function deleteForm() {
            COUNTER--
            $('#requirements').empty()
            renderForm()
        }

        function renderForm() {
            for (let i = 1; i < COUNTER + 1; i++) {
                $('#requirements').append(getForm(i))
            }
        }
    </script>
@endpush
