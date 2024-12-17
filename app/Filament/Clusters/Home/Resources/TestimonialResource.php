<?php

namespace App\Filament\Clusters\Home\Resources;

use App\Filament\Clusters\Home;
use App\Filament\Clusters\Home\Resources\TestimonialResource\Pages;
use App\Filament\Clusters\Home\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use IbrahimBougaoua\FilamentRatingStar\Forms\Components\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\Components\RatingStarColumns;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Home::class;

    protected static \Filament\Pages\SubNavigationPosition $subNavigationPosition = \Filament\Pages\SubNavigationPosition::Top;

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Testimonial Details')
                    ->description('Add a testimonial from a client or user, including their photo, feedback, and rating.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->placeholder('Enter the name of the client')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('photo')
                                    ->label('Photo')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->optimize('webp')
                                    ->directory('testimonials')
                                    ->disk('public')
                                    ->image()
                                    ->hint('Upload a photo of the client or user.'),
                            ]),
                        Forms\Components\Textarea::make('feedback')
                            ->label('Feedback')
                            ->placeholder('Enter the testimonial feedback')
                            ->required()
                            ->columnSpanFull()
                            ->hint('Provide the testimonial given by the client.'),
                        RatingStar::make('stars')
                            ->label('Rating')
                            ->required()
                            ->hint('Rate the testimonial out of 5 stars.'),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('photo')
                    ->searchable(),
                RatingStarColumns::make('stars')
                    ->sortable(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
