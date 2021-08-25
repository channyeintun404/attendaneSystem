@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css')}}">
<link href="{{ asset('css/style_login.css') }}" rel="stylesheet">
<style></style>

<div class="container">
        <div class="row px-3">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left d-none d-md-flex"></div>

                <div class="card-body">
                    <h4 class="title text-center mb-4">
                        Employee Attendence Login
                    </h4>
                    

                    <form class="form-box px-3" method="post" action="{{route('auth.check') }}">
                        @csrf
                        <div class="form-input">
                            <input type="id" name="id" value="{{ old('id')}}" placeholder="Enter ID" tabindex="10" required>
                           <span class="text-danger">@error('id') {{ $message }} @enderror</span>
                        </div>

                        <div class="form-input">
                            <input type="password" name="password" placeholder="Password" tabindex="10" required>
                            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-block text-uppercase">
                               Login
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-right">
                                    <a class="forget-link" href="{{ route('password.request') }}">
                                        {{ __('Lost Your Password?') }}
                                    </a>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script></script>