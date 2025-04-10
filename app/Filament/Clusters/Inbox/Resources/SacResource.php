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

    protected static ?string $navigationLabel = 'SAC';

    public static function getNavigationBadge(): ?string
    {
        return (string) Sac::where('is_viewed', false)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return Sac::where('is_viewed', false)->count() > 0 ? 'danger' : 'success';
    }

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
                    ->searchable()
                    ->color('gray')
                    ->weight(fn ($record) => $record->is_viewed ? 'normal' : 'bold')
                    ->description(fn ($record) => $record->is_viewed ? 'Visto' : 'Não visto'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('reported_product')
                    ->searchable()
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_viewed')
                    ->label('Visto')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de Envio')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordUrl(null)
            ->filters([
                Tables\Filters\Filter::make('is_viewed')
                    ->label('Não Vistos')
                    ->query(fn (Builder $query) => $query->where('is_viewed', false))
                    ->default(),
            ])
            ->actions([
                Action::make('view')
                    ->label('Marcar como Visto')
                    ->icon('heroicon-o-eye')
                    ->color('warning')
                    ->action(function (Sac $record) {
                        $record->update(['is_viewed' => true]);
                    })
                    ->hidden(fn (Sac $record) => $record->is_viewed), // Esconder se já foi visto
                Action::make('view_details')
                    ->label('Ver Detalhes')
                    ->icon('heroicon-o-document-text')
                    ->color('info')
                    ->modalHeading('Detalhes da Solicitação do SAC')
                    ->modalContent(function (Sac $record) {
                        return view('filament.resources.sac-details', ['record' => $record]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Fechar'),
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
                        $record->update(['is_viewed' => true]);
                    })
                    ->modalHeading('Responder Solicitação do SAC')
                    ->modalSubmitActionLabel('Enviar Resposta'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->striped()
            ->modifyQueryUsing(fn (Builder $query) => $query->orderBy('created_at', 'desc'));
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
        ];
    }
}
