<?php

namespace App\Orchid;

use Laravel\Scout\Searchable;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return ItemMenu[]
     */
    public function registerMainMenu(): array
    {
        return [
            ItemMenu::label(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->title(__('Management'))
                ->badge(
                    function () {
                        return null;
                    }
                ),

            ItemMenu::label(__('Example screen'))
                ->icon('monitor')
                ->route('platform.example')
                ->title(__('Navigation'))
                ->badge(
                    function () {
                        return 6;
                    }
                ),

            ItemMenu::label(__('Dropdown menu'))
                ->slug('example-menu')
                ->icon('code')
                ->childs(),

            ItemMenu::label(__('Sub element item').' 1')
                ->place('example-menu')
                ->icon('bag'),

            ItemMenu::label(__('Sub element item').' 2')
                ->place('example-menu')
                ->icon('heart'),

            ItemMenu::label(__('Basic Elements'))
                ->title(__('Form controls'))
                ->icon('note')
                ->route('platform.example.fields'),

            ItemMenu::label(__('Advanced Elements'))
                ->icon('briefcase')
                ->route('platform.example.advanced'),

            ItemMenu::label(__('Text Editors'))
                ->icon('list')
                ->route('platform.example.editors'),

            ItemMenu::label(__('Overviews layouts'))
                ->title(__('Layouts'))
                ->icon('layers')
                ->route('platform.example.layouts'),

            ItemMenu::label(__('Chart tools'))
                ->icon('bar-chart')
                ->route('platform.example.charts'),

            ItemMenu::label(__('Cards'))
                ->icon('grid')
                ->route('platform.example.cards'),

            ItemMenu::label(__('Documentation'))
                ->title(__('Docs'))
                ->icon('docs')
                ->url('https://orchid.software/en/docs'),
        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            ItemMenu::label(__('Profile'))
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerSystemMenu(): array
    {
        return [
            ItemMenu::label(__('Access rights'))
                ->icon('lock')
                ->slug('Auth')
                ->active('platform.systems.*')
                ->permission('platform.systems.index')
                ->sort(1000),

            ItemMenu::label(__('Users'))
                ->place('Auth')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->sort(1000)
                ->title(__('All registered users')),

            ItemMenu::label(__('Roles'))
                ->place('Auth')
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->sort(1000)
                ->title(__('A Role defines a set of tasks a user assigned the role is allowed to perform.'))
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Systems'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }

    /**
     * @return Searchable|string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            // \App\Models\User::class
        ];
    }
}
