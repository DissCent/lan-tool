@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Daten gespeichert!
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Vielen Dank, deine Daten wurden gespeichert.
            <br/>
            Bitte beachte, dass deine Anmeldung ggf. erst dann öffentlich sichtbar ist, wenn ein Administrator dein Benutzerkonto verifiziert hat.
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
