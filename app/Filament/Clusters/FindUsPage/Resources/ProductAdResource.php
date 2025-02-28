<?php

namespace App\Filament\Clusters\FindUsPage\Resources;

use App\Filament\Clusters\FindUsPage;
use App\Filament\Clusters\FindUsPage\Resources\ProductAdResource\Pages;
use App\Filament\Clusters\FindUsPage\Resources\ProductAdResource\RelationManagers;
use App\Models\ProductAd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductAdResource extends Resource
{
    protected static ?string $model = ProductAd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = FindUsPage::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detalhes do Anúncio')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->placeholder('Digite o título do anúncio...')
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('image_path')
                            ->label('Imagem')
                            ->image()
                            ->directory('product-ads')
                            ->disk('public')
                            ->helperText('Faça upload da imagem do produto.'),

                        Forms\Components\TextInput::make('marketplace_url')
                            ->label('Link do Marketplace')
                            ->url()
                            ->placeholder('https://...')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Imagem')
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('marketplace_url')
                    ->label('Marketplace')
                    ->openUrlInNewTab()
                    ->limit(30),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListProductAds::route('/'),
            'create' => Pages\CreateProductAd::route('/create'),
            'edit' => Pages\EditProductAd::route('/{record}/edit'),
        ];
    }
}
