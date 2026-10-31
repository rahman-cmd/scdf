<?php

namespace App\Filament\Resources\ValueCards;

use App\Filament\Resources\ValueCards\Pages\CreateValueCard;
use App\Filament\Resources\ValueCards\Pages\EditValueCard;
use App\Filament\Resources\ValueCards\Pages\ListValueCards;
use App\Models\ValueCard;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use UnitEnum;

class ValueCardResource extends Resource
{
    protected static ?string $model = ValueCard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Value Cards';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(120),
                Textarea::make('summary')->required()->rows(3)->columnSpanFull(),
                TextInput::make('icon')->required()->default('fa-handshake'),
                TextInput::make('icon_tone')->required()->default('text-partner'),
                TextInput::make('bg_tone')->required()->default('bg-[#edf7fe]'),
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
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('icon'),
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
            'index' => ListValueCards::route('/'),
            'create' => CreateValueCard::route('/create'),
            'edit' => EditValueCard::route('/{record}/edit'),
        ];
    }
}
