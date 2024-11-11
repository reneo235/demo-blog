<?php

namespace App\Http\Controllers;

use App\MoonShine\Pages\ProfilePage;

class ProfileController extends Controller
{
    public function __invoke(ProfilePage $page): ProfilePage
    {
        return $page->loaded();
    }
}
