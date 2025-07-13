<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;

class CompanyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Company Information')
                    ->schema([
                        TextEntry::make('name')->label('Company Name'),
                        TextEntry::make('address')->label('Address'),
                        TextEntry::make('postal_code')->label('Postal Code'),
                        TextEntry::make('city')->label('City'),
                        TextEntry::make('country')->label('Country'),
                        TextEntry::make('vat_number')->label('VAT Number'),
                        TextEntry::make('chamber_of_commerce_number')
                            ->label('Chamber of Commerce Number'),
                        TextEntry::make('vat_rate_low')
                            ->label('Low VAT Rate (%)'),
                        TextEntry::make('vat_rate_high')
                            ->label('High VAT Rate (%)'),
                    ])
                    ->columns(2),
            ]);
    }
}
