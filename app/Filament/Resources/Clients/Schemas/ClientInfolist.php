<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClientInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('address'),
                TextEntry::make('postcode'),
                TextEntry::make('city'),
                TextEntry::make('country'),
                TextEntry::make('website')
                    ->label('Website URL')
                    ->url(fn (string $state): ?string => $state),  // Pass a closure to return the URL (the field value itself)
                TextEntry::make('email')
                    ->label('Email Address')
                    ->url(fn (string $state): ?string => $state ? "mailto:{$state}" : null),  // Optional: Make email clickable as mailto link
                RepeatableEntry::make('companies')
                    ->label('Associated Companies')
                    ->schema([
                        TextEntry::make('name'),
                    ])
                    ->columns(1),
            ])
            ->columns(2);
    }
}