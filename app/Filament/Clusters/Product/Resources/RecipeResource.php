<?php

namespace App\Filament\Clusters\Product\Resources;

use App\Filament\Clusters\Product;
use App\Filament\Clusters\Product\Resources\RecipeResource\Pages;
use App\Filament\Clusters\Product\Resources\RecipeResource\RelationManagers;
use App\Models\Recipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use IbrahimBougaoua\FilamentRatingStar\Forms\Components\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\Components\RatingStarColumns;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Product::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Recipe Information')
                    ->description('Provide basic details about the recipe.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Recipe Name')
                            ->required()
                            ->placeholder('Enter the recipe name')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('photo')
                            ->label('Recipe Photo')
                            ->required()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->optimize('webp')
                            ->directory('recipe')
                            ->disk('public')
                            ->image()
                            ->hint('Upload a photo of the recipe.'),
                        Forms\Components\TextInput::make('prep_time')
                            ->label('Preparation Time (minutes)')
                            ->required()
                            ->numeric()
                            ->placeholder('Enter the preparation time in minutes'),
                        RatingStar::make('stars')
                            ->label('Rating')
                            ->required()
                            ->hint('Rate this recipe out of 5 stars.'),
                    ]),

                Forms\Components\Tabs::make('Recipe Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Recipe')
                            ->label('Recipe')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('recipe_markdown')
                                    ->label('Recipe Instructions')
                                    ->placeholder('Write the recipe instructions here.'),
                            ]),
                        Forms\Components\Tabs\Tab::make('Preparation')
                            ->label('Preparation')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('preparation_markdown')
                                    ->label('Preparation Steps')
                                    ->placeholder('Write the preparation steps here.'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prep_time')
                    ->numeric()
                    ->sortable(),
                RatingStarColumns::make('stars')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
