<?php

namespace App\Filament\Resources\BlogGalleryResource\Pages;

use App\Filament\Resources\BlogGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogGallery extends EditRecord
{
    protected static string $resource = BlogGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
