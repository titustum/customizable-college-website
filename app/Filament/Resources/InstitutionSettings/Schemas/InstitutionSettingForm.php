<?php

namespace App\Filament\Resources\InstitutionSettings\Schemas;

use App\Enums\CollegeCategory;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InstitutionSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()
                ->columnSpanFull()
                ->schema([
                    Section::make('Institution Details')
                        ->description('Basic identity and branding info')
                        ->columns(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Institution Name')
                                ->required(),

                            Select::make('category')
                                ->label('College Category')
                                ->options(CollegeCategory::options())
                                ->default('tvc')
                                ->required()
                        ]),

                    Section::make('Messages')
                        ->description('Vision, Mission, Welcome note')
                        ->schema([
                            RichEditor::make('welcome_message')
                                ->label('Welcome Message')
                                ->required()
                                ->columnSpanFull(),

                            Textarea::make('motto')
                                ->rows(3)
                                ->columnSpanFull(),

                            Textarea::make('vision')
                                ->rows(3)
                                ->columnSpanFull(),

                            Textarea::make('mission')
                                ->rows(3)
                                ->columnSpanFull(),
                            RichEditor::make('about_us')
                                ->required()
                                ->columnSpanFull()
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'strike',
                                    'underline',
                                    'bulletList',
                                    'orderedList',
                                    'h2',
                                    'h3',
                                    'link',
                                    'blockquote',
                                    'redo',
                                    'undo',
                                ]),
                        ]),

                    Section::make('Branding')
                        ->columns(2)
                        ->schema([
                            ColorPicker::make('primary_color')
                                ->label('Primary Color')
                                ->default('#f97316'),

                            Select::make('primary_font')
                                ->label('Primary Font')
                                ->options([
                                    'Inter' => 'Inter',
                                    'Instrument Sans' => 'Instrument Sans',
                                    'Poppins' => 'Poppins',
                                    'Nunito' => 'Nunito',
                                    'Open Sans' => 'Open Sans',
                                    'Roboto' => 'Roboto',
                                ])
                                ->searchable()
                                ->placeholder('Choose primary font'),

                            FileUpload::make('logo')
                                ->label('Institution Logo')
                                ->image()
                                ->disk('public')
                                ->imageEditor()
                                ->directory('logos')
                                ->previewable()
                                ->maxSize(2048),

                        ]),

                    Section::make('Contact Information')
                        ->columns(2)
                        ->schema([
                            TextInput::make('phone')
                                ->label('Phone Number')
                                ->tel()
                                ->placeholder('+254 7xxxxxxx'),

                            TextInput::make('email')
                                ->label('Email Address')
                                ->email()
                                ->placeholder('info@institution.ac.ke'),

                            Textarea::make('address')
                                ->rows(3)
                                ->label('Physical Address')
                                ->columnSpanFull()
                                ->placeholder('Enter address i.e. PO Box 123 - 10100, Nairobi'),

                            TextInput::make('latitude')
                                ->label('Latitude')
                                ->placeholder('-1.2921'),

                            TextInput::make('longitude')
                                ->label('Longitude')
                                ->placeholder('36.8219'),

                        ]),

                    Section::make('Social Media Links')
                        ->columns(2)
                        ->schema([
                            TextInput::make('facebook')
                                ->label('Facebook URL')
                                ->prefixIcon('heroicon-m-globe-alt'),

                            TextInput::make('tiktok')
                                ->label('TikTok URL')
                                ->prefixIcon('heroicon-m-globe-alt'),

                            TextInput::make('x')
                                ->label('X (Twitter) URL')
                                ->prefixIcon('heroicon-m-globe-alt'),

                            TextInput::make('youtube')
                                ->label('YouTube URL')
                                ->prefixIcon('heroicon-m-globe-alt'),
                        ]),

                ]),
        ]);
    }
}
