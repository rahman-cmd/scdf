@php
    use App\Support\Media;
@endphp
<section id="home" class="relative isolate overflow-hidden bg-[#f9f3df]">
    <img
        src="{{ Media::url($settings->hero_image) }}"
        alt=""
        class="absolute inset-0 h-full w-full object-cover object-center lg:inset-y-0 lg:left-[40%] lg:w-[60%]"
        fetchpriority="high"
    >
    <div class="absolute inset-0 bg-gradient-to-b from-[#fffaf0] via-[#fffaf0]/72 to-[#fffaf0]/20 lg:bg-gradient-to-r lg:from-[#fffaf0] lg:from-[0%] lg:via-[#fffaf0]/92 lg:via-[36%] lg:to-transparent lg:to-[62%]"></div>

    <div class="relative mx-auto flex min-h-[560px] w-full max-w-7xl flex-col justify-center px-5 pb-8 pt-16 sm:px-8 lg:min-h-[640px] lg:pb-24 lg:pt-8">
        <div class="max-w-[46rem]">
            <p class="eyebrow">{{ $settings->hero_eyebrow }}</p>
            <h1 class="text-[2.55rem] leading-[1.05] text-navy sm:text-[3.15rem] lg:text-[3.55rem] lg:leading-[1.02]">
                <span class="block sm:whitespace-nowrap">{{ $settings->hero_title_line_1 }}</span>
                <span class="block sm:whitespace-nowrap text-[#0d6f48]">{{ $settings->hero_title_line_2 }}</span>
            </h1>
            <p class="mt-5 max-w-xl text-[15px] leading-relaxed text-[#3d4d59] sm:text-base">
                {{ $settings->hero_body }}
            </p>
            <div class="mt-7 flex flex-wrap gap-3">
                <a class="btn btn-brand" href="#donate"><i class="fa-solid fa-heart"></i> Donate Now</a>
                <a class="btn btn-light" href="#volunteer"><i class="fa-solid fa-user-group"></i> Become a Volunteer</a>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/70 bg-[#f1fbfd]/90 backdrop-blur-md lg:absolute lg:inset-x-0 lg:bottom-0">
        <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-center gap-x-8 gap-y-3 px-5 py-4 text-sm font-extrabold text-[#0d4b77] sm:px-8">
            <span class="inline-flex items-center gap-2"><i class="fa-solid fa-leaf text-brand"></i> Non-profit</span>
            <span class="hidden h-6 w-px bg-[#a7c0c8] sm:block"></span>
            <span class="inline-flex items-center gap-2"><i class="fa-solid fa-people-group text-sea"></i> Humanitarian</span>
            <span class="hidden h-6 w-px bg-[#a7c0c8] sm:block"></span>
            <span class="inline-flex items-center gap-2"><i class="fa-solid fa-globe text-partner"></i> Climate Action</span>
            <span class="hidden h-6 w-px bg-[#a7c0c8] md:block"></span>
            <span class="inline-flex items-center gap-2"><i class="fa-solid fa-handshake text-brand"></i> Community Development</span>
        </div>
    </div>
</section>
