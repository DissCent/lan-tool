@extends('layouts.app')

@section('header')
    @include('layouts/header')
@endsection

@section('content')
<div>
    <div class="bg-white shadow overflow-hidden max-w-xs sm:max-w-lg md:max-w-2xl w-screen sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:px-6"">
            <div class="mt-1 text-sm text-gray-500" x-show="open">
                <h1 class="text-center text-3xl font-extrabold text-gray-900 w-auto mb-4">{{ __('imprint.imprint') }}</h1>

                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">{{ __('imprint.details') }}</h2>
                <p>
                    <span class="personal">{{ str_rot13(strrev(base64_decode('em5lcm9MIHBwaWxpaFAK'))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('NDIgLnJ0UyByZXJhbWllVwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('cmFrY2VOIG1hIG5lZ25pbHNzRSAwMzczNwo' . '='))) }}</span>
                    <br />
                    <span class="personal">{{ str_rot13(strrev(base64_decode('eW5hbXJlRyAvIGRuYWxoY3N0dWVE'))) }}</span>
                </p>

                <h2 class="text-2xl font-bold text-gray-900 w-auto my-3">{{ __('imprint.contact') }}</h2>
                <p>
                    <span class="personal">{{ str_rot13(strrev(base64_decode('MjggNTMgMzQgMDUgMTE3ICkwKCA5NCsgOm5vZmVsZVQK'))) }}</span>
                    <br />
                    <span class="personal">{!! str_rot13(strrev(base64_decode('ZW0ub2gtem5lcm9sOzQ2IyZsb290bmFsIDpsaWFNLUUK'))) !!}</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts/footer')
@endsection
