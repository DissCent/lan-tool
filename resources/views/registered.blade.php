@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Vielen Dank für deine Registrierung!
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Zur Bestätigung deiner E-Mail-Adresse haben wir dir eine E-Mail mit einem Bestätigungslink gesendet.
            <br/>
            Nach erfolgter Bestätigung kannst du dich anmelden und anschließend auch für die LAN registrieren.
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection