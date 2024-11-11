@extends('layouts.login')

@section('content')
    {{ $form->render() }}

    <div class="text-center mt-4">
        <x-moonshine::link-native
            :href="route('login')"
        >
            Войти
        </x-moonshine::link-native>
    </div>
@endsection
