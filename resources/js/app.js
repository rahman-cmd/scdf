const toggle = document.querySelector('[data-menu-toggle]');
const nav = document.querySelector('[data-menu]');
const icon = document.querySelector('[data-menu-icon]');

const setMenu = (open) => {
    if (!nav || !toggle) {
        return;
    }

    nav.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    icon?.classList.toggle('fa-bars', !open);
    icon?.classList.toggle('fa-xmark', open);
};

toggle?.addEventListener('click', () => {
    setMenu(!nav.classList.contains('is-open'));
});

nav?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenu(false));
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        setMenu(false);
    }
});

const amountInput = document.querySelector('#amount');
const amountButtons = [...document.querySelectorAll('[data-amount]')];

const paintAmount = (value) => {
    amountButtons.forEach((button) => {
        const selected = button.dataset.amount === String(value);
        button.classList.toggle('is-selected', selected);
        button.setAttribute('aria-pressed', selected ? 'true' : 'false');
    });
};

amountButtons.forEach((button) => {
    button.addEventListener('click', () => {
        if (!amountInput) {
            return;
        }

        amountInput.value = button.dataset.amount;
        paintAmount(button.dataset.amount);
    });
});

amountInput?.addEventListener('input', () => paintAmount(amountInput.value));

const navLinks = [...document.querySelectorAll('[data-nav-link]')];
const sections = navLinks
    .map((link) => document.querySelector(link.getAttribute('href')))
    .filter(Boolean);

const markActiveLink = () => {
    const marker = window.scrollY + 140;
    let current = sections[0];

    sections.forEach((section) => {
        if (section.offsetTop <= marker) {
            current = section;
        }
    });

    navLinks.forEach((link) => {
        const active = current && link.getAttribute('href') === `#${current.id}`;
        link.classList.toggle('text-brand', active);
        link.classList.toggle('text-ink', !active);
    });
};

if (sections.length) {
    markActiveLink();
    window.addEventListener('scroll', markActiveLink, { passive: true });
}

const backToTop = document.querySelector('[data-back-to-top]');

const toggleBackToTop = () => {
    if (!backToTop) {
        return;
    }

    const show = window.scrollY > 480;
    backToTop.hidden = !show;
    backToTop.classList.toggle('pointer-events-none', !show);
    backToTop.classList.toggle('translate-y-2', !show);
    backToTop.classList.toggle('opacity-0', !show);
};

backToTop?.addEventListener('click', () => {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
});

toggleBackToTop();
window.addEventListener('scroll', toggleBackToTop, { passive: true });
