@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white dark:dark:bg-gray-800/50 shadow-sm overflow-hidden sm:rounded-lg dark:outline-white/10 dark:outline-1 dark:-outline-offset-1">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
            {{ __('reset-password.success-headline') }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
            {{ __('reset-password.success-hint') }}
            <br/>
            <br/>
            <a href="/login" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">
                {{ __('reset-password.success-to-login') }}
            </a>
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
