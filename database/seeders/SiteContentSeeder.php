<?php

namespace Database\Seeders;

use App\Models\ImpactStat;
use App\Models\Program;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\ValueCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@scdf-bd.org'],
            [
                'name' => 'SCDF Admin',
                'password' => Hash::make('password'),
            ],
        );

        SiteSetting::query()->updateOrCreate(
            ['id' => 1],
            [
                'logo' => 'images/scdf.png',
                'footer_logo' => 'images/logo_w.png',
                'hero_eyebrow' => 'Sunderban & Coastal Development Foundation',
                'hero_title_line_1' => 'Building Resilient',
                'hero_title_line_2' => 'Coastal Communities',
                'hero_body' => 'A non-political, non-profit, non-sectarian humanitarian and development foundation working across climate resilience, infrastructure, healthcare, education, livelihoods and environmental protection in Bangladesh.',
                'hero_image' => 'images/hero-coastal.jpg',
                'about_eyebrow' => 'About SCDF',
                'about_title' => "Our Mission for\na Resilient Bangladesh",
                'about_body' => 'Sunderban & Coastal Development Foundation (SCDF) is a non-political, non-profit, non-sectarian humanitarian and development foundation working for a safer, healthier and more resilient Bangladesh. We focus on coastal and vulnerable regions, supporting communities through climate resilience, infrastructure, healthcare, education, livelihoods and environmental conservation.',
                'about_image' => 'images/about-community.jpg',
                'about_image_alt' => 'Volunteers distributing relief supplies to a community',
                'programs_eyebrow' => 'Our Programs',
                'programs_title' => 'Key Focus Areas',
                'programs_intro' => 'We work across multiple sectors to build stronger, safer and more resilient coastal communities in Bangladesh.',
                'impact_eyebrow' => 'Our Impact',
                'impact_title' => 'Creating Real Change in Coastal Bangladesh',
                'impact_body' => 'Through community-driven programs and strong partnerships, SCDF is making a positive impact across coastal regions and vulnerable communities.',
                'impact_image' => 'images/impact-coast.jpg',
                'impact_callout_line_1' => 'Stronger Communities',
                'impact_callout_line_2' => 'A Greener, Safer Bangladesh',
                'projects_eyebrow' => 'Featured Initiatives',
                'projects_title' => 'Highlighted Projects for a Better Tomorrow',
                'projects_intro' => 'Explore some of our key initiatives making a real difference in coastal communities.',
                'donate_eyebrow' => 'Make a Difference',
                'donate_title' => 'Support SCDF',
                'donate_body' => 'Your donation helps coastal families with healthcare, education, infrastructure, livelihoods and environmental conservation. Together we can build stronger, safer and more resilient communities in Bangladesh.',
                'donate_image' => 'images/donation-family.jpg',
                'payment_bkash' => '01700000000',
                'payment_nagad' => '01700000000',
                'payment_rocket' => '01700000000',
                'payment_upay' => '01700000000',
                'payment_note' => 'Use Send Money (Personal). After payment, submit your TrxID below so we can confirm.',
                'cta_title' => 'Join Hands for a Stronger, Greener Tomorrow',
                'cta_body' => 'Volunteer, partner or sponsor with SCDF and be part of our mission to build resilient coastal communities in Bangladesh.',
                'cta_image' => 'images/cta-team.jpg',
                'contact_website' => 'https://scdf-bd.org',
                'contact_email' => 'info@scdf-bd.org',
                'contact_location' => 'Dhaka, Bangladesh',
                'contact_location_note' => 'Working across coastal regions',
                'social_facebook' => '#',
                'social_youtube' => '#',
                'social_linkedin' => '#',
                'footer_tagline' => 'People • Nature • Resilient Communities',
                'footer_mission' => 'A non-profit foundation dedicated to coastal development, humanitarian service and sustainability.',
            ],
        );

        ValueCard::query()->delete();
        foreach ([
            ['Non-political', 'We remain independent, non-political and focused only on people\'s welfare.', 'fa-handshake', 'text-partner', 'bg-[#edf7fe]', 1],
            ['Inclusive', 'We work for all, regardless of religion, gender, ethnicity or background.', 'fa-users', 'text-brand', 'bg-[#eff9ef]', 2],
            ['Sustainable', 'We promote long-term, climate-resilient and environmentally sustainable solutions.', 'fa-seedling', 'text-amber-500', 'bg-[#fff7ea]', 3],
            ['Transparent', 'We ensure accountable, efficient and transparent use of resources.', 'fa-shield-halved', 'text-navy-mid', 'bg-[#edf7fe]', 4],
        ] as [$title, $summary, $icon, $iconTone, $bgTone, $order]) {
            ValueCard::query()->create([
                'title' => $title,
                'summary' => $summary,
                'icon' => $icon,
                'icon_tone' => $iconTone,
                'bg_tone' => $bgTone,
                'sort_order' => $order,
                'is_active' => true,
            ]);
        }

        Program::query()->delete();
        foreach ([
            ['images/coastal-protection.jpg', 'Waves meeting a protected shoreline', 'fa-water', 'bg-sea', 'Coastal Protection & Embankments', 'Stronger coastal infrastructure for safer communities.', 1],
            ['images/floating-hospital.jpg', 'Families traveling by country boat along a river', 'fa-staff-snake', 'bg-rose-500', 'Floating Hospital & Maternal Care', 'Healthcare for remote islands and vulnerable people.', 2],
            ['images/education-edtech.jpg', 'Students learning together in a classroom', 'fa-book-open', 'bg-partner', 'Education & EdTech', 'Quality education and digital learning for a brighter future.', 3],
            ['images/solar-lighting.jpg', 'Rows of solar panels under a bright sky', 'fa-sun', 'bg-amber-500', 'Renewable Energy & Solar Lighting', 'Clean energy for safer, greener coastal communities.', 4],
            ['images/livelihoods.jpg', 'A fisherman rowing through morning mist in Bangladesh', 'fa-fish', 'bg-teal-600', 'Livelihoods, Agriculture & Fisheries', 'Sustainable livelihoods and food security.', 5],
            ['images/waste-recycling.jpg', 'Color-coded recycling bins', 'fa-recycle', 'bg-brand', 'Waste Management & Recycling', 'Cleaner communities and a healthier environment.', 6],
            ['images/mangrove-biodiversity.jpg', 'Aerial view of mangrove islands and a winding river', 'fa-leaf', 'bg-emerald-600', 'Biodiversity & Mangrove Conservation', 'Protecting the Sundarbans and coastal ecosystems.', 7],
            ['images/emergency-relief.jpg', 'Floodwater covering a street after heavy rain', 'fa-house-flood-water', 'bg-rose-700', 'Emergency Relief & Disaster Response', 'Rapid support during cyclones, floods and other disasters.', 8],
        ] as [$image, $alt, $icon, $tone, $title, $summary, $order]) {
            Program::query()->create([
                'title' => $title,
                'summary' => $summary,
                'image' => $image,
                'image_alt' => $alt,
                'icon' => $icon,
                'tone' => $tone,
                'sort_order' => $order,
                'is_active' => true,
            ]);
        }

        ImpactStat::query()->delete();
        foreach ([
            ['fa-user-group', '64', 'Districts Reach', 'Working in coastal and vulnerable regions across Bangladesh.', 1],
            ['fa-gears', '25+', 'Program Areas', 'From healthcare to climate action, we work across multiple sectors.', 2],
            ['fa-user', '10,000+', 'Beneficiaries', 'Supporting coastal families and vulnerable communities every year.', 3],
            ['fa-handshake', '100+', 'Volunteers & Partners', 'Together for a stronger, more resilient Bangladesh.', 4],
        ] as [$icon, $figure, $label, $summary, $order]) {
            ImpactStat::query()->create([
                'icon' => $icon,
                'figure' => $figure,
                'label' => $label,
                'summary' => $summary,
                'sort_order' => $order,
                'is_active' => true,
            ]);
        }

        Project::query()->delete();
        foreach ([
            ['images/project-mangrove.jpg', 'Mangrove waterways and small islands', 'fa-leaf', 'bg-brand', 'Mangrove Restoration & Green Belt', 'Restoring mangroves to protect coastal communities, enhance biodiversity and build a greener, safer tomorrow.', 1],
            ['images/project-hospital.jpg', 'A doctor checking a child with a stethoscope', 'fa-staff-snake', 'bg-rose-600', 'Floating Hospital for Remote Islands', 'Bringing essential healthcare and maternal care to remote coastal communities and river islands.', 2],
            ['images/project-solar.jpg', 'A field of solar panels under a blue sky', 'fa-solar-panel', 'bg-emerald-600', 'Solar Light for Coastal Communities', 'Installing solar street lights to create safer, cleaner and more resilient coastal villages.', 3],
        ] as [$image, $alt, $icon, $tone, $title, $summary, $order]) {
            Project::query()->create([
                'title' => $title,
                'summary' => $summary,
                'image' => $image,
                'image_alt' => $alt,
                'icon' => $icon,
                'tone' => $tone,
                'link_label' => 'Learn More',
                'link_url' => '#contact',
                'sort_order' => $order,
                'is_active' => true,
            ]);
        }
    }
}
