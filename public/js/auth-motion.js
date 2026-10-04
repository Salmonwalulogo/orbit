document.querySelectorAll('.auth-stack-scene').forEach((scene) => {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const finePointer = window.matchMedia('(pointer: fine)');

    if (reducedMotion.matches || !finePointer.matches) {
        return;
    }

    let frame = 0;
    let pointerX = 0;
    let pointerY = 0;

    const render = () => {
        scene.style.setProperty('--auth-pointer-x', `${(pointerX * 8).toFixed(2)}px`);
        scene.style.setProperty('--auth-pointer-y', `${(pointerY * 7).toFixed(2)}px`);
        scene.style.transform = `rotateX(${(-pointerY * 3).toFixed(2)}deg) rotateY(${(pointerX * 4).toFixed(2)}deg)`;
        frame = 0;
    };

    scene.addEventListener('pointermove', (event) => {
        const bounds = scene.getBoundingClientRect();
        pointerX = ((event.clientX - bounds.left) / bounds.width) * 2 - 1;
        pointerY = ((event.clientY - bounds.top) / bounds.height) * 2 - 1;
        if (!frame) frame = window.requestAnimationFrame(render);
    }, { passive: true });

    scene.addEventListener('pointerleave', () => {
        pointerX = 0;
        pointerY = 0;
        if (!frame) frame = window.requestAnimationFrame(render);
    });
});
