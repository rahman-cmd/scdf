<section id="projects" class="scroll-mt-24 bg-white py-20 sm:py-24">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="eyebrow">Featured Initiatives</p>
                <h2 class="max-w-xl text-4xl leading-[1.08] text-navy sm:text-5xl">Highlighted Projects for a Better Tomorrow</h2>
            </div>
            <a class="inline-flex items-center gap-2 font-extrabold text-partner" href="#programs">View All Initiatives <i class="fa-solid fa-arrow-right text-sm"></i></a>
        </div>
        <p class="mt-4 text-muted">Explore some of our key initiatives making a real difference in coastal communities.</p>

        <div class="mt-8 grid gap-6 lg:grid-cols-3">
            @foreach ([
                ['project-mangrove.jpg', 'Mangrove waterways and small islands', 'fa-leaf', 'bg-brand', 'Mangrove Restoration & Green Belt', 'Restoring mangroves to protect coastal communities, enhance biodiversity and build a greener, safer tomorrow.'],
                ['project-hospital.jpg', 'A doctor checking a child with a stethoscope', 'fa-staff-snake', 'bg-rose-600', 'Floating Hospital for Remote Islands', 'Bringing essential healthcare and maternal care to remote coastal communities and river islands.'],
                ['project-solar.jpg', 'A field of solar panels under a blue sky', 'fa-solar-panel', 'bg-emerald-600', 'Solar Light for Coastal Communities', 'Installing solar street lights to create safer, cleaner and more resilient coastal villages.'],
            ] as [$image, $alt, $icon, $tone, $title, $text])
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_14px_36px_rgba(15,55,80,0.1)]">
                    <div class="h-52 overflow-hidden">
                        <img src="{{ asset('images/'.$image) }}" alt="{{ $alt }}" class="h-full w-full object-cover" loading="lazy">
                    </div>
                    <div class="relative px-5 pb-6 pt-6">
                        <span class="absolute -top-5 left-5 grid size-10 place-items-center rounded-full text-white shadow-md {{ $tone }}">
                            <i class="fa-solid {{ $icon }}"></i>
                        </span>
                        <h3 class="pl-12 text-[1.15rem] leading-snug text-navy">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-muted">{{ $text }}</p>
                        <a class="mt-4 inline-flex items-center gap-2 text-sm font-extrabold text-partner" href="#contact">Learn More <i class="fa-solid fa-arrow-right text-xs"></i></a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
