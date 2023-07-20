<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class TestStandaloneTable extends Component implements HasTable, HasForms
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.test-standalone-table');
    }

    public function table(Table $table): Table
    {
        return $table->query(function () {
            return User::query();
        })->columns([
            TextColumn::make('name'),
            TextColumn::make('email'),
        ])->actions([
            EditAction::make('edit')
        ]);
    }
}
