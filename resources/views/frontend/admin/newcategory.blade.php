@extends('frontend.layouts.base')
@section('main-container')

<div class="container-fluid mb-3">
    <div class="container">
        <div class="bg-warning-subtle" style="max-width: 700px; margin:auto;">
            <h1 class=" text-uppercase text-danger p-4 mb-0 mt-3 text-center">Enter Category</h1>
        </div>
        <form class="form-group p-4 bg-warning-subtle" style="max-width:700px; margin:auto;" method="post" action="/storecategory">
            @csrf
            <x-inputform label="Category Name :" name="name" type="text"/>
            <span class="text-danger">
                @error('name')
                    {{$message}}.<br>
                @enderror
            </span>

            <input type="submit" class="form-control my-4 text-uppercase fw-bold">
        </form>
    </div>
</div>

@endsection
