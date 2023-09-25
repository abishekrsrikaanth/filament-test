<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class HintActionMarginIssue extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.hint-action-margin-issue');
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('Name')
                ->hintActions([
                    Action::make('Copy')->icon('heroicon-s-clipboard'),
                    Action::make('View Code')->icon('heroicon-s-code')
                ])
        ]);
    }
}
