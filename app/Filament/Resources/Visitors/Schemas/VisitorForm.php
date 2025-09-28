<?php

namespace App\Filament\Resources\Visitors\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class VisitorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('school_name')
                    ->label('Nama Sekolah/Institusi')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: SMA Negeri 1 Jakarta')
                    ->columnSpan(1),

                Select::make('class_level')
                    ->label('Tingkat/Status')
                    ->options([
                        'XI' => 'Kelas XI',
                        'XII' => 'Kelas XII',
                        'Alumni' => 'Alumni',
                        'Umum' => 'Masyarakat Umum',
                    ])
                    ->required()
                    ->native(false)
                    ->columnSpan(1),
            ])
            ->columns(2);
    }
}
