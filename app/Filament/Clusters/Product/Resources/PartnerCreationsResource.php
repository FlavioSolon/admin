<?php

namespace App\Filament\Clusters\Product\Resources;

use App\Filament\Clusters\Product;
use App\Filament\Clusters\Product\Resources\PartnerCreationsResource\Pages;
use App\Filament\Clusters\Product\Resources\PartnerCreationsResource\RelationManagers;
use App\Models\PartnerCreations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerCreationsResource extends Resource
{
    protected static ?string $model = PartnerCreations::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Product::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Partner Creations')
                    ->description('Provide details about the partner creation.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Creation Name')
                            ->required()
                            ->placeholder('Enter the name of the creation')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Write a brief description of the creation.')
                            ->maxLength(500),
                        Forms\Components\FileUpload::make('image')
                            ->label('Creation Image')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->optimize('webp')
                            ->directory('partner_creations')
                            ->disk('public')
                            ->image()
                            ->hint('Upload an image representing the creation.'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListPartnerCreations::route('/'),
            'create' => Pages\CreatePartnerCreations::route('/create'),
            'edit' => Pages\EditPartnerCreations::route('/{record}/edit'),
        ];
    }
}
