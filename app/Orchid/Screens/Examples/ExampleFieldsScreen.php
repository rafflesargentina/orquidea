<?php

namespace App\Orchid\Screens\Examples;

use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Fields\Radio;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ExampleFieldsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Basic Form Controls';

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
            'name' => __('Hello! We collected all the fields in one place'),
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::columns(
                [
                Layout::rows(
                    [

                    Input::make('name')
                        ->title(__('Full Name: '))
                        ->placeholder(__('Enter full name'))
                        ->required()
                        ->help(__('Please enter your full name')),

                    Input::make('email')
                        ->title(__('Email address'))
                        ->placeholder(__('Email address'))
                        ->help(__("We'll never share your email with anyone else."))
                        ->popover(__('Tooltip - hint that user opens himself.')),

                    Password::make('password')
                        ->title(__('Password'))
                        ->placeholder(__('Password')),

                    Label::make('static')
                        ->title(__('Static: '))
                        ->value('email@example.com'),

                    Select::make('select')
                        ->title(__('Select'))
                        ->options([1, 2]),

                    CheckBox::make('checkbox')
                        ->title(__('Checkbox'))
                        ->placeholder(__('Remember me')),

                    Radio::make('radio')
                        ->placeholder(__('Yes'))
                        ->value(1)
                        ->title(__('Radio')),

                    Radio::make('radio')
                        ->placeholder(__('No'))
                        ->value(0),

                    TextArea::make('textarea')
                        ->title(__('Example textarea'))
                        ->rows(6),

                    ]
                )->title(__('Base Controls')),
                Layout::rows(
                    [
                    Input::make('disabled_input')
                        ->title(__('Disabled Input'))
                        ->placeholder(__('Disabled Input'))
                        ->help(__('A disabled input element is unusable and un-clickable.'))
                        ->disabled(),

                    Select::make('disabled_select')
                        ->title(__('Disabled Select'))
                        ->options([1, 2])
                        ->value(0)
                        ->disabled(),

                    TextArea::make('disabled_textarea')
                        ->title(__('Disabled textarea'))
                        ->placeholder(__('Disabled textarea'))
                        ->rows(6)
                        ->disabled(),

                    Input::make('readonly_input')
                        ->title(__('Readonly Input'))
                        ->placeholder(__('Readonly Input'))
                        ->readonly(),

                    CheckBox::make('readonly_checkbox')
                        ->title(__('Readonly checkbox'))
                        ->placeholder(__('Remember me'))
                        ->disabled(),

                    Radio::make('radio')
                        ->placeholder(__('Yes'))
                        ->value(1)
                        ->title(__('Radio'))
                        ->disabled(),

                    Radio::make('radio')
                        ->placeholder(__('No'))
                        ->value(0)
                        ->disabled(),

                    TextArea::make('readonly_textarea')
                        ->title(__('Readonly textarea'))
                        ->placeholder(__('Readonly textarea'))
                        ->rows(6)
                        ->disabled(),

                    ]
                )->title(__('Input States')),
                ]
            ),

            Layout::rows(
                [
                Group::make(
                    [
                    Button::make(__('Primary'))->method('buttonClickProcessing')->type(Color::PRIMARY()),
                    Button::make(__('Secondary'))->method('buttonClickProcessing')->type(Color::SECONDARY()),
                    Button::make(__('Success'))->method('buttonClickProcessing')->type(Color::SUCCESS()),
                    Button::make(__('Danger'))->method('buttonClickProcessing')->type(Color::DANGER()),
                    Button::make(__('Warning'))->method('buttonClickProcessing')->type(Color::WARNING()),
                    Button::make(__('Info'))->method('buttonClickProcessing')->type(Color::INFO()),
                    Button::make(__('Light'))->method('buttonClickProcessing')->type(Color::LIGHT()),
                    Button::make(__('Dark'))->method('buttonClickProcessing')->type(Color::DARK()),
                    Button::make(__('Default'))->method('buttonClickProcessing')->type(Color::DEFAULT()),
                    Button::make(__('Link'))->method('buttonClickProcessing')->type(Color::LINK()),
                    ]
                )->autoWidth(),

                Button::make(__('Block level button'))
                    ->method('buttonClickProcessing')
                    ->type(Color::DEFAULT())
                    ->block(),

                Button::make(__('Right button'))
                    ->method('buttonClickProcessing')
                    ->type(Color::DEFAULT())
                    ->right(),

                ]
            )->title(__('Buttons')),

            Layout::rows(
                [
                Input::make('test')
                    ->title(__('Text'))
                    ->value(__('Artisanal kale'))
                    ->help(__('Elements of type text create basic single-line text fields.'))
                    ->horizontal(),

                Input::make('search')
                    ->type('search')
                    ->title(__('Buscar'))
                    ->value(__('How do I shoot web?'))
                    ->help(__('Elements of type search are text fields designed for the user to enter search queries into.'))
                    ->horizontal(),

                Input::make('email')
                    ->type('email')
                    ->title('Email')
                    ->value('bootstrap@example.com')
                    ->help(__('Elements of type email are used to let the user enter and edit an e-mail address.'))
                    ->horizontal(),

                Input::make('url')
                    ->type('url')
                    ->title('Url')
                    ->value('https://getbootstrap.com')
                    ->horizontal(),

                Input::make('tel')
                    ->type('tel')
                    ->title(__('Telephone'))
                    ->value('1-(555)-555-5555')
                    ->horizontal(),

                Input::make('password')
                    ->type('password')
                    ->title(__('Password'))
                    ->value(__('Password'))
                    ->horizontal(),

                Input::make('number')
                    ->type('number')
                    ->title(__('Number'))
                    ->value(42)
                    ->horizontal(),

                Input::make('date_and_time')
                    ->type('datetime-local')
                    ->title(__('Date and time'))
                    ->value('2011-08-19T13:45:00')
                    ->horizontal(),

                Input::make('date')
                    ->type('date')
                    ->title(__('Date'))
                    ->value('2011-08-19')
                    ->horizontal(),

                Input::make('month')
                    ->type('month')
                    ->title(__('Month'))
                    ->value('2011-08')
                    ->horizontal(),

                Input::make('week')
                    ->type('week')
                    ->title(__('Week'))
                    ->value('2011-W33')
                    ->horizontal(),

                Input::make('Time')
                    ->type('time')
                    ->title(__('Time'))
                    ->value('13:45:00')
                    ->horizontal(),

                Input::make('color')
                    ->type('color')
                    ->title(__('Color'))
                    ->value('#563d7c')
                    ->horizontal(),

                Button::make(__('Submit'))
                    ->method('buttonClickProcessing')
                    ->type(Color::DEFAULT()),

                ]
            )->title(__('Textual HTML5 Inputs')),
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function buttonClickProcessing()
    {
        Alert::warning(__('Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.'));
    }
}
