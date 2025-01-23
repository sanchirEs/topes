<?php

namespace App\Filament\Resources\BlogGalleryResource\Pages;

use App\Filament\Resources\BlogGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogGallery extends CreateRecord
{
    protected static string $resource = BlogGalleryResource::class;
}
