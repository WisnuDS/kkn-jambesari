@extends('admin.layout.form')

@section('title', 'Add New Category')
@section('card-title', 'Add New Category')

@section('form')
    <form id="contactForm" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <input class="form-control" id="category" type="text" placeholder="Category"
                   data-sb-validations="required" name="title"/>
            <div class="invalid-feedback" data-sb-feedback="category:required">Category is required.</div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <a href="/admin/category" class="btn btn-danger btn-sm" id="submitButton" type="submit">Cancel</a>
            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
@stop
