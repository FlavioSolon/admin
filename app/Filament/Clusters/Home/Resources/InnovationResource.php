<?php

namespace App\Filament\Clusters\Home\Resources;

use App\Filament\Clusters\Home;
use App\Filament\Clusters\Home\Resources\InnovationResource\Pages;
use App\Filament\Clusters\Home\Resources\InnovationResource\RelationManagers;
use App\Models\Innovation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class InnovationResource extends Resource
{
    protected static ?string $model = Innovation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Home::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Information')
                    ->description('Configure the main title and subtitle of the page.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Main Title')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('subtitle')
                                    ->label('Subtitle')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Cards')
                    ->description('Define the content for the three feature cards.')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('card_title1')
                                            ->label('Card 1 Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('card_description1')
                                            ->label('Card 1 Description')
                                            ->required(),
                                        FileUpload::make('card_icon1')
                                            ->imageEditor()
                                            ->required()
                                            ->imageEditorAspectRatios([
                                                null,
                                                '16:9',
                                                '4:3',
                                                '1:1',
                                            ])
                                            ->optimize('webp')
                                            ->directory('innovation')
                                            ->disk('public')
                                            ->image(),
                                    ]),
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('card_title2')
                                            ->label('Card 2 Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('card_description2')
                                            ->label('Card 2 Description')
                                            ->required(),
                                        FileUpload::make('card_icon2')
                                            ->imageEditor()
                                            ->required()
                                            ->imageEditorAspectRatios([
                                                null,
                                                '16:9',
                                                '4:3',
                                                '1:1',
                                            ])
                                            ->optimize('webp')
                                            ->directory('innovation')
                                            ->disk('public')
                                            ->image(),
                                    ]),
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('card_title3')
                                            ->label('Card 3 Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('card_description3')
                                            ->label('Card 3 Description')
                                            ->required(),
                                        FileUpload::make('card_icon3')
                                            ->imageEditor()
                                            ->required()
                                            ->imageEditorAspectRatios([
                                                null,
                                                '16:9',
                                                '4:3',
                                                '1:1',
                                            ])
                                            ->optimize('webp')
                                            ->directory('innovation')
                                            ->disk('public')
                                            ->image(),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\TextColumn::make('subtitle')->label('Subtitle'),
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

    public static function canCreate(): bool
    {
        return Innovation::count() === 0; // Permite criar apenas se não houver nenhum registro
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInnovations::route('/'),
            'create' => Pages\CreateInnovation::route('/create'),
            'edit' => Pages\EditInnovation::route('/{record}/edit'),
        ];
    }
}
