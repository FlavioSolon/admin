<?php

namespace App\Filament\Clusters\FindUsPage\Resources;

use App\Filament\Clusters\FindUsPage;
use App\Filament\Clusters\FindUsPage\Resources\StoreLocationResource\Pages;
use App\Filament\Clusters\FindUsPage\Resources\StoreLocationResource\RelationManagers;
use App\Models\StoreLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoreLocationResource extends Resource
{
    protected static ?string $model = StoreLocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = FindUsPage::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('iframe')
                    ->label('Google Maps Iframe')
                    ->helperText('Cole o código HTML do iframe do Google Maps.')
                    ->rows(4)
                    ->required(),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListStoreLocations::route('/'),
            'create' => Pages\CreateStoreLocation::route('/create'),
            'edit' => Pages\EditStoreLocation::route('/{record}/edit'),
        ];
    }
}
