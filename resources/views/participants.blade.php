@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
<x-participations-table />
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
