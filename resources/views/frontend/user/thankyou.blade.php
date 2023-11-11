@extends('frontend.layouts.base')
@section('main-container')

<div class="container-fluid m-3" style="min-height: 500px;">
    <div class="container p-3 bg-warning-subtle" style="min-width: 500px; margin:auto;">
        <h1 class="fw-lighter fst-italic text-success p-3 m-3">Thank you for the entry! It will be published once approved.</h1>
        <a class="btn btn-primary p-3 form-control" href="/suggestrecipe">Make new entry</a>
    </div>
</div>

@endsection
