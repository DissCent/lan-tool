@extends('layouts.app')

@section('header')
@include('layouts/header')
@endsection

@section('content')
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Anfrage erfolgreich!
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
			<strong>In 1-2 Minuten</strong> erhältst du von uns eine E-Mail, sofern wir die eingegebene Adresse in unserem System finden konnten.
            <br/>
            In dieser E-Mail findest du einen Link zum Zurücksetzen deines Passworts.
        </p>
    </div>
</div>
@endsection

@section('footer')
@include('layouts/footer')
@endsection
