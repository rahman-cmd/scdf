<?php

namespace App\Filament\Resources\Programs;

use App\Filament\Resources\Programs\Pages\CreateProgram;
use App\Filament\Resources\Programs\Pages\EditProgram;
use App\Filament\Resources\Programs\Pages\ListPrograms;
use App\Filament\Support\SiteImageUpload;
use App\Models\Program;
use App\Support\Media;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use UnitEnum;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
                Textarea::make('summary')->required()->rows(3)->columnSpanFull(),
                SiteImageUpload::make('image', 'uploads/programs'),
                TextInput::make('image_alt')->label('Image alt text')->maxLength(255)->columnSpanFull(),
                TextInput::make('icon')->required()->default('fa-leaf')->helperText('Font Awesome class, e.g. fa-water'),
                TextInput::make('tone')->required()->default('bg-brand')->helperText('Tailwind class, e.g. bg-sea'),
                TextInput::make('sort_order')->numeric()->default(0)->required(),
                Toggle::make('is_active')->default(true)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->columns([
                ImageColumn::make('image')
                    ->getStateUsing(fn (Program $record): ?string => Media::url($record->image) ?: null)
                    ->circular(),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('icon')->toggleable(),
                TextInputColumn::make('sort_order')->rules(['integer', 'min:0']),
                IconColumn::make('is_active')->boolean(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPrograms::route('/'),
            'create' => CreateProgram::route('/create'),
            'edit' => EditProgram::route('/{record}/edit'),
        ];
    }
}
