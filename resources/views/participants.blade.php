@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
@livewire('participations-table')
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
