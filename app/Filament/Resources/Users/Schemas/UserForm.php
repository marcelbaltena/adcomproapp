<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Html;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('User Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Select::make('company_id')
                            ->label('Company')
                            ->relationship('company', 'name')
                            ->searchable()
                            ->nullable(),

                        TextInput::make('weekly_hours')
                            ->label('Weekly Hours')
                            ->numeric()
                            ->minValue(0)
                            ->step(0.25)
                            ->required(),

                        // Divider line spanning both columns
                        Html::make('divider')
                            ->columnSpan('full')
                            ->content('<hr style="border-top:1px solid rgba(0,0,0,0.1);" class="my-4" />'),

                        TextInput::make('password')
                            ->password()
                            ->label('Password')
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->required(fn ($record) => $record === null)
                            ->visibleOn(['create', 'edit']),
                    ])
                    ->columns(2),

                Section::make('Roles')
                    ->schema([
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name')
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
