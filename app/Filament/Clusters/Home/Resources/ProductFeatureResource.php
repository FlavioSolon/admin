<?php

namespace App\Filament\Clusters\Home\Resources;

use App\Filament\Clusters\Home;
use App\Filament\Clusters\Home\Resources\ProductFeatureResource\Pages;
use App\Filament\Clusters\Home\Resources\ProductFeatureResource\RelationManagers;
use App\Models\ProductFeature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class ProductFeatureResource extends Resource
{
    protected static ?string $model = ProductFeature::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Home::class;
    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Information')
                    ->description('Provide the title and subtitle for this product feature.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Main Title')
                                    ->placeholder('Enter the main title')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('subtitle')
                                    ->label('Subtitle')
                                    ->placeholder('Enter a short subtitle')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                    ]),
                Section::make('Cards')
                    ->description('Add a card with title, subtitle, and an icon.')
                    ->schema([
                        Repeater::make('cards')
                            ->label('Feature Cards')
                            ->minItems(1)
                            ->maxItems(1)
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Card Title')
                                            ->placeholder('Enter the card title')
                                            ->required(),
                                        TextInput::make('subtitle')
                                            ->label('Card Subtitle')
                                            ->placeholder('Enter the card subtitle')
                                            ->required(),
                                    ]),
                                FileUpload::make('icon')
                                    ->label('Card Icon')
                                    ->imageEditor()
                                    ->required()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('product_feature')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload an icon for this card.'),
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
                Tables\Columns\TextColumn::make('cards')->label('Cards Count')
                    ->getStateUsing(fn (ProductFeature $record) => count($record->cards)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        if (ProductFeature::count() <= 3) {
                            Notification::make()
                                ->title('Minimum Limit Reached')
                                ->body('You cannot delete this record because the minimum number of records is 3.')
                                ->warning()
                                ->send();
                            return false; // Cancela a exclusão
                        }
                        return true;
                    }),
            ]);
    }

    public static function canCreate(): bool
    {
        return ProductFeature::count() < 3; // Permite criar apenas se houver menos de 3 registros
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductFeatures::route('/'),
            'create' => Pages\CreateProductFeature::route('/create'),
            'edit' => Pages\EditProductFeature::route('/{record}/edit'),
        ];
    }
}
