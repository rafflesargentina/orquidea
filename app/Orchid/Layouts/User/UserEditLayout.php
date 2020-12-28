<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('user.first_name')
                ->type('text')
                ->max(191)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('user.last_name')
                ->type('text')
                ->max(191)
                ->required()
                ->title(__('Last name'))
                ->placeholder(__('Last name')),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
        ];
    }
}
