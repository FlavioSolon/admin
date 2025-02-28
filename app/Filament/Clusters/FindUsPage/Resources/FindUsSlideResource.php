<?php

namespace App\Filament\Clusters\FindUsPage\Resources;

use App\Filament\Clusters\FindUsPage;
use App\Filament\Clusters\FindUsPage\Resources\FindUsSlideResource\Pages;
use App\Filament\Clusters\FindUsPage\Resources\FindUsSlideResource\RelationManagers;
use App\Models\FindUsSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FindUsSlideResource extends Resource
{
    protected static ?string $model = FindUsSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = FindUsPage::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_desktop')
                    ->imageEditor()
                    ->required()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('findus_slide')
                    ->disk('public')
                    ->image(),
                Forms\Components\FileUpload::make('image_mobile')
                    ->imageEditor()
                    ->required()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->optimize('webp')
                    ->directory('findus_slide')
                    ->disk('public')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_desktop'),
                Tables\Columns\ImageColumn::make('image_mobile'),
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
            'index' => Pages\ListFindUsSlides::route('/'),
            'create' => Pages\CreateFindUsSlide::route('/create'),
            'edit' => Pages\EditFindUsSlide::route('/{record}/edit'),
        ];
    }
}
