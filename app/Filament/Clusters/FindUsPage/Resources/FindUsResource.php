<?php

namespace App\Filament\Clusters\FindUsPage\Resources;

use App\Filament\Clusters\FindUsPage;
use App\Filament\Clusters\FindUsPage\Resources\FindUsResource\Pages;
use App\Models\FindUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class FindUsResource extends Resource
{
    protected static ?string $model = FindUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = FindUsPage::class;

    // Permitir criar apenas se não houver registros existentes
    public static function canCreate(): bool
    {
        return FindUs::count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Information')
                    ->description('Configure the main details of the Find Us section.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->placeholder('Enter the title')
                                    ->maxLength(255),
                                TextInput::make('subtitle')
                                    ->label('Subtitle')
                                    ->required()
                                    ->placeholder('Enter the subtitle')
                                    ->maxLength(255),
                            ]),
                    ]),
                Section::make('Media')
                    ->description('Upload media assets for this section.')
                    ->schema([
                        FileUpload::make('background_video')
                            ->label('Background Video')
                            ->required()
                            ->directory('find-us')
                            ->disk('public')
                            ->hint('Upload a background video file for the page.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('Subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('background_video')
                    ->label('Background Video')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        Notification::make()
                            ->title('Cannot Delete Record')
                            ->body('This record cannot be deleted because only one record is allowed.')
                            ->warning()
                            ->send();
                        return false;
                    }),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFindUs::route('/'),
            'create' => Pages\CreateFindUs::route('/create'),
            'edit' => Pages\EditFindUs::route('/{record}/edit'),
        ];
    }
}
