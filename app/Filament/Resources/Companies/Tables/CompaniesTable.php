<?php

namespace App\Filament\Resources\Companies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompaniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Company Name')
                    ->sortable()
                    ->searchable(),

                // TextColumn::make('address')
                //     ->label('Address')
                //     ->sortable(),

                // TextColumn::make('postal_code')
                //     ->label('Postal Code')
                //     ->sortable(),

                TextColumn::make('city')
                    ->label('City')
                    ->sortable()
                    ->searchable(),

                // TextColumn::make('country')
                //     ->label('Country')
                //     ->sortable(),

                // TextColumn::make('vat_number')
                //     ->label('VAT Number'),

                // TextColumn::make('chamber_of_commerce_number')
                //     ->label('Chamber of Commerce Number'),

                TextColumn::make('vat_rate_low')
                    ->label('Low VAT Rate (%)')
                    ->sortable(),

                TextColumn::make('vat_rate_high')
                    ->label('High VAT Rate (%)')
                    ->sortable(),
            ])
            ->filters([
                // geen filters nodig
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
