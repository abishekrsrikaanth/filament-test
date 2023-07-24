<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Filament\Forms\Components\Wizard;

class LiveComponentsDontWorkOnWizard extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.live-components-dont-work-on-wizard');
    }

    public function table(Table $table): Table
    {
        return $table->query(function () {
            return User::query();
        })->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ])->headerActions([
            Action::make('create')
                ->label('New Job Listing')
                ->extraAttributes([
                    'class' => 'bg-gradient-purple-left'
                ])
                ->steps([
                    Wizard\Step::make('Location')
                        ->schema([
                            Select::make('dummy')
                                ->options([
                                    'a' => 'Foo',
                                    'b' => 'Bar'
                                ])->live(),

                            TextInput::make('name')
                                ->visible(fn($get) => $get('dummy') === 'a')
                                ->required(),
                        ])
                ])
        ]);
    }
}
