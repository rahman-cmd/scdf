<?php

namespace App\Filament\Resources\Donations;

use App\Enums\DonationPaymentMethod;
use App\Filament\Resources\Donations\Pages\EditDonation;
use App\Filament\Resources\Donations\Pages\ListDonations;
use App\Filament\Resources\Donations\Pages\ViewDonation;
use App\Models\Donation;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|UnitEnum|null $navigationGroup = 'Fundraising';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->disabled()->dehydrated(false),
                TextInput::make('email')->disabled()->dehydrated(false),
                TextInput::make('amount')->disabled()->dehydrated(false)->prefix('৳'),
                TextInput::make('payment_method')->disabled()->dehydrated(false)
                    ->formatStateUsing(fn ($state): string => DonationPaymentMethod::labelFor($state)),
                TextInput::make('transaction_id')->disabled()->dehydrated(false)->label('TrxID'),
                Select::make('status')
                    ->options([
                        'new' => 'New',
                        'reviewed' => 'Reviewed',
                    ])
                    ->required(),
                Textarea::make('notes')->rows(4)->columnSpanFull(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('amount')->money('BDT'),
                TextEntry::make('payment_method')
                    ->formatStateUsing(fn ($state): string => DonationPaymentMethod::labelFor($state)),
                TextEntry::make('transaction_id')->label('TrxID')->placeholder('—'),
                TextEntry::make('status')->badge(),
                TextEntry::make('notes')->placeholder('—')->columnSpanFull(),
                TextEntry::make('created_at')->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('amount')->money('BDT')->sortable(),
                TextColumn::make('payment_method')
                    ->label('Method')
                    ->formatStateUsing(fn ($state): string => DonationPaymentMethod::labelFor($state)),
                TextColumn::make('transaction_id')->label('TrxID')->searchable()->toggleable(),
                TextColumn::make('status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'reviewed' => 'success',
                        default => 'warning',
                    }),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'new' => 'New',
                    'reviewed' => 'Reviewed',
                ]),
                SelectFilter::make('payment_method')->options(DonationPaymentMethod::options()),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDonations::route('/'),
            'view' => ViewDonation::route('/{record}'),
            'edit' => EditDonation::route('/{record}/edit'),
        ];
    }
}
