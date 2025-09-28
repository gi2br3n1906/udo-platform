<?php

namespace App\Filament\Resources\Universities\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UniversitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->size(40),

                TextColumn::make('name')
                    ->label('Nama Universitas')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('type')
                    ->label('Jenis')
                    ->colors([
                        'success' => 'PTN',
                        'primary' => 'PTS',
                        'warning' => 'Kedinasan',
                    ]),

                BadgeColumn::make('category')
                    ->label('Kategori')
                    ->colors([
                        'info' => 'Saintek',
                        'success' => 'Soshum',
                        'gray' => 'Campuran',
                    ]),

                TextColumn::make('official_link')
                    ->label('Website')
                    ->limit(30)
                    ->url(fn ($record) => $record->official_link)
                    ->openUrlInNewTab()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Jenis Universitas')
                    ->options([
                        'PTN' => 'PTN',
                        'PTS' => 'PTS',
                        'Kedinasan' => 'Kedinasan',
                    ]),

                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'Saintek' => 'Saintek',
                        'Soshum' => 'Soshum',
                        'Campuran' => 'Campuran',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()
                    ->url(fn ($record) => route('universities.show', $record->slug))
                    ->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
