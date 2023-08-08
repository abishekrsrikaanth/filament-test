<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ActionGroupLabelNotDisplayIssue extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.action-group-label-not-display-issue');
    }

    public function table(Table $table): Table
    {
        return $table->query(function () {
            return User::query();
        })->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ])->actions([

        ])->headerActions([
            ActionGroup::make([
                Action::make('a')->label('Action A'),
                Action::make('b')->label('Action B'),
            ])->label('Header Actions Label')->extraAttributes([
                'class'=>'text-white border-2 border-white'
            ]),

            ActionGroup::make([
                Action::make('a')->label('Action A'),
                Action::make('b')->label('Action B'),
            ])->label('Header Actions Label')->extraAttributes([
                'class'=>'text-white border-2 border-white'
            ])
        ]);
    }
}
