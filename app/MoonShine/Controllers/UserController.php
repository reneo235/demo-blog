<?php

declare(strict_types=1);

namespace App\MoonShine\Controllers;

use MoonShine\Laravel\Http\Controllers\MoonShineController;
use MoonShine\Laravel\MoonShineRequest;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends MoonshineController
{
    public function __invoke(MoonShineRequest $request): Response
    {
        auth('web')->loginUsingId($request->get('user_id'));

        $request->session()->regenerate();

        return to_route('home');
    }
}
