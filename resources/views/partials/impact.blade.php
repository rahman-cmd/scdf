@php
    use App\Support\Media;
@endphp
<section id="impact" class="scroll-mt-24 relative overflow-hidden bg-[#f8fcfd] py-16 sm:py-20">
    <div class="pointer-events-none absolute inset-y-0 right-0 hidden w-[56%] lg:block">
        <img src="{{ Media::url($settings->impact_image) }}" alt="" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-[#f8fcfd] from-[0%] via-[#f8fcfd]/80 via-[38%] to-[#f8fcfd]/15"></div>
    </div>

    <div class="relative mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="lg:grid lg:grid-cols-[1.1fr_0.9fr] lg:items-start lg:gap-8">
            <div>
                <p class="eyebrow">{{ $settings->impact_eyebrow }}</p>
                <h2 class="max-w-xl text-4xl leading-[1.05] text-navy sm:text-5xl">{{ $settings->impact_title }}</h2>
                <p class="mt-4 max-w-xl text-base leading-relaxed text-muted">{{ $settings->impact_body }}</p>
            </div>
            <aside class="mt-8 max-w-xs text-right lg:mt-14 lg:ml-auto">
                <p class="font-serif text-[1.65rem] italic leading-tight text-navy drop-shadow-[0_1px_0_rgba(255,255,255,0.9)]">{{ $settings->impact_callout_line_1 }}</p>
                <p class="mt-1 font-serif text-lg italic text-brand drop-shadow-[0_1px_0_rgba(255,255,255,0.9)]">{{ $settings->impact_callout_line_2 }}</p>
            </aside>
        </div>

        <div class="mt-10 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($impactStats as $stat)
                <article class="rounded-2xl bg-white p-5 shadow-[0_10px_28px_rgba(15,55,80,0.1)]">
                    <div class="flex items-center gap-3 text-navy">
                        <i class="fa-solid {{ $stat->icon }} text-2xl text-brand"></i>
                        <strong class="font-serif text-[1.9rem] leading-none">{{ $stat->figure }}</strong>
                    </div>
                    <h3 class="mt-3 font-sans text-base font-extrabold text-[#163e68]">{{ $stat->label }}</h3>
                    <p class="mt-1 text-[13px] leading-relaxed text-muted">{{ $stat->summary }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
