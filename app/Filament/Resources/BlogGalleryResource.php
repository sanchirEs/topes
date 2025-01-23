<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogGalleryResource\Pages;
use App\Filament\Resources\BlogGalleryResource\RelationManagers;
use App\Models\Blog_gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogGalleryResource extends Resource
{
    protected static ?string $model = Blog_gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('blog_Post_id')
                ->relationship(name: 'Blog_post', titleAttribute: 'title')
                ->preload()
                ->live()
                ->required(),
                Forms\Components\FileUpload::make('picture')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Blog_post.title'),
                Tables\Columns\ImageColumn::make('picture'),
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBlogGalleries::route('/'),
            'create' => Pages\CreateBlogGallery::route('/create'),
            'view' => Pages\ViewBlogGallery::route('/{record}'),
            'edit' => Pages\EditBlogGallery::route('/{record}/edit'),
        ];
    }
}
