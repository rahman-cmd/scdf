@php
    $selectedAmount = (string) old('amount', '10');
    $presets = ['10', '25', '50', '100'];
@endphp

<section id="donate" class="scroll-mt-24 relative overflow-hidden bg-gradient-to-r from-[#eefbe9] to-[#f5fff1] py-16 sm:py-20">
    <div class="pointer-events-none absolute inset-y-0 left-0 hidden w-[31%] lg:block">
        <img src="{{ asset('images/donation-family.jpg') }}" alt="" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-transparent to-[#eefbe9]"></div>
    </div>

    <div class="relative mx-auto grid w-full max-w-7xl items-center gap-10 px-5 sm:px-8 lg:grid-cols-[1fr_420px] lg:pl-[30%]">
        <div>
            <img
                src="{{ asset('images/donation-family.jpg') }}"
                alt="A farmer tending young rice in a green field"
                class="mb-6 h-56 w-full rounded-2xl object-cover lg:hidden"
                loading="lazy"
            >
            <p class="eyebrow">Make a Difference</p>
            <h2 class="text-4xl text-navy sm:text-5xl">Support SCDF</h2>
            <p class="mt-4 max-w-xl text-base leading-relaxed text-muted">Your donation helps coastal families with healthcare, education, infrastructure, livelihoods and environmental conservation. Together we can build stronger, safer and more resilient communities in Bangladesh.</p>
            <div class="mt-6 flex flex-wrap gap-x-6 gap-y-3 text-sm font-extrabold text-[#1b6842]">
                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-heart"></i> Healthier Families</span>
                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-graduation-cap"></i> Better Education</span>
                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-leaf"></i> Greener Environment</span>
                <span class="inline-flex items-center gap-2"><i class="fa-solid fa-people-group"></i> Stronger Communities</span>
            </div>
        </div>

        <form action="{{ route('donate.store') }}" method="POST" class="rounded-xl bg-white p-5 shadow-[0_14px_36px_rgba(15,55,80,0.12)] sm:p-6">
            @csrf
            <h3 class="text-xl text-[#173e66]">Choose an Amount (USD)</h3>

            @if (session('status'))
                <div role="status" class="mt-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">{{ session('status') }}</div>
            @endif

            <div class="mt-4 grid grid-cols-4 gap-2">
                @foreach ($presets as $preset)
                    <button
                        type="button"
                        data-amount="{{ $preset }}"
                        aria-pressed="{{ $selectedAmount === $preset ? 'true' : 'false' }}"
                        class="amount-btn rounded-lg border px-2 py-2.5 text-sm font-extrabold text-[#193d63] transition {{ $selectedAmount === $preset ? 'is-selected' : 'border-[#ccdbe2] bg-white hover:border-brand' }}"
                    >${{ $preset }}</button>
                @endforeach
            </div>

            <label for="amount" class="mt-4 block text-xs font-extrabold text-navy">Custom Amount</label>
            <div class="mt-1.5 flex overflow-hidden rounded-lg border border-[#ccdbe2] focus-within:border-brand">
                <span class="grid place-items-center bg-[#f6f8fa] px-3 font-extrabold text-navy">$</span>
                <input id="amount" name="amount" type="number" min="1" step="1" value="{{ old('amount', 10) }}" placeholder="Enter amount" class="w-full px-3 py-2.5 outline-none">
            </div>
            @error('amount')
                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror

            <div class="mt-3 grid gap-3 sm:grid-cols-2">
                <div>
                    <label for="donor-name" class="block text-xs font-extrabold text-navy">Full Name</label>
                    <input id="donor-name" name="name" type="text" value="{{ old('name') }}" placeholder="Your name" required class="mt-1.5 w-full rounded-lg border border-[#ccdbe2] px-3 py-2.5 outline-none focus:border-brand">
                    @error('name')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="donor-email" class="block text-xs font-extrabold text-navy">Email Address</label>
                    <input id="donor-email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" required class="mt-1.5 w-full rounded-lg border border-[#ccdbe2] px-3 py-2.5 outline-none focus:border-brand">
                    @error('email')
                        <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button class="btn btn-brand mt-4 w-full rounded-lg" type="submit"><i class="fa-solid fa-lock"></i> Donate Securely</button>
            <p class="mt-3 flex items-start gap-2 text-xs leading-relaxed text-[#627483]">
                <i class="fa-solid fa-shield-halved mt-0.5 text-brand"></i>
                Your donation is secure and helps create a lasting impact for coastal communities.
            </p>
        </form>
    </div>
</section>
