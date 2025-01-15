<?php

namespace App\Filament\Clusters\Product\Resources;

use App\Filament\Clusters\Product;
use App\Filament\Clusters\Product\Resources\OurProductsResource\Pages;
use App\Filament\Clusters\Product\Resources\OurProductsResource\RelationManagers;
use App\Models\OurProducts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurProductsResource extends Resource
{
    protected static ?string $model = OurProducts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Product::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('General Information')
                    ->description('Provide basic information about the product.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Product Name')
                            ->required()
                            ->placeholder('Enter the product name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('link_product')
                            ->label('Product Link')
                            ->url()
                            ->required()
                            ->placeholder('Enter a URL to the product page'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Product Description')
                            ->required()
                            ->placeholder('Write a detailed description of the product')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Tabs::make('Product Media')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Images')
                            ->label('Product Images')
                            ->icon('heroicon-o-rectangle-stack')
                            ->schema([
                                Forms\Components\FileUpload::make('first_image')
                                    ->label('First Image')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('our_products')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload the primary image for the product.'),
                                Forms\Components\FileUpload::make('second_image')
                                    ->label('Second Image')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('our_products')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Optional: Upload a secondary image.'),
                                Forms\Components\FileUpload::make('third_image')
                                    ->label('Third Image')
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('our_products')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Optional: Upload a tertiary image.'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Nutritional Table')
                            ->label('Nutritional Table')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\FileUpload::make('nutritional_table')
                                    ->label('Nutritional Table')
                                    ->imageEditor()
                                    ->required()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('our_products')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload an image of the nutritional table for this product.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('first_image')
                    ->label('Primary Image'),
                Tables\Columns\ImageColumn::make('second_image')
                    ->label('Secondary Image'),
                Tables\Columns\ImageColumn::make('third_image')
                    ->label('Tertiary Image'),
                Tables\Columns\ImageColumn::make('nutritional_table')
                    ->label('Nutritional Table'),
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
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOurProducts::route('/'),
            'create' => Pages\CreateOurProducts::route('/create'),
            'edit' => Pages\EditOurProducts::route('/{record}/edit'),
        ];
    }
}
