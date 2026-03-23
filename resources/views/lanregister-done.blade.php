@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white dark:dark:bg-gray-800/50 shadow-sm overflow-hidden sm:rounded-lg dark:outline-white/10 dark:outline-1 dark:-outline-offset-1">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
            {{ __('lan-forms.registered-headline') }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
            {{ __('lan-forms.registered-thank-you') }}
            <br/>
            {{ __('lan-forms.registered-hint') }}
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
