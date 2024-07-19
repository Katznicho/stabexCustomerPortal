<?php

namespace App\Livewire;

use App\Models\Station;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class ListStation extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Station::query())
            ->columns([
                Tables\Columns\TextColumn::make('Name')
                ->sortable()
                ->searchable()
                ->label("Name")
                ->copyable()
                ,
                Tables\Columns\TextColumn::make('email')
                ->searchable()
                ->sortable()
                ->label("Email")
                ->copyable()
                ,
                Tables\Columns\TextColumn::make('phoneNumber')
                ->searchable()
                ->sortable()
                ->label("Phone Number")
                ->copyable(),

                Tables\Columns\TextColumn::make('latitude')
                ->searchable()
                ->sortable()
                ->label("Latitude")
                ,
                Tables\Columns\TextColumn::make('longitude')
                ->searchable()
                ->sortable()
                ->copyable()
                ->label("Longitude")

            ])
            ->filters([
                //
            ])
            ->actions([
                //
                Action::make('open')
                    ->label('open maps')
                    ->icon('heroicon-o-pencil')
                    ->action('edit')    
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-station');
    }
}
