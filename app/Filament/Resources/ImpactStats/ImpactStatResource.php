<?php

namespace App\Filament\Resources\ImpactStats;

use App\Filament\Resources\ImpactStats\Pages\CreateImpactStat;
use App\Filament\Resources\ImpactStats\Pages\EditImpactStat;
use App\Filament\Resources\ImpactStats\Pages\ListImpactStats;
use App\Models\ImpactStat;
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

class ImpactStatResource extends Resource
{
    protected static ?string $model = ImpactStat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Impact';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Impact Stats';

    protected static ?string $modelLabel = 'Impact Stat';

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('figure')->required()->maxLength(50)->helperText('e.g. 64 or 10,000+'),
                TextInput::make('label')->required()->maxLength(120),
                Textarea::make('summary')->required()->rows(3)->columnSpanFull(),
                TextInput::make('icon')->required()->default('fa-chart-line'),
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
                TextColumn::make('figure')->sortable(),
                TextColumn::make('label')->searchable()->sortable(),
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
            'index' => ListImpactStats::route('/'),
            'create' => CreateImpactStat::route('/create'),
            'edit' => EditImpactStat::route('/{record}/edit'),
        ];
    }
}
