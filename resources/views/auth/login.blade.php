@extends('layouts.login')

@section('content')
    {{ $form->render() }}

    <div class="text-center mt-4">
        <x-moonshine::link-native
            :href="route('register')"
        >
            Регистрация
        </x-moonshine::link-native>
    </div>
@endsection
