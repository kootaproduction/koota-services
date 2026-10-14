const hosts = [...document.querySelectorAll('[data-city-hero]')];
const motionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');
const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)');
const cleanups = [];

function mountCityHero(host) {
    const image = host.querySelector('[data-city-hero-image]');
    const status = host.querySelector('[data-city-hero-status]');
    if (!image) return () => {};

    const fallbackSrc = image.dataset.fallbackSrc;
    let disposed = false;
    let resetTimer;

    const useFallback = () => {
        if (image.dataset.cityHeroFallbackTried === 'true' || !fallbackSrc) {
            image.hidden = true;
            host.classList.add('is-unavailable');
            host.classList.remove('has-color-effect');
            host.style.removeProperty('--city-hero-image-mask');
            if (status) status.hidden = false;
            console.warn('KOOTA hero images could not be loaded.', {
                primary: image.dataset.primarySrc || '/images/city-hero.png',
                fallback: fallbackSrc,
            });
            return;
        }

        image.dataset.cityHeroFallbackTried = 'true';
        host.classList.add('is-fallback');
        host.classList.remove('has-color-effect');
        host.style.removeProperty('--city-hero-image-mask');
        console.info('KOOTA hero image not found; using the temporary team photo fallback.');
        image.src = fallbackSrc;
    };

    const onImageLoad = () => {
        if (image.dataset.cityHeroFallbackTried !== 'true') {
            host.classList.remove('is-fallback', 'is-unavailable');
            host.style.setProperty('--city-hero-image-mask', `url("${image.currentSrc}")`);
            host.classList.add('has-color-effect');
        }
        if (status) status.hidden = true;
    };

    const onImageError = () => useFallback();
    image.addEventListener('load', onImageLoad);
    image.addEventListener('error', onImageError);

    if (image.complete) {
        if (image.naturalWidth > 0) onImageLoad();
        else onImageError();
    }

    const resetTilt = () => {
        window.clearTimeout(resetTimer);
        host.classList.remove('is-tilting');
        host.classList.add('is-returning');
        host.style.removeProperty('--city-hero-rotate-x');
        host.style.removeProperty('--city-hero-rotate-y');
        host.style.removeProperty('--city-hero-shift-x');
        host.style.removeProperty('--city-hero-shift-y');
        resetTimer = window.setTimeout(() => host.classList.remove('is-returning'), 110);
    };

    const onPointerMove = (event) => {
        if (disposed || motionPreference.matches || !finePointer.matches || event.pointerType !== 'mouse') return;

        const bounds = host.getBoundingClientRect();
        if (!bounds.width || !bounds.height) return;
        const x = ((event.clientX - bounds.left) / bounds.width - 0.5) * 2;
        const y = ((event.clientY - bounds.top) / bounds.height - 0.5) * 2;

        window.clearTimeout(resetTimer);
        host.classList.remove('is-returning');
        host.classList.add('is-tilting');
        host.style.setProperty('--city-hero-rotate-x', `${-y * 2.5}deg`);
        host.style.setProperty('--city-hero-rotate-y', `${x * 2.5}deg`);
        host.style.setProperty('--city-hero-shift-x', `${x * 5}px`);
        host.style.setProperty('--city-hero-shift-y', `${y * 5}px`);
    };

    host.addEventListener('pointermove', onPointerMove, { passive: true });
    host.addEventListener('pointerleave', resetTilt, { passive: true });
    host.addEventListener('pointercancel', resetTilt, { passive: true });
    const onMotionChange = () => {
        if (motionPreference.matches) resetTilt();
    };
    motionPreference.addEventListener?.('change', onMotionChange);

    const dispose = () => {
        disposed = true;
        window.clearTimeout(resetTimer);
        image.removeEventListener('load', onImageLoad);
        image.removeEventListener('error', onImageError);
        host.removeEventListener('pointermove', onPointerMove);
        host.removeEventListener('pointerleave', resetTilt);
        host.removeEventListener('pointercancel', resetTilt);
        motionPreference.removeEventListener?.('change', onMotionChange);
        resetTilt();
    };

    return dispose;
}

hosts.forEach((host) => cleanups.push(mountCityHero(host)));

if (import.meta.hot) {
    import.meta.hot.dispose(() => cleanups.forEach((dispose) => dispose()));
}