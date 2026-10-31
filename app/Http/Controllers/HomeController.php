<?php

namespace App\Http\Controllers;

use App\Models\ImpactStat;
use App\Models\Program;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\ValueCard;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'settings' => SiteSetting::current(),
            'valueCards' => ValueCard::query()->active()->ordered()->get(),
            'programs' => Program::query()->active()->ordered()->get(),
            'impactStats' => ImpactStat::query()->active()->ordered()->get(),
            'projects' => Project::query()->active()->ordered()->get(),
        ]);
    }
}
