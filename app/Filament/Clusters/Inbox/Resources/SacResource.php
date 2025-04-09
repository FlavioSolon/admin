<?php

namespace App\Filament\Clusters\Inbox\Resources;

use App\Filament\Clusters\Inbox;
use App\Filament\Clusters\Inbox\Resources\SacResource\Pages;
use App\Filament\Clusters\Inbox\Resources\SacResource\RelationManagers;
use App\Models\Sac;
use App\Notifications\ReplyNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SacResource extends Resource
{
    protected static ?string $model = Sac::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Inbox::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reported_product')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('reported_problem')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reported_product')
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
                Action::make('reply')
                    ->label('Responder')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->form([
                        Forms\Components\TextInput::make('subject')
                            ->label('Assunto')
                            ->required()
                            ->default('Resposta à sua solicitação no SAC - Nutricandies'),
                        Forms\Components\Textarea::make('message')
                            ->label('Mensagem')
                            ->required()
                            ->rows(5),
                    ])
                    ->action(function (Sac $record, array $data) {
                        $record->notify(new ReplyNotification($data['subject'], $data['message']));
                    })
                    ->modalHeading('Responder Solicitação do SAC')
                    ->modalSubmitActionLabel('Enviar Resposta'),
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
            'index' => Pages\ListSacs::route('/'),
            'create' => Pages\CreateSac::route('/create'),
            'edit' => Pages\EditSac::route('/{record}/edit'),
        ];
    }
}
