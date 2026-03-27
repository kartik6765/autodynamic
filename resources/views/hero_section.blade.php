<style>
        :root {
            /* AUTO DYNAMICS — logo palette (primary references) */
            --ad-blue: #0076C0;
            --ad-blue-soft: #3d9ad4;
            --ad-black: #1D1D1B;
            --ad-red: #ED1C24;
            --ad-white: #ffffff;
            --ad-gray: #d1d3d4;
            --ad-gray-muted: rgba(209, 211, 212, 0.62);
            /* Rich blue-slate studio backdrop (logo #0076C0 family) */
            --cad-bg: #121920;
            --cad-bg-highlight: #2f3d50;
            --cad-bg-top: #2a3848;
            --cad-bg-mid: #1e2836;
            --cad-bg-deep: #141b26;
            --cad-bg-ink: #0c1018;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .hero-section-root {
            position: relative;
            min-height: 100vh;
            background: var(--cad-bg);
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ad-gray-muted);
            cursor: default;
            -webkit-font-smoothing: antialiased;
            overflow: hidden;
        }

        /* Bootstrap brand buttons */
        .btn-ad-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: var(--ad-blue);
            --bs-btn-border-color: var(--ad-blue);
            --bs-btn-hover-bg: #0088d4;
            --bs-btn-hover-border-color: #0088d4;
            --bs-btn-active-bg: #0065a3;
            --bs-btn-active-border-color: #0065a3;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .text-ad-blue {
            color: var(--ad-blue) !important;
        }

        .text-ad-white {
            color: var(--ad-white) !important;
        }

        .text-ad-muted {
            color: rgba(209, 211, 212, 0.55) !important;
        }

        .hero-badge {
            letter-spacing: 0.12em;
            font-size: 0.7rem;
        }

        .ui-title-hero {
            font-size: clamp(2rem, 4.5vw, 3.25rem);
            line-height: 1.12;
            letter-spacing: -0.03em;
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .ui-title-hero {
                font-size: clamp(2.15rem, 4vw, 2.85rem);
            }
        }

        /* Layered studio background: depth + soft brand blue bloom */
        #cad-backdrop {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            background:
                radial-gradient(ellipse 75% 55% at 82% 36%, rgba(0, 118, 192, 0.09) 0%, rgba(0, 118, 192, 0.02) 42%, transparent 58%),
                radial-gradient(ellipse 100% 55% at 50% 108%, rgba(0, 118, 192, 0.05) 0%, transparent 48%),
                radial-gradient(ellipse 90% 80% at 12% 18%, rgba(100, 160, 210, 0.06) 0%, transparent 45%),
                linear-gradient(
                    152deg,
                    var(--cad-bg-highlight) 0%,
                    var(--cad-bg-top) 14%,
                    var(--cad-bg-mid) 46%,
                    var(--cad-bg-deep) 78%,
                    var(--cad-bg-ink) 100%
                );
            pointer-events: none;
        }

        #cad-backdrop::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 95% 88% at 55% 42%, transparent 38%, rgba(6, 10, 18, 0.55) 100%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.02) 0%, transparent 12%);
            pointer-events: none;
        }

        #canvas-container {
            position: absolute;
            inset: 0;
            z-index: 1;
            background: transparent;
        }

        /* Large: canvas lives only in col-lg-7 */
        @media (min-width: 992px) {
            #canvas-container {
                position: absolute;
                inset: 0;
                width: auto;
                height: auto;
                z-index: 1;
            }
        }

        @media (max-width: 991.98px) {
            #canvas-container {
                inset: auto 0 auto 0;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                height: min(42vh, 300px);
                z-index: 2;
            }
        }

        #canvas-container canvas {
            cursor: crosshair;
            display: block;
            background: transparent;
        }

        #ui-layer {
            z-index: 20;
            pointer-events: none;
        }

        @media (min-width: 992px) {
            #ui-layer {
                position: absolute;
                inset: 0;
                display: flex;
                flex-direction: column;
                justify-content: stretch;
                padding: max(0.75rem, env(safe-area-inset-top)) max(0.75rem, env(safe-area-inset-right)) max(0.75rem, env(safe-area-inset-bottom)) max(0.75rem, env(safe-area-inset-left));
            }

            #ui-layer > .ad-ui-inner {
                flex: 1 1 auto;
                min-height: 0;
                max-height: 100%;
                pointer-events: none;
                display: flex;
                flex-direction: column;
            }

            #ui-layer > .ad-ui-inner .ad-content-col,
            #ui-layer > .ad-ui-inner .ad-viewport-wrap {
                pointer-events: auto;
            }

            .ad-main-row {
                flex: 1 1 auto;
                min-height: 0;
            }

            .ad-viewport-wrap {
                min-height: 320px;
                background: transparent;
            }
        }

        @media (max-width: 991.98px) {
            #ui-layer {
                position: relative;
                margin-top: var(--ad-mobile-canvas-h, min(42vh, 300px));
                min-height: calc(100dvh - var(--ad-mobile-canvas-h, min(42vh, 300px)));
                overflow-x: hidden;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                background: transparent;
                padding-bottom: max(1rem, env(safe-area-inset-bottom));
                pointer-events: auto;
            }

            #ui-layer .ad-ui-inner {
                pointer-events: auto;
                min-height: inherit;
            }

            .ad-viewport-wrap {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: var(--ad-mobile-canvas-h, min(42vh, 300px));
                pointer-events: none;
                z-index: 1;
            }

            #canvas-container {
                pointer-events: auto;
            }
        }

        /* Copy column — transparent so full-page backdrop shows through */
        .ad-content-col {
            position: relative;
            background: transparent;
        }

        @media (min-width: 992px) {
            .ad-content-col {
                padding: clamp(1.25rem, 2.2vw, 2rem) clamp(1.25rem, 2.5vw, 2.25rem);
                overflow-y: auto;
                overflow-x: hidden;
                -webkit-overflow-scrolling: touch;
            }
        }

        /* Logo red accent strip (matches brand banner) */
        .hero-section-root::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--ad-red);
            z-index: 30;
            pointer-events: none;
        }

        .ui-main {
            pointer-events: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            outline: none;
        }

        .logo img {
            height: clamp(2rem, 5vw, 2.75rem);
            width: auto;
            max-width: min(220px, 55vw);
            object-fit: contain;
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.4));
        }

        .logo:hover img {
            opacity: 0.92;
        }

        @media (min-width: 992px) {
            .ui-main {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                min-height: 0;
                padding: 0;
            }
        }

        @media (max-width: 991.98px) {
            .ui-main {
                padding: 1.25rem 1rem 1.5rem;
            }
        }

        .txt-shadow {
            text-shadow: 0 2px 24px rgba(0, 0, 0, 0.75);
        }

        .btn-ad-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            padding: 0.65rem 1.25rem;
            font-size: 0.875rem;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2) inset;
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .btn-ad-primary:hover {
            filter: brightness(1.06);
            transform: translateY(-1px);
        }

        .btn-ad-primary:active {
            transform: translateY(0);
        }

        .logo {
            cursor: pointer;
        }

        @media (prefers-reduced-motion: reduce) {
            .btn-ad-primary {
                transition: none;
            }
        }
    </style>

<section class="hero-section-root">

    <div id="cad-backdrop" aria-hidden="true"></div>

    <div id="ui-layer">
        <div class="container-fluid ad-ui-inner w-100 px-0">
            <div class="row ad-main-row g-0 flex-column flex-lg-row align-items-stretch">
                <aside class="col-12 col-lg-5 ad-content-col order-2 order-lg-1 d-flex flex-column">
                    <main class="ui-main flex-grow-1 d-flex flex-column justify-content-lg-center">
                      
                        <p class="hero-badge ui-badge text-ad-muted text-uppercase mb-2 mb-lg-3">Generative assembly</p>
                        <h1 class="ui-title ui-title-hero txt-shadow fw-light text-ad-white mb-0">
                            <span class="d-block overflow-hidden"><span class="hero-line d-inline-block">Mastering</span></span>
                            <span class="d-block overflow-hidden mt-1"><span class="hero-line d-inline-block fw-semibold text-ad-blue">weightlessness</span></span>
                        </h1>
                        <p class="ui-lede txt-shadow mt-3 mt-lg-4 small fs-6 lh-lg text-ad-muted mb-0">
                            Ultra-lightweight moulded components and cellular micro-structures—formed in real time in your browser.
                        </p>
                        <div class="ui-cta">
                            <button type="button" class="btn btn-ad-primary">
                                Discover the process
                                <svg class="flex-shrink-0" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </main>
                </aside>
                <div class="col-12 col-lg-7 ad-viewport-wrap order-1 order-lg-2 position-relative min-h-0 p-0">
                    <div id="canvas-container" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- GSAP for robust animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- Three.js Library Setup via ES Modules -->
    <script type="importmap">
        {
            "imports": {
                "three": "https://unpkg.com/three@0.160.0/build/three.module.js",
                "three/addons/": "https://unpkg.com/three@0.160.0/examples/jsm/"
            }
        }
    </script>

    <script type="module">
        import * as THREE from 'three';
        import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

        // ============================================
        // 1. SCENE SETUP
        // ============================================
        const container = document.getElementById('canvas-container');
        const scene = new THREE.Scene();
        scene.background = null;

        // The camera should focus right in the center of the screen
        const camera = new THREE.PerspectiveCamera(40, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.set(0, 1, 14);

        const renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true,
            premultipliedAlpha: false,
            powerPreference: 'high-performance'
        });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 1.72;
        /* Same base as page (--cad-bg) so empty buffer matches body; alpha 0 still clears “empty” */
        renderer.setClearColor(0x121920, 0);
        container.appendChild(renderer.domElement);

        function applyCanvasLayout() {
            const mobile = window.matchMedia('(max-width: 991.98px)').matches;
            container.style.inset = '';
            if (mobile) {
                const ch = Math.min(Math.round(window.innerHeight * 0.42), 300);
                container.style.height = `${ch}px`;
                container.style.width = '100%';
                container.style.position = 'absolute';
                container.style.top = '0';
                container.style.left = '0';
                container.style.right = '0';
                container.style.bottom = 'auto';
                container.style.zIndex = '2';
                document.documentElement.style.setProperty('--ad-mobile-canvas-h', `${ch}px`);
            } else {
                /* Dock inside col-lg-7 — not full-viewport fixed (that covered the copy column) */
                container.style.height = '';
                container.style.width = '';
                container.style.position = 'absolute';
                container.style.top = '0';
                container.style.left = '0';
                container.style.right = '0';
                container.style.bottom = '0';
                container.style.zIndex = '1';
                document.documentElement.style.removeProperty('--ad-mobile-canvas-h');
            }
            const w = Math.max(1, container.clientWidth);
            const h = Math.max(1, container.clientHeight);
            camera.aspect = w / h;
            camera.updateProjectionMatrix();
            renderer.setSize(w, h);
        }

        applyCanvasLayout();

        const controls = new OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.enableZoom = false;
        controls.enablePan = false;
        controls.target.set(0, 0, 0);

        // ============================================
        // 2. LIGHTING SETUP
        // ============================================
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.32);
        scene.add(ambientLight);

        const mainSpot = new THREE.SpotLight(0x66b8e8, 420);
        mainSpot.position.set(8, 12, 10);
        mainSpot.angle = Math.PI / 4;
        mainSpot.penumbra = 0.8;
        scene.add(mainSpot);

        const backLight = new THREE.PointLight(0x0076c0, 180, 22);
        backLight.position.set(-5, -2, -6);
        scene.add(backLight);

        const coreGlow = new THREE.PointLight(0xb8e0ff, 0, 10);
        coreGlow.position.set(0, 0, 0);
        scene.add(coreGlow);

        // ============================================
        // 3. OBJECT SETUP
        // ============================================
        const mainGroup = new THREE.Group();
        /* Centered in the col-lg-7 viewport */
        mainGroup.position.set(0, 0, 0);
        scene.add(mainGroup);

        // Solid Solid Heavy Component HAS BEEN REMOVED completely!

        // Particles Component (Always present, assembling into shapes)
        const particleCount = 20000;
        const particleGeo = new THREE.BufferGeometry();

        const positions = new Float32Array(particleCount * 3);
        const finalPositions = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            const rStart = Math.random() * 1.5;
            const thetaStart = Math.random() * Math.PI * 2;
            const yStart = (Math.random() - 0.5) * 2.5;

            positions[i * 3] = rStart * Math.cos(thetaStart);
            positions[i * 3 + 1] = yStart;
            positions[i * 3 + 2] = rStart * Math.sin(thetaStart);
        }

        particleGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));

        // Function to update final geometry based on shape cycle
        function setShapePositions(shapeType) {
            for (let i = 0; i < particleCount; i++) {
                if (shapeType === "HONEYCOMB_PANEL") {
                    // Cellular / Honeycomb Ribbing Panel
                    let u = (Math.random() - 0.5) * 8;
                    let v = (Math.random() - 0.5) * 5;
                    const hexSize = 0.55;
                    const q = (Math.sqrt(3) / 3 * u - 1 / 3 * v) / hexSize;
                    const r = (2 / 3 * v) / hexSize;

                    let rq = Math.round(q);
                    let rr = Math.round(r);
                    let rs = Math.round(-q - r);
                    const qDiff = Math.abs(rq - q);
                    const rDiff = Math.abs(rr - r);
                    const sDiff = Math.abs(rs - (-q - r));
                    if (qDiff > rDiff && qDiff > sDiff) rq = -rr - rs;
                    else if (rDiff > sDiff) rr = -rq - rs;

                    const cellCenterU = hexSize * Math.sqrt(3) * (rq + rr / 2);
                    const cellCenterV = hexSize * 3 / 2 * rr;
                    const distToCenter = Math.sqrt(Math.pow(u - cellCenterU, 2) + Math.pow(v - cellCenterV, 2));
                    const distToEdgeU = Math.max(0, Math.abs(u) - 3.5);
                    const distToEdgeV = Math.max(0, Math.abs(v) - 2.0);
                    const isBorder = (distToEdgeU > 0) || (distToEdgeV > 0);
                    const thickness = isBorder ? 0.4 : 0.08;

                    if (!isBorder && distToCenter < hexSize * 0.7) {
                        const angle = Math.atan2(v - cellCenterV, u - cellCenterU);
                        const noise = (Math.random() - 0.5) * 0.1;
                        u = cellCenterU + Math.cos(angle) * (hexSize * 0.7 + noise);
                        v = cellCenterV + Math.sin(angle) * (hexSize * 0.7 + noise);
                    }

                    const curveDepth = Math.sin(u * 0.3) * 1.5 - Math.cos(v * 0.4) * 0.8;
                    finalPositions[i * 3] = u;
                    finalPositions[i * 3 + 1] = v;
                    finalPositions[i * 3 + 2] = curveDepth + (Math.random() - 0.5) * thickness;
                }
                else if (shapeType === "ALLOY_WHEEL") {
                    // Alloy Wheel Rim Generative Pattern
                    const pType = Math.random();
                    let finalX = 0, finalY = 0, finalZ = 0;
                    const spokeCount = 5;

                    if (pType < 0.25) {
                        const theta = Math.random() * Math.PI * 2;
                        const rimWidth = (Math.random() - 0.5) * 1.5;
                        const radius = 3.5 + (Math.random() - 0.5) * 0.2;
                        finalX = Math.cos(theta) * radius;
                        finalY = Math.sin(theta) * radius;
                        finalZ = rimWidth;
                    } else if (pType < 0.40) {
                        const theta = Math.random() * Math.PI * 2;
                        const radius = 0.3 + Math.random() * 0.5;
                        const hubDepth = (Math.random() - 0.5) * 0.8;
                        finalX = Math.cos(theta) * radius;
                        finalY = Math.sin(theta) * radius;
                        finalZ = hubDepth;
                        if (Math.random() > 0.8) {
                            const nutAngle = Math.floor(Math.random() * 5) * (Math.PI * 2 / 5);
                            finalX += Math.cos(nutAngle) * 0.3;
                            finalY += Math.sin(nutAngle) * 0.3;
                            finalZ += 0.4;
                        }
                    } else {
                        const spokeIdx = Math.floor(Math.random() * spokeCount);
                        const baseAngle = spokeIdx * (Math.PI * 2 / spokeCount);
                        const r = 0.8 + Math.random() * 2.7;
                        let branchSign = Math.random() > 0.5 ? 1 : -1;
                        let angleOffset = 0;
                        if (r > 2.0) {
                            angleOffset = branchSign * Math.pow((r - 2.0), 1.2) * 0.2;
                        }
                        const cellularNoise = Math.sin(r * 20) * Math.cos(baseAngle) * 0.04;
                        const widthNoise = (Math.random() - 0.5) * (0.05 + Math.max(0, 3.5 - r) * 0.06);
                        const finalAngle = baseAngle + angleOffset + cellularNoise + widthNoise;
                        const spokeDepth = Math.sin(r * Math.PI * 0.5) * 0.4 + (Math.random() - 0.5) * 0.1;
                        finalX = Math.cos(finalAngle) * r;
                        finalY = Math.sin(finalAngle) * r;
                        finalZ = spokeDepth;
                    }
                    finalPositions[i * 3] = finalX;
                    finalPositions[i * 3 + 1] = finalY;
                    finalPositions[i * 3 + 2] = finalZ;
                } else if (shapeType === "AERO_WING") {
                    // Aerodynamic Wing Profile with Internal Ribs
                    const pType = Math.random();
                    let finalX = 0, finalY = 0, finalZ = 0;
                    
                    const spanY = (Math.random() - 0.5) * 8;
                    const chordX = (Math.random() - 0.5) * 6;
                    const nx = (chordX + 3) / 6; 
                    const thickness = 1.2 * (0.2969 * Math.sqrt(nx) - 0.1260 * nx - 0.3516 * nx*nx + 0.2843 * nx*nx*nx - 0.1015 * nx*nx*nx*nx) * 6;
                    
                    if (pType < 0.6) {
                        finalX = chordX;
                        finalY = spanY;
                        finalZ = (Math.random() > 0.5 ? 1 : -1) * thickness;
                    } else if (pType < 0.85) {
                        const ribY = Math.round(spanY / 1.5) * 1.5;
                        finalX = chordX;
                        finalY = ribY + (Math.random() - 0.5) * 0.1;
                        finalZ = (Math.random() * 2 - 1) * thickness;
                    } else {
                        const sparX = Math.random() > 0.5 ? -1.5 : 0.5;
                        finalX = sparX + (Math.random() - 0.5) * 0.2;
                        finalY = spanY;
                        finalZ = (Math.random() * 2 - 1) * Math.max(0.1, thickness*0.8);
                    }
                    finalPositions[i * 3] = finalX;
                    finalPositions[i * 3 + 1] = finalY;
                    finalPositions[i * 3 + 2] = finalZ;
                } else if (shapeType === "SUSPENSION_SPRING") {
                    // Suspension Damper & Coil Spring
                    const pType = Math.random();
                    let finalX = 0, finalY = 0, finalZ = 0;
                    
                    if (pType < 0.5) {
                        const t = Math.random() * Math.PI * 2 * 6; 
                        const yPos = -3.5 + (t / (Math.PI * 2 * 6)) * 7.0;
                        const springRadius = 2.4;
                        const tubeThickness = Math.random() * 0.4;
                        const tubeAngle = Math.random() * Math.PI * 2;
                        
                        const coreX = Math.cos(t) * springRadius;
                        const coreZ = Math.sin(t) * springRadius;
                        
                        finalX = coreX + Math.cos(tubeAngle) * tubeThickness;
                        finalY = yPos + Math.sin(tubeAngle) * tubeThickness;
                        finalZ = coreZ;
                    } else if (pType < 0.8) {
                        const h = (Math.random() - 0.5) * 7.5;
                        const cylinderRad = 0.8;
                        const theta = Math.random() * Math.PI * 2;
                        finalX = Math.cos(theta) * cylinderRad;
                        finalY = h;
                        finalZ = Math.sin(theta) * cylinderRad;
                    } else {
                        const isTop = Math.random() > 0.5;
                        const h = isTop ? 3.6 : -3.6;
                        const ptRad = Math.random() * 2.6;
                        const theta = Math.random() * Math.PI * 2;
                        finalX = Math.cos(theta) * ptRad;
                        finalY = h + (Math.random() - 0.5) * 0.2;
                        finalZ = Math.sin(theta) * ptRad;
                    }
                    finalPositions[i * 3] = finalX;
                    finalPositions[i * 3 + 1] = finalY;
                    finalPositions[i * 3 + 2] = finalZ;
                } else if (shapeType === "GENERATIVE_BRACKET") {
                    // Topology Optimized L-Bracket
                    let valid = false;
                    let finalX = 0, finalY = 0, finalZ = 0;
                    while(!valid) {
                        const x = (Math.random() - 0.5) * 6;
                        const y = (Math.random() - 0.5) * 6;
                        if (x > -0.5 && y > -0.5) continue;
                        
                        const h1x = -1.5, h1y = 1.5, r1 = 0.6;
                        const h2x = 1.5, h2y = -1.5, r2 = 0.6;
                        const h3x = -1.5, h3y = -1.5, r3 = 0.6;
                        
                        const d1 = Math.sqrt((x-h1x)**2 + (y-h1y)**2);
                        const d2 = Math.sqrt((x-h2x)**2 + (y-h2y)**2);
                        const d3 = Math.sqrt((x-h3x)**2 + (y-h3y)**2);
                        if (d1 < r1 || d2 < r2 || d3 < r3) continue;
                        
                        const structuralNoise = Math.sin(x*3)*Math.cos(y*3) + Math.sin(x*1.5 - y*1.5);
                        const edgeDistX = Math.min(Math.abs(x - (-3)), Math.abs(x - 3));
                        const edgeDistY = Math.min(Math.abs(y - (-3)), Math.abs(y - 3));
                        const isEdge = edgeDistX < 0.4 || edgeDistY < 0.4 || (x > -0.9 && x < -0.5 && y > -0.5) || (y > -0.9 && y < -0.5 && x > -0.5);
                        const nearHole = (d1 > r1 && d1 < r1+0.4) || (d2 > r2 && d2 < r2+0.4) || (d3 > r3 && d3 < r3+0.4);
                        
                        if (!isEdge && !nearHole && structuralNoise > 0.2) continue;
                        
                        valid = true;
                        finalX = x;
                        finalY = y;
                        finalZ = (Math.random() - 0.5) * (isEdge || nearHole ? 0.8 : 0.3);
                    }
                    finalPositions[i * 3] = finalX;
                    finalPositions[i * 3 + 1] = finalY;
                    finalPositions[i * 3 + 2] = finalZ;
                }
            }
            particleGeo.setAttribute('finalPosition', new THREE.BufferAttribute(finalPositions, 3));
            particleGeo.attributes.finalPosition.needsUpdate = true;
        }

        const SHAPES = ["HONEYCOMB_PANEL", "ALLOY_WHEEL", "AERO_WING", "SUSPENSION_SPRING", "GENERATIVE_BRACKET"];
        let currentShapeIndex = 0;

        // Initialize with first shape
        setShapePositions(SHAPES[currentShapeIndex]);

        // Custom Shader Material 
        const particleMat = new THREE.ShaderMaterial({
            uniforms: {
                progAssemble: { value: 0.0 },
                baseColor: { value: new THREE.Color(0x5eb8e8) }
            },
            vertexShader: `
                uniform float progAssemble;
                attribute vec3 finalPosition;
                varying float vProgress;
                varying float vCloud;

                void main() {
                    vec3 start = position;
                    vec3 finalPos = mix(start, finalPosition, progAssemble);
                    vec4 mvPos = modelViewMatrix * vec4(finalPos, 1.0);
                    float cloudBoost = 1.0 + (1.0 - progAssemble) * 0.45;
                    gl_PointSize = (24.0 * cloudBoost) / -mvPos.z;
                    gl_Position = projectionMatrix * mvPos;
                    vProgress = progAssemble;
                    vCloud = 1.0 - progAssemble;
                }
            `,
            fragmentShader: `
                uniform vec3 baseColor;
                varying float vProgress;
                varying float vCloud;
                
                void main() {
                    vec2 coord = gl_PointCoord - vec2(0.5);
                    float dist = length(coord);
                    if(dist > 0.5) discard;
                    
                    float glow = pow(max(0.0, 1.0 - dist * 2.0), 0.82);
                    vec3 col = mix(baseColor * 1.05, vec3(1.0, 1.02, 1.08), vProgress);
                    col *= 1.0 + vCloud * 0.55;
                    float alpha = (1.12 + vProgress * 0.95 + vCloud * 0.25) * glow;
                    
                    gl_FragColor = vec4(col * glow, alpha);
                }
            `,
            transparent: true,
            blending: THREE.AdditiveBlending,
            depthWrite: false
        });

        const particles = new THREE.Points(particleGeo, particleMat);
        mainGroup.add(particles);

        // ============================================
        // 4. ANIMATION LOGIC (NO HEAVY BLOCK, DIRECT TRANSITIONS)
        // ============================================

        const shapeUI = document.getElementById('shape-ui');

        function formatShapeLabel(key) {
            return key
                .toLowerCase()
                .split('_')
                .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
                .join(' ');
        }

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (!prefersReducedMotion) {
            gsap.timeline({ defaults: { ease: 'power2.out' } })
                .from('.logo', { opacity: 0, y: -8, duration: 0.45 }, 0)
                .from('.hero-badge', { opacity: 0, duration: 0.35 }, 0.08)
                .from('.hero-line', { opacity: 0, y: 16, duration: 0.5, stagger: 0.08 }, 0.14)
                .from('.ui-lede', { opacity: 0, y: 10, duration: 0.45 }, 0.24)
                .from('.btn-ad-primary', { opacity: 0, y: 8, duration: 0.4 }, 0.3);
        }

        const masterTl = gsap.timeline({ repeat: -1 });

        // Phase 1: Assemble into current shape from cloud
        masterTl.to(particleMat.uniforms.progAssemble, { value: 1.0, duration: 2.85, ease: "power3.inOut" }, 0);
        masterTl.to(coreGlow, { intensity: 72, distance: 26, duration: 1.85, ease: "power2.out" }, 0);
        masterTl.to(particles.rotation, { y: Math.PI * 2, duration: 7.5, ease: "none" }, 0);

        // Phase 2: Hold the assembled shape so user can see it
        masterTl.to({}, { duration: 2.35 });

        // Reset to cluster + swap shape (no dissolve / no spreading cloud)
        masterTl.call(() => {
            particleMat.uniforms.progAssemble.value = 0;
            currentShapeIndex = (currentShapeIndex + 1) % SHAPES.length;
            setShapePositions(SHAPES[currentShapeIndex]);
            const label = formatShapeLabel(SHAPES[currentShapeIndex]);
            if (prefersReducedMotion) {
                shapeUI.textContent = label;
            } else {
                gsap.timeline()
                    .to(shapeUI, { opacity: 0, y: -6, duration: 0.22, ease: 'power2.in' })
                    .call(() => { shapeUI.textContent = label; })
                    .to(shapeUI, { opacity: 1, y: 0, duration: 0.4, ease: 'power2.out' });
            }
            gsap.set(particles.rotation, { y: 0 });
        });

        // Loop repeats, bringing it automatically back to Phase 1 (assembly of new shape)!

        let mouseX = 0;
        let mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(e.clientY / window.innerHeight) * 2 + 1;
        });

        // Render Loop
        const clock = new THREE.Clock();
        function animate() {
            requestAnimationFrame(animate);
            const elapsedTime = clock.getElapsedTime();

            controls.update();

            // Subtle floating of entire group
            mainGroup.position.y = -0.5 + Math.sin(elapsedTime) * 0.1;

            camera.position.x += (mouseX * 1.5 - camera.position.x) * 0.05;
            camera.position.y += (1 + mouseY * 1.5 - camera.position.y) * 0.05;
            camera.lookAt(controls.target);

            renderer.render(scene, camera);
        }

        animate();

        window.addEventListener('resize', applyCanvasLayout);
    </script>