@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="min-h-full flex items-center justify-center py-12 px-1 sm:px-6 lg:px-8">
    @livewire('reset-password', ['token' => $token])
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
