<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make() // Substitui o antigo Card
                    ->schema([
                        // Título e Destaque
                        Forms\Components\TextInput::make('title')
                            ->label('Título da Notícia')
                            ->required()
                            ->placeholder('Digite o título da notícia...')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->placeholder('Digite o endereço da notícia...')
                            ->maxLength(255),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Notícia em Destaque?')
                            ->onColor('success')
                            ->offColor('danger')
                            ->inline(),

                        // Descrição e Imagem
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição Breve')
                            ->placeholder('Digite uma breve descrição da notícia...')
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Imagem da Notícia')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->directory('news')
                            ->disk('public')
                            ->image()
                            ->helperText('Faça upload de uma imagem no formato .jpg, .png ou .webp (Tamanho recomendado: 16:9).'),
                    ])
                    ->columns(2), // Divide os campos em 2 colunas

                Forms\Components\Tabs::make('Conteúdo e Detalhes')
                    ->tabs([
                        // Aba de Detalhes
                        Forms\Components\Tabs\Tab::make('Detalhes')
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                    ->label('Data de Publicação')
                                    ->required(),

                                Forms\Components\TextInput::make('badge')
                                    ->label('Categoria / Rótulo')
                                    ->placeholder('Exemplo: "Notícias", "Blog"...')
                                    ->maxLength(255),

                                Forms\Components\Repeater::make('authors')
                                    ->label('Autores')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Nome do Autor')
                                            ->placeholder('Digite o nome do autor...'),
                                        Forms\Components\TextInput::make('to')
                                            ->label('Link do Perfil')
                                            ->placeholder('https://...')
                                            ->url(),
                                        Forms\Components\FileUpload::make('avatar')
                                            ->label('Avatar do Autor')
                                            ->directory('author-avatars')
                                            ->disk('public'),
                                    ])
                                    ->collapsible()
                                    ->columns(3)
                                    ->helperText('Adicione os autores desta notícia.'),
                            ]),

                        // Aba de Conteúdo
                        Forms\Components\Tabs\Tab::make('Conteúdo')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('content_markdown')
                                    ->label('Conteúdo da Notícia')
                                    ->placeholder('Digite o conteúdo completo da notícia...')
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Utilize Markdown para formatar o texto (títulos, listas, links, etc.).'),
                            ]),
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('is_featured')
                ->label('Notícia em Destaque?'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('badge')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
