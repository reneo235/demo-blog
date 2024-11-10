<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Article;
use MoonShine\Laravel\Models\MoonshineUserRole;
use MoonShine\Permissions\Models\MoonshineUser;


class ArticlePolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user)
    {
        return true;
    }

    public function view(MoonshineUser $user, Article $item)
    {
        if($user->moonshine_user_role_id === MoonshineUserRole::DEFAULT_ROLE_ID) {
            return true;
        }

        return $user->id === $item->author_id;
    }

    public function create(MoonshineUser $user)
    {
        return true;
    }

    public function update(MoonshineUser $user, Article $item)
    {
        if($user->moonshine_user_role_id === MoonshineUserRole::DEFAULT_ROLE_ID) {
            return true;
        }

        return $user->id === $item->author_id;
    }

    public function delete(MoonshineUser $user, Article $item)
    {
        if($user->moonshine_user_role_id === MoonshineUserRole::DEFAULT_ROLE_ID) {
            return true;
        }

        return $user->id === $item->author_id;
    }

    public function restore(MoonshineUser $user, Article $item)
    {
        return true;
    }

    public function forceDelete(MoonshineUser $user, Article $item)
    {
        return true;
    }

    public function massDelete(MoonshineUser $user)
    {
        return true;
    }
}
