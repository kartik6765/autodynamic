<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Car Website</title>
        <style>
            body {
                margin: 0;
                background: #fff;
            }

            /* SECTION */
            .scroll-section {
                height: 100vh;
                position: relative;
                overflow: hidden;
            }

            /* ABOUT LAYOUT */
            .about-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 175px 60px 0 60px;
            }

            /* LEFT CONTENT */
            .about-content {
                width: 35%;
            }

            .about-title {
                font-size: 38px;
                color: #5a8c5a;
                margin-bottom: 20px;
            }

            .about-subtitle {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .about-text {
                line-height: 1.7;
                margin-bottom: 15px;
            }

            /* RIGHT IMAGE */
            .about-image {
                width: 60%;
                text-align: center;
            }

            /* CAR SVG */
            .image-stack {
                width: 500px;
                margin: auto;
            }

            /* RIGHT SIDE PART LIST */
            .car-details {
                position: absolute;
                right: 40px;
                top: 35%;
                transform: translateY(-50%);
                text-align: right;
            }

            .part {
                display: block;
                margin: 12px 0;
                cursor: pointer;
                font-size: 14px;
            }

            .part.active {
                color: red;
                font-weight: 600;
            }

            /* VEHICLE BUTTONS */
            .button-group {
                position: sticky;
                bottom: 20px;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                gap: 80px;
            }

            .vehicle-btn {
                padding: 15px 55px;
                border: 2px solid #053164;
                background: white;
                cursor: pointer;
                border-radius: 5px;
            }

            .vehicle-btn.active {
                background: #053164;
                color: white;
            }

            .vehicle-btn svg{
                stroke:currentColor;
            }

            /* ACTIVE BUTTON */
            .vehicle-btn.active{
                background:#053164;
                color:#fff;
                border-color:#053164;
            }

            /* OPTIONAL HOVER */
            .vehicle-btn:hover{
                background:#053164;
                color:#fff;
            }

            /* SVG COLOR CHANGE */
            #interior.active {
                fill: #ff7043;
            }

            #exterior.active {
                fill: #42a5f5;
            }

            #bonnet.active {
                fill: #66bb6a;
            }
        </style>
        <!-- GSAP -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    </head>
    <body>
        <section class="scroll-section">
            <div class="about-container">
                <!-- LEFT TEXT -->
                <div class="about-content">
                    <h2 class="about-title">About</h2>
                    <h3 class="about-subtitle">Car Models</h3>
                    <p class="about-text"> Explore our comprehensive collection of car models with detailed specifications, performance metrics, and the latest features. </p>
                    <p class="about-text"> With our expert team and detailed databases we empower car enthusiasts to make informed decisions. </p>
                </div>
                <!-- RIGHT IMAGE -->
                <div class="about-image">
                    <div class="image-stack">
                        <svg id="carSVG" viewBox="0 0 500 250">
                            <!-- Exterior -->
                            <rect id="exterior" x="50" y="90" width="400" height="80" rx="20" fill="#d0d0d0" />
                            <!-- Interior -->
                            <rect id="interior" x="180" y="100" width="140" height="60" rx="10" fill="#a0a0a0" />
                            <!-- Bonnet -->
                            <rect id="bonnet" x="360" y="90" width="90" height="80" rx="15" fill="#b5b5b5" />
                        </svg>
                    </div>
                </div>
                <!-- RIGHT LABELS -->
                <div class="car-details">
                    <span class="part active">Interior</span>
                    <span class="part">Exterior</span>
                    <span class="part">Under Bonnet</span>
                </div>
            </div>
        </section>
        <!-- VEHICLE BUTTONS -->
        <div class="button-group">
            <!-- TWO WHEELER -->
            <button class="vehicle-btn active" onclick="selectVehicle(this,'2w')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="18.5" cy="17.5" r="3.5"></circle>
                    <circle cx="5.5" cy="17.5" r="3.5"></circle>
                    <circle cx="15" cy="5" r="1"></circle>
                    <path d="M12 17.5V14l-3-3 4-3 2 3h2"></path>
                </svg>
                <br>Two Wheeler </button>
            <!-- THREE WHEELER -->
            <button class="vehicle-btn" onclick="selectVehicle(this,'3w')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                    <path d="M15 18H9"></path>
                    <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                    <circle cx="17" cy="18" r="2"></circle>
                    <circle cx="7" cy="18" r="2"></circle>
                </svg>
                <br>Three Wheeler </button>
            <!-- COMMERCIAL VEHICLES -->
            <button class="vehicle-btn" onclick="selectVehicle(this,'4w')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M8 6v6"></path>
                    <path d="M15 6v6"></path>
                    <path d="M2 12h19.6"></path>
                    <path d="M18 18h3s.5-1.7.8-2.8c.1-.4.2-.8.2-1.2 0-.4-.1-.8-.2-1.2l-1.4-5C20.1 6.8 19.1 6 18 6H4a2 2 0 0 0-2 2v10h3"></path>
                    <circle cx="7" cy="18" r="2"></circle>
                    <path d="M9 18h5"></path>
                    <circle cx="16" cy="18" r="2"></circle>
                </svg>
                <br>Commercial Vehicles </button>
            <!-- PASSENGER VEHICLES -->
            <button class="vehicle-btn" onclick="selectVehicle(this,'truck')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <path d="M9 17h6"></path>
                    <circle cx="17" cy="17" r="2"></circle>
                </svg>
                <br>Passenger Vehicles </button>
        </div>
        <script>
            gsap.registerPlugin(ScrollTrigger);
            /* ELEMENTS */
            const parts = document.querySelectorAll(".part");
            const interior = document.getElementById("interior");
            const exterior = document.getElementById("exterior");
            const bonnet = document.getElementById("bonnet");
            /* PIN SECTION */
            ScrollTrigger.create({
                trigger: ".scroll-section",
                start: "top top",
                end: "+=900",
                pin: true,
                scrub: true
            });
            /* PART SCROLL */
            parts.forEach((part, index) => {
                ScrollTrigger.create({
                    trigger: ".scroll-section",
                    start: () => "top+=" + (index * 300) + " center",
                    end: () => "top+=" + ((index + 1) * 300) + " center",
                    onEnter: () => activatePart(index),
                    onEnterBack: () => activatePart(index)
                });
            });
            /* ACTIVATE PART */
            function activatePart(i) {
                parts.forEach(p => p.classList.remove("active"));
                interior.classList.remove("active");
                exterior.classList.remove("active");
                bonnet.classList.remove("active");
                parts[i].classList.add("active");
                if (i === 0) {
                    interior.classList.add("active");
                }
                if (i === 1) {
                    exterior.classList.add("active");
                }
                if (i === 2) {
                    bonnet.classList.add("active");
                }
            }
            /* VEHICLE BUTTON SWITCH */
            function selectVehicle(button, type) {
                const buttons = document.querySelectorAll(".vehicle-btn");
                buttons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                if (type === "2w") {
                    exterior.setAttribute("width", "300");
                    exterior.setAttribute("x", "100");
                }
                if (type === "3w") {
                    exterior.setAttribute("width", "340");
                    exterior.setAttribute("x", "80");
                }
                if (type === "4w") {
                    exterior.setAttribute("width", "400");
                    exterior.setAttribute("x", "50");
                }
                if (type === "truck") {
                    exterior.setAttribute("width", "450");
                    exterior.setAttribute("x", "30");
                }
            }
        </script>
    </body>
</html>