<?php

namespace App\Filament\Resources\BlogGalleryResource\Pages;

use App\Filament\Resources\BlogGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBlogGallery extends ViewRecord
{
    protected static string $resource = BlogGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
