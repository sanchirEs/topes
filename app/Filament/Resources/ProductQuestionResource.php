<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductQuestionResource\Pages;
use App\Filament\Resources\ProductQuestionResource\RelationManagers;
use App\Models\ProductQuestion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Pages\Actions;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;

class ProductQuestionResource extends Resource
{
    protected static ?string $model = ProductQuestion::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';    
    protected static ?string $navigationLabel = 'Асуулт Хариулт';
    protected static ?string $pluralLabel = 'Асуулт Хариулт';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('product_id')->required()->numeric()->disabled(),
            // Forms\Components\TextInput::make('product.name')
            // ->label('Product Name')
            // ->disabled()
            // ->default(fn ($record) => $record->product->name ?? 'N/A'),
            Forms\Components\TextInput::make('asker_name')->default('Зочин'),
            Forms\Components\Textarea::make('question_text')->required()->rows(5),
            Forms\Components\Textarea::make('answer_text')->label('Admin Reply')->rows(5),
            Forms\Components\TextInput::make('answered_by')->label('Answered By')
            ->afterStateHydrated(fn ($state, callable $set) => $state === null ? $set('answered_by', 'Админ') : null),
            Forms\Components\Toggle::make('status')->label('Answered'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('product.name')
                ->label('Бараа')
                ->sortable()
                ->searchable()
                ->wrap(),
            Tables\Columns\TextColumn::make('asker_name')
                ->label('Асуусан нь')
                ->wrap()
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('question_text')
                ->label('Асуулт нь')
                ->wrap()  // Ensures that the text wraps to fit the column                
                ->searchable()
                ->extraAttributes(['style' => 'white-space: normal;']),  // Ensures full text display
            Tables\Columns\TextColumn::make('answer_text')
                ->label('Хуриулт нь')
                ->wrap()  // Same for the reply text                
                ->searchable()
                ->extraAttributes(['style' => 'white-space: normal;']),
            Tables\Columns\TextColumn::make('answered_by')
                ->label('Ариулсан нь'),
            Tables\Columns\TextColumn::make('status')
                ->label('Ариулсан эсэх')
                ->sortable()
                ->formatStateUsing(fn ($state) => $state ? 'Тийм' : 'Үгүй'),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Үүссэн огноо')
                ->sortable()
                ->dateTime('Y-m-d H:i'),
        ])
        ->defaultSort('status', 'asc')
        ->actions([
            // Custom Reply Action
            // Action::make('reply')
            // ->label('Reply')
            // ->color('primary')
            // ->icon('heroicon-o-pencil')
            // ->modalHeading('Reply to Question')
            // ->form([
            //     Forms\Components\Textarea::make('answer_text')
            //         ->label('Reply')
            //         ->required(),
            // ])
            // ->action(function ($record, array $data) {
            //     // Handle saving the reply
            //     $record->update([
            //         'answer_text' => $data['answer_text'],
            //         'answered_by' => 'Админ',  // Admin replying by default
            //         'status' => true,          // Set as answered
            //     ]);
            // })
            // ->modalWidth('lg'),
            Tables\Actions\EditAction::make(),
            // Tables\Actions\DeleteAction::make()
            //     ->label('Delete')
            //     ->color('danger')
            //     ->icon('heroicon-o-trash')
            //     ->requiresConfirmation()
            //     ->modalHeading('Delete Question and Reply'),
        ]);
    }

    public static function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return ProductQuestion::query()
            ->orderBy('status', 'asc') // Unanswered (0) first, Answered (1) later
            ->orderBy('created_at', 'desc'); // Then sort by creation date, newest first
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductQuestions::route('/'),
            'edit' => Pages\EditProductQuestion::route('/{record}/edit'),
        ];
    }
}
