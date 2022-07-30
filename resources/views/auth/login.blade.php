<?php
use Illuminate\Support\Facades\DB;

// print_r($config);
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="fDEohWd4NRhfECgNH07Z1dGkafMH5tz33ri0A174">
        <link rel="icon" href=" " type="image/gif" sizes="16x16">
        <title> Crew Management </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Scripts -->
        <script src="{{asset('js/app.js')}}" defer></script>

        <style type="text/css">
            img {
                height: 100px !important;
            }
            .website-logo {
            text-align: center !important;
            }
            .website-logo img {
            margin: 0 auto;
            margin-bottom: 11px;
            border-radius: ;
            margin-top: 20px;
            }
            .website-logo h4 {
            color: #000;
            font-weight: 700;
            }
        </style>
    </head>
    <body>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
            <div class="website-logo">
                <img  src="{{ asset('backend/assets/img/logo.jpeg') }}" alt="">
                <h4 class="text-center" style="">AYAR SHIPPING SERVICES</h4>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a> -->
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    </body>
</html>



