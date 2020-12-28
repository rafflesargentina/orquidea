<?php

namespace App\Orchid\Screens\Examples;

use Orchid\Screen\Action;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;

class ExampleLayoutsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Overviews layouts';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Components for laying out your project';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @throws \Throwable
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::tabs(
                [
                __('Example Tab ').'1' => Layout::view('platform::dummy.block'),
                __('Example Tab ').'2' => Layout::view('platform::dummy.block'),
                __('Example Tab ').'3' => Layout::view('platform::dummy.block'),
                ]
            ),

            Layout::collapse(
                [
                Input::make('collapse-1')->title(_('First name')),
                Input::make('collapse-2')->title(__('Last name')),
                Input::make('collapse-3')->title(__('Username')),
                ]
            )->label(__('Click for me!')),

            Layout::view('platform::dummy.block'),

            Layout::columns(
                [
                Layout::view('platform::dummy.block'),
                Layout::view('platform::dummy.block'),
                Layout::view('platform::dummy.block'),
                ]
            ),

            Layout::accordion(
                [
                __('Collapsible Group Item').' #1' => Layout::view('platform::dummy.block'),
                __('Collapsible Group Item').' #2' => Layout::view('platform::dummy.block'),
                __('Collapsible Group Item').' #3' => Layout::view('platform::dummy.block'),
                ]
            ),

        ];
    }
}
