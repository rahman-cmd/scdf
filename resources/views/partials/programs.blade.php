@php
    use App\Support\Media;
@endphp
<section id="programs" class="scroll-mt-24 bg-gradient-to-b from-white to-mist py-20 sm:py-24">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="eyebrow">{{ $settings->programs_eyebrow }}</p>
                <h2 class="text-4xl leading-none text-navy sm:text-5xl">{{ $settings->programs_title }}</h2>
            </div>
            <p class="max-w-xl text-muted lg:pb-2">{{ $settings->programs_intro }}</p>
        </div>

        <div class="mt-10 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($programs as $program)
                <article class="group overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-[0_10px_30px_rgba(31,73,101,0.08)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(31,73,101,0.14)]">
                    <div class="h-40 overflow-hidden">
                        <img src="{{ Media::url($program->image) }}" alt="{{ $program->image_alt }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                    </div>
                    <div class="relative px-4 pb-5 pt-5">
                        <span class="absolute -top-4 left-4 grid size-8 place-items-center rounded-full text-sm text-white shadow-md {{ $program->tone }}">
                            <i class="fa-solid {{ $program->icon }}"></i>
                        </span>
                        <h3 class="pl-11 text-[1.02rem] leading-tight text-navy">{{ $program->title }}</h3>
                        <p class="mt-1.5 pl-11 text-[13px] leading-relaxed text-muted">{{ $program->summary }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
