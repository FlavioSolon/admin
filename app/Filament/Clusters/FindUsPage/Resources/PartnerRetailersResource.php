<?php

namespace App\Filament\Clusters\FindUsPage\Resources;

use App\Filament\Clusters\FindUsPage;
use App\Filament\Clusters\FindUsPage\Resources\PartnerRetailersResource\Pages;
use App\Filament\Clusters\FindUsPage\Resources\PartnerRetailersResource\RelationManagers;
use App\Models\PartnerRetailers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerRetailersResource extends Resource
{
    protected static ?string $model = PartnerRetailers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = FindUsPage::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('logo')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('partner_retailers')
                    ->disk('public')
                    ->image(),
                Forms\Components\Textarea::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('link')
                    ->label('Link do loja')
                    ->url()
                    ->placeholder('https://...')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
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
            'index' => Pages\ListPartnerRetailers::route('/'),
            'create' => Pages\CreatePartnerRetailers::route('/create'),
            'edit' => Pages\EditPartnerRetailers::route('/{record}/edit'),
        ];
    }
}
