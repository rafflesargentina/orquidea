<?php

namespace App\Orchid\Screens\Examples;

use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Map;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\UTM;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class ExampleFieldsAdvancedScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Advanced form controls';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Examples for creating a wide variety of forms.';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'name'  => __('Hello! We collected all the fields in one place'),
            'place' => [
                'lat' => 37.181244855427394,
                'lng' => -3.6021993309259415,
            ],
        ];
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

            Layout::rows(
                [

                Group::make(
                    [
                    Input::make('phone')
                        ->mask('(999) 999-9999')
                        ->title(__('Phone'))
                        ->placeholder(__('Enter phone number'))
                        ->help(__('Phone number')),

                    Input::make('ip_address')
                        ->title(__('IP address:'))
                        ->placeholder(__('Enter address'))
                        ->help(__('Specifies an address in IPv4 format'))
                        ->mask(
                            [
                            'alias' => 'ip',
                            ]
                        ),

                    Input::make('license_plate')
                        ->title(__('License plate:'))
                        ->mask(
                            [
                            'mask' => '[9-]AAA-999',
                            ]
                        ),
                    ]
                ),

                Group::make(
                    [

                    Input::make('credit_card')
                        ->mask('9999-9999-9999-9999')
                        ->title(__('Credit card:'))
                        ->placeholder(__('Credit card number'))
                        ->help(__('Number is the long set of digits displayed across the front your plastic card')),

                    Input::make('currency')
                        ->title(__('Currency dollar:'))
                        ->mask(
                            [
                            'alias' => 'currency',
                            ]
                        )->help(__('Some aliases found in the extensions are: email, currency, decimal, integer, date, datetime, dd/mm/yyyy, etc.')),

                    Input::make('currency')
                        ->title(__('Currency euro:'))
                        ->mask(
                            [
                            'mask'         => '€ 999.999.999,99',
                            'numericInput' => true,
                            ]
                        ),
                    ]
                ),

                ]
            )->title(__('Input mask')),

            Layout::rows(
                [

                Group::make(
                    [
                    DateTimer::make('open')
                        ->title(__('Opening date'))
                        ->help(__('The opening event will take place')),

                    DateTimer::make('allowInput')
                        ->title(__('Allow input'))
                        ->required()
                        ->allowInput(),

                    DateTimer::make('enabledTime')
                        ->title(__('Enabled time'))
                        ->enableTime(),
                    ]
                ),

                Group::make(
                    [
                    DateTimer::make('format24hr')
                        ->title(__('Format 24hr'))
                        ->enableTime()
                        ->format24hr(),

                    DateTimer::make('custom')
                        ->title(__('Custom format'))
                        ->noCalendar()
                        ->format('h:i K'),

                    DateRange::make('rangeDate')
                        ->title(__('Range date')),
                    ]
                ),

                ]
            )->title(__('DateTime')),

            Layout::columns(
                [
                Layout::rows(
                    [
                    Select::make('robot.')
                        ->options(
                            [
                            'index'   => 'Index',
                            'noindex' => 'No index',
                            ]
                        )
                        ->multiple()
                        ->title(__('Multiple select'))
                        ->help(__('Allow search bots to index')),

                    Relation::make('user')
                        ->fromModel(User::class, 'name')
                        ->title(__('Select for Eloquent model')),
                    ]
                )->title(__('Select')),
                Layout::rows(
                    [

                    Group::make(
                        [
                        CheckBox::make('free-checkbox')
                            ->sendTrueOrFalse()
                            ->title(__('Free checkbox'))
                            ->placeholder(__('Event for free'))
                            ->help(__('Event for free')),

                        Switcher::make('free-switch')
                            ->sendTrueOrFalse()
                            ->title(__('Free switch'))
                            ->placeholder(__('Event for free'))
                            ->help(__('Event for free')),
                        ]
                    ),

                    RadioButtons::make('radioButtons')
                        ->options(
                            [
                            1 => __('Enabled'),
                            0 => __('Disabled'),
                            3 => __('Pause'),
                            4 => __('Work'),
                            ]
                        )
                        ->help(__('Radio buttons are normally presented in radio groups')),

                    ]
                )->title(__('Status')),
                ]
            ),

            Layout::rows(
                [

                Picture::make('picture')
                    ->title(__('Picture'))
                    ->horizontal(),

                Cropper::make('cropper')
                    ->title(__('Cropper'))
                    ->width(500)
                    ->height(300)
                    ->horizontal(),

                Upload::make('files')
                    ->title(__('Upload files'))
                    ->horizontal(),

                ]
            )->title('File upload'),

            Layout::rows(
                [

                UTM::make('link')
                    ->title(__('UTM link'))
                    ->help(__('Generated UTM link')),

                Matrix::make('matrix')
                    ->columns(
                        [
                        __('Attribute'),
                        __('Value'),
                        __('Units'),
                        ]
                    ),

                Map::make('place')
                    ->title(__('Object on the map'))
                    ->help(__('Enter the coordinates, or use the search')),

                ]
            )->title(__('Advanced')),
        ];
    }
}
