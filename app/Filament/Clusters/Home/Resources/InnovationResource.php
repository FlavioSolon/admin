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
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;

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
                // General Information section outside Tabs
                Forms\Components\Section::make('General Information')
                    ->description('Configure the main title and subtitle of the page.')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Main Title')
                                    ->required()
                                    ->placeholder('Enter the main title')
                                    ->maxLength(255),
                                TextInput::make('subtitle')
                                    ->label('Subtitle')
                                    ->required()
                                    ->placeholder('Enter the subtitle')
                                    ->maxLength(255),
                            ]),
                    ]),

                // Tabs for cards
                Tabs::make('Innovation Tabs')
                    ->tabs([
                        Tab::make('Card 1')
                            ->label('Card 1')
                            ->icon('heroicon-o-credit-card')
                            ->schema([
                                TextInput::make('card_title1')
                                    ->label('Card 1 Title')
                                    ->required()
                                    ->placeholder('Enter the title for Card 1')
                                    ->maxLength(255),
                                TextInput::make('card_description1')
                                    ->label('Card 1 Description')
                                    ->required()
                                    ->placeholder('Enter the description for Card 1'),
                                FileUpload::make('card_icon1')
                                    ->label('Card 1 Icon')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('innovation')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload an icon for Card 1.'),
                            ]),

                        Tab::make('Card 2')
                            ->label('Card 2')
                            ->icon('heroicon-o-credit-card')
                            ->schema([
                                TextInput::make('card_title2')
                                    ->label('Card 2 Title')
                                    ->required()
                                    ->placeholder('Enter the title for Card 2')
                                    ->maxLength(255),
                                TextInput::make('card_description2')
                                    ->label('Card 2 Description')
                                    ->required()
                                    ->placeholder('Enter the description for Card 2'),
                                FileUpload::make('card_icon2')
                                    ->label('Card 2 Icon')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('innovation')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload an icon for Card 2.'),
                            ]),

                        Tab::make('Card 3')
                            ->label('Card 3')
                            ->icon('heroicon-o-credit-card')
                            ->schema([
                                TextInput::make('card_title3')
                                    ->label('Card 3 Title')
                                    ->required()
                                    ->placeholder('Enter the title for Card 3')
                                    ->maxLength(255),
                                TextInput::make('card_description3')
                                    ->label('Card 3 Description')
                                    ->required()
                                    ->placeholder('Enter the description for Card 3'),
                                FileUpload::make('card_icon3')
                                    ->label('Card 3 Icon')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('innovation')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload an icon for Card 3.'),
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
