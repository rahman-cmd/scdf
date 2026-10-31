<?php

namespace App\Filament\Support;

use Filament\Forms\Components\BaseFileUpload;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SiteImageUpload
{
    public static function make(string $name, string $directory, string $label = 'Image'): FileUpload
    {
        return FileUpload::make($name)
            ->label($label)
            ->image()
            ->disk('media')
            ->directory($directory)
            ->visibility('public')
            ->imageEditor()
            ->imagePreviewHeight('250')
            ->panelLayout('integrated')
            ->downloadable()
            ->openable()
            ->maxSize(8192)
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
            ->fetchFileInformation(false)
            ->getUploadedFileUsing(function (BaseFileUpload $component, string $file, string|array|null $storedFileNames): ?array {
                $name = ($component->isMultiple() ? ($storedFileNames[$file] ?? null) : $storedFileNames) ?? basename($file);

                return [
                    'name' => $name,
                    'size' => 0,
                    'type' => null,
                    // Same-origin relative URL so preview works on localhost and 127.0.0.1.
                    'url' => Str::sanitizeUrl('/'.ltrim($file, '/')),
                ];
            })
            ->saveUploadedFileUsing(function (BaseFileUpload $component, TemporaryUploadedFile $file): ?string {
                if (! $file->exists()) {
                    return null;
                }

                return $file->store($component->getDirectory(), $component->getDiskName());
            })
            ->helperText('Drag & drop or browse to upload a JPG, PNG, WEBP, or GIF (max 8MB).')
            ->columnSpanFull();
    }
}
