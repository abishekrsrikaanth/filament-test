<?php

namespace App\Http\Livewire;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class GetOptionLabelFromRecordUsingIssue extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function render()
    {
        return view('livewire.get-option-label-from-record-using-issue');
    }

    public function table(Table $table): Table
    {
        return $table->query(User::query())
            ->headerActions([
                Action::make('Add')
                    ->form([
                        Select::make('salary_id')
                            ->relationship('salary', 'name')
                            ->getOptionLabelFromRecordUsing(fn(Model $record) => "USD {$record->name} per year")
                            ->label('Minimum Salary')
                            ->required(),

                        Select::make('salary_id')
                            ->relationship('salary', 'name')
                            ->getOptionLabelFromRecordUsing(fn(Model $record) => "USD {$record->name} per year")
                            ->label('Maximum Salary')
                            ->required(),
                    ])->slideOver()
            ]);
    }
}
