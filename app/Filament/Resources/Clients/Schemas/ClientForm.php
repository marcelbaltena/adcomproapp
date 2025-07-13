<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                TextInput::make('postcode')
                    ->required()
                    ->maxLength(10),
                TextInput::make('city')
                    ->required()
                    ->maxLength(100),
                TextInput::make('country')
                    ->required()
                    ->maxLength(100),
                TextInput::make('website')
                    ->label('Website URL')
                    ->url()
                    ->prefix('https://')
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Select::make('company_ids')
                    ->label('Companies')
                    ->multiple()
                    ->relationship('companies', 'name')
                    ->preload()
                    ->visible(fn () => auth()->user()->hasRole('super_admin')),
            ])
            ->columns(2);
    }
}