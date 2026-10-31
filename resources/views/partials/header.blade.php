<header class="sticky top-0 z-50 border-b border-white/70 bg-white/90 shadow-[0_1px_12px_rgba(6,43,80,0.06)] backdrop-blur-md">
    <div class="mx-auto flex h-20 w-full max-w-7xl items-center gap-4 px-5 sm:px-8">
        <a href="#home" class="flex min-w-0 items-center gap-2.5">
            <img src="{{ $settings->logoUrl() }}" alt="SCDF" class="h-11 w-auto shrink-0 sm:h-14">
            <span class="text-[11px] font-extrabold leading-tight text-navy sm:text-[13px]">Sunderban &amp; Coastal<br>Development Foundation</span>
        </a>

        <button
            type="button"
            data-menu-toggle
            class="ml-auto inline-flex size-11 items-center justify-center rounded-full text-navy lg:hidden"
            aria-expanded="false"
            aria-controls="site-nav"
            aria-label="Open menu"
        >
            <i class="fa-solid fa-bars text-xl" data-menu-icon></i>
        </button>

        <nav
            id="site-nav"
            data-menu
            class="absolute inset-x-4 top-[4.7rem] hidden flex-col gap-1 rounded-2xl border border-slate-100 bg-white p-3 shadow-2xl lg:static lg:ml-auto lg:flex lg:flex-row lg:items-center lg:gap-7 lg:border-0 lg:bg-transparent lg:p-0 lg:shadow-none"
        >
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-brand lg:px-0 lg:py-0" href="#home">Home</a>
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-ink hover:text-brand lg:px-0 lg:py-0" href="#about">About</a>
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-ink hover:text-brand lg:px-0 lg:py-0" href="#programs">Programs</a>
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-ink hover:text-brand lg:px-0 lg:py-0" href="#impact">Impact</a>
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-ink hover:text-brand lg:px-0 lg:py-0" href="#donate">Donate</a>
            <a data-nav-link class="rounded-xl px-3 py-2.5 text-sm font-extrabold text-ink hover:text-brand lg:px-0 lg:py-0" href="#contact">Contact</a>
            <a class="btn btn-brand mt-2 justify-center lg:hidden" href="#donate"><i class="fa-solid fa-heart"></i> Donate Now</a>
        </nav>

        <a class="btn btn-brand hidden px-4 py-3 text-[13px] lg:inline-flex" href="#donate"><i class="fa-solid fa-heart"></i> Donate Now</a>
    </div>
</header>
