<?php

namespace App\Filament\Resources\Visitors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VisitorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                TextColumn::make('school_name')
                    ->label('Sekolah/Institusi')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('class_level')
                    ->label('Tingkat/Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'XI' => 'info',
                        'XII' => 'success',
                        'Alumni' => 'warning',
                        'Umum' => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('favoriteUniversities')
                    ->label('Favorit')
                    ->counts('favoriteUniversities')
                    ->badge()
                    ->color('primary')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Terdaftar')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('class_level')
                    ->label('Tingkat/Status')
                    ->options([
                        'XI' => 'Kelas XI',
                        'XII' => 'Kelas XII',
                        'Alumni' => 'Alumni',
                        'Umum' => 'Masyarakat Umum',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
