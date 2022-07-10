@extends('layouts.frontend')
@section('title')
Thank You
@endsection
@section('content')

<section class="bg-success mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 py-4">
                <h5><a href="/" class="text-dark">Home</a> › Thank You</h5>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="shadow border py-5">
                <h4> Thank You For Shopping</h4>
                @if(session('status'))

                @endif
            </div>
        </div>
    </div>
</div>

@endsection
