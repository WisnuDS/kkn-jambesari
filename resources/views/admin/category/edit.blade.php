@extends('admin.layout.form')

@section('title', 'Edit Category')
@section('card-title', 'Edit Category')

@section('form')
    <form id="contactForm" action="{{route('category.update', $category->id)}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <input class="form-control" id="category" type="text" placeholder="Category"
                   data-sb-validations="required" name="title" value="{{$category->title}}"/>
            <div class="invalid-feedback" data-sb-feedback="category:required">Category is required.</div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <a href="/admin/category" class="btn btn-danger btn-sm" id="submitButton" type="submit">Cancel</a>
            <button class="btn btn-primary btn-sm" id="submitButton" type="submit">Save</button>
        </div>
    </form>
@stop
