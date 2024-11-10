<?php

declare(strict_types=1);

namespace App\Forms;

use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Password;

final class LoginForm
{
    public static function make(): FormBuilder
    {
        return FormBuilder::make(
            route('login'),
        )->fields([
            Email::make('Email')->required(),
            Password::make('Password')->required()
        ])->submit('Войти', ['class' => 'btn btn-primary w-full']);
    }
}
