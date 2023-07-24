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

class CreateOptionModalIssue extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.create-option-modal-issue');
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
                            TextInput::make('name'),
                            TextInput::make('email'),
                            Select::make('company_location_id')
                                ->relationship('location', 'id')
                                ->label('Location')->required()
                                ->createOptionForm([
                                    Select::make('country_id')
                                        ->label('Country')
                                        ->required(),

                                    Select::make('state_id')
                                        ->label('State')
                                        ->required(),
                                ])
                                ->columnSpan(2)
                                ->helperText('Select the location where the job is based')
                        ])
                ])
        ]);
    }

}
