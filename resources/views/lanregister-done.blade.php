@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ __('lan-forms.registered-headline') }}
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
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
