@php
    use App\Support\Media;
@endphp
<section id="about" class="scroll-mt-24 bg-[radial-gradient(circle_at_72%_12%,#e7f7fb,transparent_36%)] py-20 sm:py-24">
    <div class="mx-auto grid w-full max-w-7xl items-center gap-12 px-5 sm:px-8 lg:grid-cols-[0.92fr_1.08fr] lg:gap-16">
        <div>
            <p class="eyebrow">{{ $settings->about_eyebrow }}</p>
            <h2 class="text-4xl leading-[1.05] text-navy sm:text-5xl">{!! nl2br(e($settings->about_title)) !!}</h2>
            <p class="mt-5 text-base leading-relaxed text-muted sm:text-lg">
                {{ $settings->about_body }}
            </p>
            <a class="btn btn-brand mt-8" href="#programs">Learn More About Us <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <img
            src="{{ Media::url($settings->about_image) }}"
            alt="{{ $settings->about_image_alt }}"
            class="h-[380px] w-full rounded-3xl object-cover shadow-[0_14px_36px_rgba(15,55,80,0.14)] lg:h-[440px]"
        >
    </div>

    <div class="mx-auto mt-14 grid w-full max-w-7xl gap-5 px-5 sm:grid-cols-2 sm:px-8 xl:grid-cols-4">
        @foreach ($valueCards as $card)
            <article class="rounded-2xl px-5 py-7 text-center shadow-[0_6px_18px_rgba(35,69,90,0.06)] {{ $card->bg_tone }}">
                <i class="fa-solid {{ $card->icon }} text-4xl {{ $card->icon_tone }}"></i>
                <h3 class="mt-3 text-[1.35rem] text-navy">{{ $card->title }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-muted">{{ $card->summary }}</p>
            </article>
        @endforeach
    </div>
</section>
