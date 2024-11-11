<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\User;
use App\MoonShine\Layouts\ProfileLayout;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Laravel\TypeCasts\ModelCaster;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flash;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\Hidden;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\PasswordRepeat;
use MoonShine\UI\Fields\Text;

class ProfilePage extends Page
{
    protected ?string $layout = ProfileLayout::class;

    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Profile';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            Box::make([
                Flash::make('status'),

                Tabs::make([
                    Tab::make('Information', [
                        FormBuilder::make(route('user-profile-information.update'))
                            ->name('updateProfileInformation')
                            ->async()
                            ->fields([
                                Hidden::make('_method')->setValue('PUT'),

                                Text::make('Name')->required(),
                                Email::make('Email')->required()
                            ])
                            ->fillCast(auth()->user(), new ModelCaster(User::class))
                            ->submit('Update', ['class' => 'btn btn-primary'])
                    ])->active(
                        session('errors')
                            ?->getBag('updateProfileInformation')
                            ?->isNotEmpty()
                    ),

                    Tab::make('Change password', [
                        FormBuilder::make(route('user-password.update'))
                            ->name('updatePassword')
                            ->fields([
                                Hidden::make('_method')->setValue('PUT'),

                                Password::make('Current password')
                                    ->customAttributes([
                                        'autocomplete' => 'off'
                                    ])
                                    ->required(),

                                Password::make('Password')->required(),
                                PasswordRepeat::make('Password confirmation')->required(),
                            ])
                            ->submit('Update password', ['class' => 'btn btn-primary'])
                    ])->active(
                        session('errors')
                            ?->getBag('updatePassword')
                            ?->isNotEmpty()
                    )
                ])
            ])
        ];
	}
}
