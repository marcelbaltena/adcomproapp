<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Company Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('address')
                            ->label('Address')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('postal_code')
                            ->label('Postal Code')
                            ->required()
                            ->maxLength(20),

                        TextInput::make('city')
                            ->label('City')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('country')
                            ->label('Country')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('vat_number')
                            ->label('VAT Number')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('chamber_of_commerce_number')
                            ->label('Chamber of Commerce Number')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('vat_rate_low')
                            ->label('Low VAT Rate (%)')
                            ->numeric()
                            ->required(),

                        TextInput::make('vat_rate_high')
                            ->label('High VAT Rate (%)')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}
