<?php

namespace App\Filament\Resources\Institutions\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;  
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InstitutionForm
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

                    TextInput::make('motto')
                        ->maxLength(100)
                        ->placeholder('e.g. Skills for Life'),

                    TextInput::make('principal_name')
                        ->label("Principal's Name"),

                        

                        //principal photo
                    FileUpload::make('principal_photo')
                        ->label("Principal's Photo")
                        ->image() 
                        ->imageEditor()
                        ->directory('principals')
                        ->previewable()
                        ->maxSize(2048),
                ]),

            Section::make('Messages')
                ->description('Vision, Mission, Welcome note')
                ->schema([
                    Textarea::make('welcome_message')
                        ->label('Welcome Message')
                        ->columnSpanFull()
                        ->rows(3),

                    Textarea::make('motto')
                        ->rows(3)
                        ->columnSpanFull(),

                    Textarea::make('vision')
                        ->rows(3)
                        ->columnSpanFull(),

                    Textarea::make('mission')
                        ->rows(3)
                        ->columnSpanFull(),

                    Textarea::make('about_us')
                        ->label('About Us')
                        ->rows(4)
                        ->columnSpanFull(),
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
                            'Poppins' => 'Poppins',
                            'Nunito' => 'Nunito',
                            'Open Sans' => 'Open Sans',
                            'Roboto' => 'Roboto',
                        ])
                        ->searchable()
                        ->placeholder('Choose primary font'),

                    // logo
                    FileUpload::make('logo')
                        ->label("Institution Logo")
                        ->image() 
                        ->imageEditor()
                        ->directory('principals')
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


                        //address
                    Textarea::make('address')
                        ->rows(3)
                        ->label('Physical Address')
                        ->columnSpanFull()
                        ->placeholder('Enter address i.e. PO Box 123 - 10100, Nairobi'),
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

            ]) 
        ]);
    }
}
