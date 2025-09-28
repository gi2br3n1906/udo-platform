<?php

namespace App\Filament\Resources\Universities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Schema;

class UniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Universitas')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Select::make('type')
                    ->label('Jenis Universitas')
                    ->options([
                        'PTN' => 'PTN (Perguruan Tinggi Negeri)',
                        'PTS' => 'PTS (Perguruan Tinggi Swasta)',
                        'Kedinasan' => 'Kedinasan'
                    ])
                    ->required(),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'Saintek' => 'Saintek',
                        'Soshum' => 'Soshum',
                        'Campuran' => 'Campuran'
                    ])
                    ->required(),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                FileUpload::make('logo_path')
                    ->label('Logo Universitas')
                    ->image()
                    ->directory('university-logos'),

                TextInput::make('official_link')
                    ->label('Website Resmi')
                    ->url()
                    ->maxLength(255),

                KeyValue::make('social_media')
                    ->label('Media Sosial')
                    ->keyLabel('Platform')
                    ->valueLabel('URL')
                    ->columnSpanFull(),
            ]);
    }
}
