<?php

namespace App\Filament\Clusters\RulesAndPolicies\Resources;

use App\Filament\Clusters\RulesAndPolicies;
use App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource\Pages;
use App\Filament\Clusters\RulesAndPolicies\Resources\ExchangeAndReturnResource\RelationManagers;
use App\Models\ExchangeAndReturn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExchangeAndReturnResource extends Resource
{
    protected static ?string $model = ExchangeAndReturn::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = RulesAndPolicies::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações Gerais')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Título')
                            ->required()
                            ->placeholder('Digite o título...')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->label('Conteúdo')
                            ->required()
                            ->placeholder('Escreva o conteúdo aqui...')
                            ->columnSpanFull(),
                    ])
                    ->columns(1) // Mantém o layout simples, mas organizado
                    ->collapsible(), // Permite esconder a seção
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->sortable()
                    ->searchable()
                    ->color('primary'), // Destaca o título

                Tables\Columns\TextColumn::make('content')
                    ->label('Conteúdo')
                    ->limit(50) // Limita o texto para não poluir a tabela
                    ->tooltip(fn ($record) => $record->content), // Mostra o conteúdo completo ao passar o mouse
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

    public static function canCreate(): bool
    {
        return ExchangeAndReturn::count() < 1;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExchangeAndReturns::route('/'),
            //'create' => Pages\CreateExchangeAndReturn::route('/create'),
            //'edit' => Pages\EditExchangeAndReturn::route('/{record}/edit'),
        ];
    }
}
