@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-10">
            <div class="home-banner pt-4">
                <h1><span>Teknews</span></h1>
                <h3>A Social Media Platform for Technology News</h3>
                <p style="font-size: 18px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
