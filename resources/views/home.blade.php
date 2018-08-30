@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-10">
            <div class="home-banner pt-4">
                <h1><span>Teknews</span></h1>
                <h3>A Social Media Platform :)</h3>
                <p style="font-size: 18px;">Currently in Development but you can use its functionality of course!</p>
                <p>Sign up below</p>
                @guest
                <div class="mt-5">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-rounded btn-lg mb-3">Sign Up with Email</a>
                </div>
                @endguest
                <hr class="my-3">
            </div>
        </div>
    </div>
</div> <!-- /.container -->
@include('partials.modal')
@endsection
