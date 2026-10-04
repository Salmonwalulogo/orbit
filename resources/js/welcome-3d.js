const visual = document.querySelector('.hero-visual');
const canvas = document.querySelector('.hero-3d-canvas');
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

if (visual instanceof HTMLElement && canvas instanceof HTMLCanvasElement && !reducedMotion.matches) {
    let sceneLoaded = false;
    const observer = new IntersectionObserver(async ([entry]) => {
        if (!entry.isIntersecting || sceneLoaded) return;
        sceneLoaded = true;
        observer.disconnect();

        try {
            const { initializeWelcomeScene } = await import('./welcome-three-scene.js');
            initializeWelcomeScene(visual, canvas);
        } catch (error) {
            console.error('Homepage animated eye could not be loaded; using the CSS fallback.', error);
            visual.classList.remove('webgl-ready');
        }
    }, { rootMargin: '120px', threshold: 0.01 });

    observer.observe(visual);

    if (import.meta.hot) {
        import.meta.hot.dispose(() => observer.disconnect());
    }
}
