<section id="programs" class="scroll-mt-24 bg-gradient-to-b from-white to-mist py-20 sm:py-24">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="eyebrow">Our Programs</p>
                <h2 class="text-4xl leading-none text-navy sm:text-5xl">Key Focus Areas</h2>
            </div>
            <p class="max-w-xl text-muted lg:pb-2">We work across multiple sectors to build stronger, safer and more resilient coastal communities in Bangladesh.</p>
        </div>

        <div class="mt-10 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ([
                ['coastal-protection.jpg', 'Waves meeting a protected shoreline', 'fa-water', 'bg-sea', 'Coastal Protection & Embankments', 'Stronger coastal infrastructure for safer communities.'],
                ['floating-hospital.jpg', 'Families traveling by country boat along a river', 'fa-staff-snake', 'bg-rose-500', 'Floating Hospital & Maternal Care', 'Healthcare for remote islands and vulnerable people.'],
                ['education-edtech.jpg', 'Students learning together in a classroom', 'fa-book-open', 'bg-partner', 'Education & EdTech', 'Quality education and digital learning for a brighter future.'],
                ['solar-lighting.jpg', 'Rows of solar panels under a bright sky', 'fa-sun', 'bg-amber-500', 'Renewable Energy & Solar Lighting', 'Clean energy for safer, greener coastal communities.'],
                ['livelihoods.jpg', 'A fisherman rowing through morning mist in Bangladesh', 'fa-fish', 'bg-teal-600', 'Livelihoods, Agriculture & Fisheries', 'Sustainable livelihoods and food security.'],
                ['waste-recycling.jpg', 'Color-coded recycling bins', 'fa-recycle', 'bg-brand', 'Waste Management & Recycling', 'Cleaner communities and a healthier environment.'],
                ['mangrove-biodiversity.jpg', 'Aerial view of mangrove islands and a winding river', 'fa-leaf', 'bg-emerald-600', 'Biodiversity & Mangrove Conservation', 'Protecting the Sundarbans and coastal ecosystems.'],
                ['emergency-relief.jpg', 'Floodwater covering a street after heavy rain', 'fa-house-flood-water', 'bg-rose-700', 'Emergency Relief & Disaster Response', 'Rapid support during cyclones, floods and other disasters.'],
            ] as [$image, $alt, $icon, $tone, $title, $text])
                <article class="group overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-[0_10px_30px_rgba(31,73,101,0.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(31,73,101,0.14)]">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ asset('images/'.$image) }}" alt="{{ $alt }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                    </div>
                    <div class="relative px-4 pb-5 pt-5">
                        <span class="absolute -top-4 left-4 grid size-8 place-items-center rounded-full text-sm text-white shadow-md {{ $tone }}">
                            <i class="fa-solid {{ $icon }}"></i>
                        </span>
                        <h3 class="pl-11 text-[1.02rem] leading-tight text-navy">{{ $title }}</h3>
                        <p class="mt-1.5 pl-11 text-[13px] leading-relaxed text-muted">{{ $text }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
