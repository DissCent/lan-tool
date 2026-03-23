@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white shadow-sm overflow-hidden sm:rounded-lg dark:dark:bg-gray-800/50 dark:outline-white/10 dark:outline-1 dark:-outline-offset-1">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
            {{ __('forgot-password.success-headline') }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
            <strong>{{ __('forgot-password.success-few-minutes-1') }}</strong> {{ __('forgot-password.success-few-minutes-2') }}
            <br/>
            {{ __('forgot-password.success-link') }}
            <br/>
            {{ __('forgot-password.success-spam') }}
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
