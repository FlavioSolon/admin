<?php

namespace App\Filament\Clusters\Product\Resources;

use App\Filament\Clusters\Product;
use App\Filament\Clusters\Product\Resources\ExpertOpinionResource\Pages;
use App\Filament\Clusters\Product\Resources\ExpertOpinionResource\RelationManagers;
use App\Models\ExpertOpinion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpertOpinionResource extends Resource
{
    protected static ?string $model = ExpertOpinion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Product::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Expert Details')
                    ->description('Provide information about the expert.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Expert Name')
                            ->required()
                            ->placeholder('Enter the expert\'s name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('profession')
                            ->label('Profession')
                            ->required()
                            ->placeholder('Enter the expert\'s profession')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('photo')
                            ->label('Photo')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->optimize('webp')
                            ->directory('expert_opinion')
                            ->disk('public')
                            ->image()
                            ->hint('Upload a photo of the expert.'),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->placeholder('Write a brief description about the expert.')
                            ->maxLength(500),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profession')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListExpertOpinions::route('/'),
            'create' => Pages\CreateExpertOpinion::route('/create'),
            'edit' => Pages\EditExpertOpinion::route('/{record}/edit'),
        ];
    }
}
