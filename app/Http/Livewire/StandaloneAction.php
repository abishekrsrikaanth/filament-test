<?php

namespace App\Http\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class StandaloneAction extends Component implements HasActions, HasForms
{
    use InteractsWithForms, InteractsWithActions;

    public function render()
    {
        return view('livewire.standalone-action');
    }

    public function addToCartAction(): Action
    {
        return Action::make('addToCart')
            ->form(function ($arguments) {
                if (blank($arguments['productId'])) {
                    dd($arguments);
                }

                return [
                    Grid::make()->schema([
                        Select::make('published_status')
                            ->options([
                                'draft' => 'Draft',
                                'reviewing' => 'Reviewing',
                                'published' => 'Published',
                            ]),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'reviewing' => 'Reviewing',
                                'published' => 'Published',
                            ])->live(),
                    ])
                ];
            })->action(function ($arguments) {
                if (blank($arguments['productId'])) {
                    dd($arguments);
                }
            });
    }
}
