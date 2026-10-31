<?php

namespace App\Filament\Widgets;

use App\Enums\DonationPaymentMethod;
use App\Models\Donation;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentDonations extends TableWidget
{
    protected static ?string $heading = 'Recent donations';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Donation::query()->latest()->limit(8))
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('amount')->money('BDT'),
                TextColumn::make('payment_method')
                    ->formatStateUsing(fn ($state): string => DonationPaymentMethod::labelFor($state)),
                TextColumn::make('transaction_id')->label('TrxID'),
                TextColumn::make('status')->badge(),
                TextColumn::make('created_at')->since(),
            ])
            ->paginated(false);
    }
}
