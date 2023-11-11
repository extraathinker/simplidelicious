@extends('frontend.layouts.base')
@section('main-container')

<div class="container-fluid m-3" style="min-height: 500px;">
    <div class="container p-3 bg-warning-subtle" style="min-width: 500px; margin:auto;">
        <h1 class="fw-lighter text-center text-danger p-3 m-3">{{$error}}</h1>
    </div>
</div>

@endsection
