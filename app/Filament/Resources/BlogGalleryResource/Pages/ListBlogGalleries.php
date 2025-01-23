<?php

namespace App\Filament\Resources\BlogGalleryResource\Pages;

use App\Filament\Resources\BlogGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogGalleries extends ListRecords
{
    protected static string $resource = BlogGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
