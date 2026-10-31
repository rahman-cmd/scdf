<?php

namespace App\Filament\Widgets;

use App\Models\Donation;
use App\Models\Program;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Programs', Program::query()->count())
                ->description('Focus areas on the site')
                ->color('success'),
            Stat::make('Projects', Project::query()->count())
                ->description('Featured initiatives')
                ->color('primary'),
            Stat::make('Donations', Donation::query()->count())
                ->description('৳'.number_format((float) Donation::query()->sum('amount'), 0).' total recorded')
                ->color('warning'),
            Stat::make('New leads', Donation::query()->where('status', 'new')->count())
                ->description('Awaiting review')
                ->color('danger'),
        ];
    }
}
