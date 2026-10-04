import * as THREE from 'three';

export function initializeWelcomeScene(visual, canvas) {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let renderer;
    let animationFrame = 0;
    let isVisible = true;
    let hasWebGL = false;

    try {
        renderer = new THREE.WebGLRenderer({
            canvas,
            alpha: true,
            antialias: true,
            powerPreference: 'low-power',
        });
        renderer.setClearColor(0x000000, 0);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.6));
        renderer.outputColorSpace = THREE.SRGBColorSpace;
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 1.1;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(34, 1, 0.1, 80);
        camera.position.set(0, 0, 10);

        scene.add(new THREE.HemisphereLight(0xe9eaff, 0x141025, 2.2));

        const keyLight = new THREE.DirectionalLight(0xffffff, 3.4);
        keyLight.position.set(-3, 4, 7);
        scene.add(keyLight);

        const cyanLight = new THREE.PointLight(0x43e7ff, 26, 14, 2);
        cyanLight.position.set(3, 1.4, 3);
        scene.add(cyanLight);

        const violetLight = new THREE.PointLight(0xb15cff, 24, 14, 2);
        violetLight.position.set(-2, -1.8, 2);
        scene.add(violetLight);

        const stage = new THREE.Group();
        scene.add(stage);

        const eyeGroup = new THREE.Group();
        stage.add(eyeGroup);

        const makeEyeShape = (width, height) => {
            const shape = new THREE.Shape();
            shape.moveTo(-width, 0);
            shape.bezierCurveTo(-width * 0.48, height * 0.92, width * 0.3, height * 0.88, width, 0);
            shape.bezierCurveTo(width * 0.52, -height * 0.48, -width * 0.48, -height * 0.52, -width, 0);
            return shape;
        };

        const eyeAura = new THREE.Mesh(
            new THREE.ShapeGeometry(makeEyeShape(3.05, 1.53), 40),
            new THREE.MeshBasicMaterial({
                color: 0x9b1427,
                transparent: true,
                opacity: 0.09,
                side: THREE.DoubleSide,
            }),
        );
        eyeAura.name = 'welcome-eye-aura';
        eyeAura.position.z = -0.12;
        eyeAura.scale.set(1.04, 1.05, 1);
        eyeGroup.add(eyeAura);

        const sclera = new THREE.Mesh(
            new THREE.ShapeGeometry(makeEyeShape(2.72, 1.31), 48),
            new THREE.MeshPhysicalMaterial({
                color: 0xf8f7fa,
                roughness: 0.32,
                metalness: 0,
                clearcoat: 1,
                clearcoatRoughness: 0.12,
                side: THREE.DoubleSide,
            }),
        );
        sclera.name = 'welcome-eye-sclera';
        eyeGroup.add(sclera);

        const upperLidCurve = new THREE.CatmullRomCurve3([
            new THREE.Vector3(-2.76, 0, 0.08),
            new THREE.Vector3(-1.95, 0.78, 0.08),
            new THREE.Vector3(-0.85, 0.99, 0.08),
            new THREE.Vector3(0.55, 0.91, 0.08),
            new THREE.Vector3(1.72, 0.64, 0.08),
            new THREE.Vector3(2.76, 0, 0.08),
        ]);
        const lowerLidCurve = new THREE.CatmullRomCurve3([
            new THREE.Vector3(-2.76, 0, 0.08),
            new THREE.Vector3(-1.75, -0.54, 0.08),
            new THREE.Vector3(-0.45, -0.69, 0.08),
            new THREE.Vector3(0.9, -0.65, 0.08),
            new THREE.Vector3(2.05, -0.46, 0.08),
            new THREE.Vector3(2.76, 0, 0.08),
        ]);
        const lidMaterial = new THREE.MeshStandardMaterial({
            color: 0x09090d,
            emissive: 0x10070a,
            emissiveIntensity: 0.12,
            metalness: 0.05,
            roughness: 0.48,
        });
        const upperLid = new THREE.Mesh(new THREE.TubeGeometry(upperLidCurve, 48, 0.14, 10, false), lidMaterial);
        upperLid.name = 'welcome-eye-upper-lid';
        const eyebrowShape = new THREE.Shape();
        eyebrowShape.moveTo(-2.78, 1.14);
        eyebrowShape.lineTo(-2.05, 1.42);
        eyebrowShape.quadraticCurveTo(-0.7, 1.78, 0.62, 1.62);
        eyebrowShape.lineTo(2.7, 1.24);
        eyebrowShape.lineTo(2.25, 1.49);
        eyebrowShape.quadraticCurveTo(0.55, 1.78, -0.72, 1.56);
        eyebrowShape.closePath();
        const eyebrow = new THREE.Mesh(
            new THREE.ShapeGeometry(eyebrowShape),
            new THREE.MeshBasicMaterial({ color: 0x08080b, side: THREE.DoubleSide }),
        );
        eyebrow.name = 'welcome-eye-brow';
        eyebrow.position.z = 0.09;
        const lowerLid = new THREE.Mesh(
            new THREE.TubeGeometry(
                lowerLidCurve,
                48,
                0.055,
                10,
                false,
            ),
            new THREE.MeshStandardMaterial({
                color: 0x16151b,
                emissive: 0x12090d,
                emissiveIntensity: 0.12,
                metalness: 0.04,
                roughness: 0.48,
            }),
        );
        lowerLid.name = 'welcome-eye-lower-lid';
        eyeGroup.add(upperLid, lowerLid, eyebrow);

        const iris = new THREE.Group();
        iris.name = 'welcome-iris';
        iris.position.set(0.08, 0, 0.16);
        eyeGroup.add(iris);

        const irisBase = new THREE.Mesh(
            new THREE.CircleGeometry(0.98, 72),
            new THREE.MeshPhysicalMaterial({
                color: 0xb80d25,
                emissive: 0x5c0716,
                emissiveIntensity: 0.6,
                metalness: 0.08,
                roughness: 0.28,
                clearcoat: 1,
            }),
        );
        irisBase.name = 'welcome-iris-base';
        iris.add(irisBase);

        const addIrisRing = (radius, tube, color, opacity = 1) => {
            const ring = new THREE.Mesh(
                new THREE.TorusGeometry(radius, tube, 10, 96),
                new THREE.MeshBasicMaterial({
                    color,
                    transparent: opacity < 1,
                    opacity,
                }),
            );
            ring.position.z = 0.025;
            iris.add(ring);
            return ring;
        };

        const outerIrisRing = addIrisRing(0.91, 0.035, 0x26060c, 0.95);
        outerIrisRing.name = 'welcome-outer-iris-ring';
        addIrisRing(0.69, 0.022, 0xff273f, 0.9).name = 'welcome-inner-iris-ring';
        addIrisRing(0.38, 0.024, 0x3b0710, 0.95).name = 'welcome-pupil-accent-ring';

        const facetMaterial = new THREE.MeshStandardMaterial({
            color: 0xff213c,
            emissive: 0xa80820,
            emissiveIntensity: 0.75,
            metalness: 0.04,
            roughness: 0.34,
            side: THREE.DoubleSide,
        });
        const facetAccent = new THREE.MeshStandardMaterial({
            color: 0x17070b,
            emissive: 0x28030a,
            emissiveIntensity: 0.4,
            metalness: 0.02,
            roughness: 0.4,
            side: THREE.DoubleSide,
        });

        for (let index = 0; index < 28; index += 1) {
            const angle = (index / 28) * Math.PI * 2;
            const innerRadius = index % 4 === 0 ? 0.4 : 0.52;
            const outerRadius = index % 3 === 0 ? 0.83 : 0.72 + (index % 2) * 0.08;
            const halfWidth = index % 2 === 0 ? 0.035 : 0.022;
            const facet = new THREE.Shape();
            facet.moveTo(Math.cos(angle) * innerRadius, Math.sin(angle) * innerRadius);
            facet.lineTo(Math.cos(angle - halfWidth) * outerRadius, Math.sin(angle - halfWidth) * outerRadius);
            facet.lineTo(Math.cos(angle + halfWidth) * outerRadius, Math.sin(angle + halfWidth) * outerRadius);
            facet.closePath();

            const shard = new THREE.Mesh(
                new THREE.ShapeGeometry(facet),
                index % 4 === 0 ? facetAccent : facetMaterial,
            );
            shard.name = index % 4 === 0 ? 'welcome-iris-accent-facet' : 'welcome-iris-facet';
            shard.position.z = 0.035;
            iris.add(shard);
        }

        const webPositions = [];
        const spokeCount = 24;
        for (let index = 0; index < spokeCount; index += 1) {
            const angle = (index / spokeCount) * Math.PI * 2;
            webPositions.push(
                Math.cos(angle) * 0.34, Math.sin(angle) * 0.34, 0.045,
                Math.cos(angle + 0.035) * 0.88, Math.sin(angle + 0.035) * 0.88, 0.045,
            );
        }
        for (const radius of [0.48, 0.63, 0.78, 0.9]) {
            for (let index = 0; index < spokeCount; index += 1) {
                const start = (index / spokeCount) * Math.PI * 2 + 0.035;
                const end = ((index + 1) / spokeCount) * Math.PI * 2;
                webPositions.push(
                    Math.cos(start) * radius, Math.sin(start) * radius, 0.046,
                    Math.cos(end) * radius, Math.sin(end) * radius, 0.046,
                );
            }
        }
        const webGeometry = new THREE.BufferGeometry();
        webGeometry.setAttribute('position', new THREE.Float32BufferAttribute(webPositions, 3));
        const irisWeb = new THREE.LineSegments(
            webGeometry,
            new THREE.LineBasicMaterial({ color: 0x18050a, transparent: true, opacity: 0.9 }),
        );
        irisWeb.name = 'welcome-iris-web';
        iris.add(irisWeb);

        const pupil = new THREE.Mesh(
            new THREE.CircleGeometry(0.31, 48),
            new THREE.MeshPhysicalMaterial({
                color: 0x090916,
                emissive: 0x130a26,
                emissiveIntensity: 0.65,
                roughness: 0.16,
                metalness: 0.2,
            }),
        );
        pupil.name = 'welcome-eye-pupil';
        pupil.position.z = 0.055;
        iris.add(pupil);

        const pupilRing = addIrisRing(0.34, 0.022, 0xeffaff, 0.72);
        pupilRing.name = 'welcome-pupil-ring';
        pupilRing.position.z = 0.065;

        const glintMaterial = new THREE.MeshBasicMaterial({
            color: 0xffffff,
            transparent: true,
            opacity: 0.9,
        });
        const glint = new THREE.Mesh(new THREE.CircleGeometry(0.105, 24), glintMaterial);
        glint.name = 'welcome-eye-glint';
        glint.position.set(-0.37, 0.42, 0.09);
        iris.add(glint);

        const glintSmall = new THREE.Mesh(new THREE.CircleGeometry(0.045, 20), glintMaterial);
        glintSmall.name = 'welcome-eye-small-glint';
        glintSmall.position.set(0.34, -0.4, 0.09);
        iris.add(glintSmall);

        const secondEyeGroup = eyeGroup.clone(true);
        const secondIris = secondEyeGroup.getObjectByName('welcome-iris');
        const secondOuterIrisRing = secondEyeGroup.getObjectByName('welcome-outer-iris-ring');
        eyeGroup.position.x = -1.52;
        secondEyeGroup.position.x = 1.52;
        eyeGroup.scale.set(0.52, 0.68, 1);
        secondEyeGroup.scale.set(0.52, 0.68, 1);
        stage.add(secondEyeGroup);

        const orbit = new THREE.Group();
        orbit.position.z = -0.25;
        stage.add(orbit);

        const orbitMaterial = new THREE.MeshBasicMaterial({
            color: 0x8f67ff,
            transparent: true,
            opacity: 0.38,
        });
        for (const [radius, tube, rotationX] of [[3.2, 0.009, 1.17], [3.55, 0.006, 1.28]]) {
            const ring = new THREE.Mesh(new THREE.TorusGeometry(radius, tube, 6, 160), orbitMaterial);
            ring.rotation.x = rotationX;
            ring.rotation.y = 0.12;
            orbit.add(ring);
        }

        const particleCount = 72;
        const particlePositions = new Float32Array(particleCount * 3);
        for (let index = 0; index < particleCount; index += 1) {
            particlePositions[index * 3] = (Math.random() - 0.5) * 7.6;
            particlePositions[index * 3 + 1] = (Math.random() - 0.5) * 4.8;
            particlePositions[index * 3 + 2] = (Math.random() - 0.5) * 2 - 1.1;
        }
        const particleGeometry = new THREE.BufferGeometry();
        particleGeometry.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
        const particles = new THREE.Points(
            particleGeometry,
            new THREE.PointsMaterial({
                color: 0xbdefff,
                size: 0.027,
                transparent: true,
                opacity: 0.72,
                sizeAttenuation: true,
            }),
        );
        scene.add(particles);

        const pointer = new THREE.Vector2();
        const animationStartedAt = performance.now();
        const blinkStartedAt = [-1, -1];
        const nextBlinkAt = [5.5, 7.1];
        const gazeTarget = new THREE.Vector2();
        let nextGazeAt = 2.8;
        let lastPointerAt = 0;

        const resize = () => {
            const bounds = visual.getBoundingClientRect();
            if (!bounds.width || !bounds.height) return;

            renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, bounds.width < 600 ? 1.2 : 1.6));
            renderer.setSize(bounds.width, bounds.height, false);
            camera.aspect = bounds.width / bounds.height;
            camera.position.z = bounds.width < 600 ? 9 : 11;
            camera.updateProjectionMatrix();
            const visibleWorldWidth = 2 * camera.position.z * Math.tan(THREE.MathUtils.degToRad(camera.fov / 2)) * camera.aspect;
            stage.scale.setScalar(Math.min(1, (visibleWorldWidth * 0.92) / 6.3));
            renderer.render(scene, camera);
        };

        const renderScene = (elapsed, animate = true) => {
            if (animate && elapsed >= nextGazeAt) {
                gazeTarget.set((Math.random() - 0.5) * 0.28, (Math.random() - 0.5) * 0.16);
                nextGazeAt = elapsed + 2.4 + Math.random() * 2.8;
            }
            const pointerIsActive = performance.now() - lastPointerAt < 2200;
            const targetX = pointerIsActive ? pointer.x * 0.2 : gazeTarget.x;
            const targetY = pointerIsActive ? pointer.y * 0.12 : gazeTarget.y;
            iris.position.x += (0.08 + targetX * 0.35 - iris.position.x) * 0.09;
            iris.position.y += (targetY * 0.3 - iris.position.y) * 0.09;
            secondIris.position.x += (0.08 + (targetX + 0.012) * 0.35 - secondIris.position.x) * 0.09;
            secondIris.position.y += ((targetY - 0.006) * 0.3 - secondIris.position.y) * 0.09;
            stage.rotation.y += (targetX - stage.rotation.y) * 0.04;
            stage.rotation.x += (targetY - stage.rotation.x) * 0.04;
            stage.position.y = animate ? Math.sin(elapsed * 0.8) * 0.055 : 0;
            iris.rotation.z = animate ? Math.sin(elapsed * 0.28) * 0.025 : 0;
            secondIris.rotation.z = iris.rotation.z;
            outerIrisRing.rotation.z = animate ? elapsed * 0.12 : 0;
            secondOuterIrisRing.rotation.z = outerIrisRing.rotation.z;
            orbit.rotation.z = animate ? elapsed * 0.035 : 0;
            particles.rotation.z = animate ? Math.sin(elapsed * 0.12) * 0.035 : 0;
            cyanLight.position.x = 2.6 + Math.sin(elapsed * 0.65) * 0.6;
            violetLight.position.y = -1.2 + Math.cos(elapsed * 0.48) * 0.5;

            for (let index = 0; index < blinkStartedAt.length; index += 1) {
                if (animate && elapsed >= nextBlinkAt[index]) {
                    blinkStartedAt[index] = elapsed;
                    nextBlinkAt[index] = elapsed + 3.8 + Math.random() * 3.8;
                }
            }
            const blinks = blinkStartedAt.map((startedAt) => {
                const progress = startedAt < 0 ? 1 : Math.min((elapsed - startedAt) / 0.24, 1);
                return {
                    amount: progress < 1 ? Math.abs(Math.cos(progress * Math.PI)) : 1,
                    complete: progress >= 1,
                };
            });
            eyeGroup.scale.y = 0.68 * (animate ? Math.max(0.08, blinks[0].amount) : 1);
            secondEyeGroup.scale.y = 0.68 * (animate ? Math.max(0.08, blinks[1].amount) : 1);
            blinks.forEach((blink, index) => {
                if (blink.complete) blinkStartedAt[index] = -1;
            });

            renderer.render(scene, camera);
        };

        const stopAnimation = () => {
            if (animationFrame) window.cancelAnimationFrame(animationFrame);
            animationFrame = 0;
        };

        const animate = () => {
            animationFrame = 0;
            if (reducedMotion.matches || !isVisible || document.hidden) return;
            renderScene((performance.now() - animationStartedAt) / 1000);
            animationFrame = window.requestAnimationFrame(animate);
        };

        const startAnimation = () => {
            if (!hasWebGL || reducedMotion.matches || !isVisible || document.hidden || animationFrame) return;
            animationFrame = window.requestAnimationFrame(animate);
        };

        const renderStatic = () => {
            stopAnimation();
            renderScene(0, false);
        };

        visual.addEventListener('pointermove', (event) => {
            const bounds = visual.getBoundingClientRect();
            pointer.x = ((event.clientX - bounds.left) / bounds.width) * 2 - 1;
            pointer.y = -(((event.clientY - bounds.top) / bounds.height) * 2 - 1);
            lastPointerAt = performance.now();
        }, { passive: true });
        visual.addEventListener('pointerleave', () => {
            pointer.set(0, 0);
            lastPointerAt = 0;
        });

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stopAnimation();
            else if (reducedMotion.matches) renderStatic();
            else startAnimation();
        });

        reducedMotion.addEventListener('change', () => {
            if (reducedMotion.matches) renderStatic();
            else startAnimation();
        });

        canvas.addEventListener('webglcontextlost', (event) => {
            event.preventDefault();
            stopAnimation();
            hasWebGL = false;
            visual.classList.remove('webgl-ready');
        });

        const resizeObserver = new ResizeObserver(resize);
        resizeObserver.observe(visual);
        window.addEventListener('resize', resize, { passive: true });

        const visibilityObserver = new IntersectionObserver(([entry]) => {
            isVisible = entry.isIntersecting;
            if (isVisible && !reducedMotion.matches) startAnimation();
            else if (!isVisible) stopAnimation();
        }, { threshold: 0.05 });
        visibilityObserver.observe(visual);

        resize();
        renderStatic();
        hasWebGL = true;
        visual.classList.add('webgl-ready');
        if (!reducedMotion.matches) startAnimation();

        if (import.meta.hot) {
            import.meta.hot.dispose(() => {
                stopAnimation();
                resizeObserver.disconnect();
                visibilityObserver.disconnect();
                window.removeEventListener('resize', resize);
                renderer.dispose();
            });
        }
    } catch (error) {
        console.error('Homepage animated eye could not be initialized; using the CSS fallback.', error);
        renderer?.dispose();
        visual.classList.remove('webgl-ready');
    }
}
