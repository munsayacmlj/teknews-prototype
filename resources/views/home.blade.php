@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-10">
            <div class="home-banner pt-4">
                <h1><span>Teknews</span></h1>
                <h3>A Social Media Platform :)</h3>
                <p>Currently in Development but you can use its functionality, of course!</p>
                @guest
                <div class="pt-4 mb-3">
                    <a href="#" class="btn btn-secondary btn-lg">Log In</a>
                    <span class="mx-2 home-banner__divider">or</span>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Sign Up</a>
                </div>
                @endguest
                <hr class="my-3">
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@include('partials.modal')
@endsection
