<?php

namespace App\Filament\Clusters\Impact\Resources;

use App\Filament\Clusters\Impact;
use App\Filament\Clusters\Impact\Resources\InitialImpactResource\Pages;
use App\Filament\Clusters\Impact\Resources\InitialImpactResource\RelationManagers;
use App\Models\InitialImpact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InitialImpactResource extends Resource
{
    protected static ?string $model = InitialImpact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Impact::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('background_video'),
                Forms\Components\FileUpload::make('background_image')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('initial_impact')
                    ->disk('public')
                    ->image(),
                Forms\Components\TextInput::make('waste_reduction_kg')
                    ->numeric(),
                Forms\Components\FileUpload::make('waste_reduction_icon')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('initial_impact')
                    ->disk('public')
                    ->image(),
                Forms\Components\TextInput::make('waste_reduction_description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('regenerative_food_kg')
                    ->numeric(),
                Forms\Components\FileUpload::make('regenerative_food_icon')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('initial_impact')
                    ->disk('public')
                    ->image(),
                Forms\Components\TextInput::make('regenerative_food_description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cacao_farmers')
                    ->numeric(),
                Forms\Components\FileUpload::make('cacao_farmers_icon')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('initial_impact')
                    ->disk('public')
                    ->image(),
                Forms\Components\TextInput::make('cacao_farmers_description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('producer_income')
                    ->numeric(),
                Forms\Components\FileUpload::make('producer_income_icon')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('initial_impact')
                    ->disk('public')
                    ->image(),
                Forms\Components\TextInput::make('producer_income_description')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('background_video')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waste_reduction_kg')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('waste_reduction_icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waste_reduction_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('regenerative_food_kg')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('regenerative_food_icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('regenerative_food_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cacao_farmers')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cacao_farmers_icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cacao_farmers_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('producer_income')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('producer_income_icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('producer_income_description')
                    ->searchable(),
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
            'index' => Pages\ListInitialImpacts::route('/'),
            'create' => Pages\CreateInitialImpact::route('/create'),
            'edit' => Pages\EditInitialImpact::route('/{record}/edit'),
        ];
    }
}
