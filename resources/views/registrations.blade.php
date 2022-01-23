@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
<x-registrations-table />
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
