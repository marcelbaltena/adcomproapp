<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Html;
use Filament\Infolists\Components\TextEntry;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('User Information')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('company.name')
                            ->label('Company'),
                        TextEntry::make('weekly_hours')
                            ->label('Weekly Hours'),

                        // Divider line spanning both columns
                        Html::make('divider')
                            ->columnSpan('full')
                            ->content('<hr style="border-top:1px solid rgba(0,0,0,0.1);" class="my-4" />'),

                        // Subtle date fields
                        Html::make('email_verified_at')
                            ->columnSpan(1)
                            ->content(fn ($record) => sprintf(
                                '<div style="display:flex; flex-direction:column; gap:0.25rem;">
                                    <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">Email Verified:</span>
                                    <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">%s</span>
                                </div>',
                                $record->email_verified_at?->format('d F Y H:i') ?? '-'  
                            )),

                     //   Html::make('created_at')
                     //       ->columnSpan(1)
                     //       ->content(fn ($record) => sprintf(
                     //           '<div style="display:flex; flex-direction:column; gap:0.25rem;">
                     //               <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">Created At</span>
                     //               <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">%s</span>
                     //           </div>',
                     //           $record->created_at->format('Y-m-d H:i')
                     //       )),

                        Html::make('updated_at')
                            ->columnSpan(1)
                            ->content(fn ($record) => sprintf(
                                '<div style="display:flex; flex-direction:column; gap:0.25rem;">
                                    <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">Updated:</span>
                                    <span style="font-size:0.75rem; color:rgba(107,114,128,0.6);">%s</span>
                                </div>',
                                $record->updated_at->format('d F Y H:i')
                            )),
                    ])
                    ->columns(2),

                Section::make('Roles')
                    ->schema([
                        TextEntry::make('roles.name')
                            ->label('Roles')
                            ->listWithLineBreaks()
                            ->bulleted(),
                    ]),
            ]);
    }
}
