
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            :root {
                --cap-bg-top: #071a33;
                --cap-bg-mid: #0b2d57;
                --cap-bg-bottom: #0a2242;
                --cap-primary: #0b73c0;
                --cap-primary-light: #3ec6ff;
                --cap-text-soft: rgba(229, 240, 255, 0.86);
                --cap-card: rgba(9, 36, 68, 0.72);
                --cap-border: rgba(170, 213, 244, 0.24);
            }

            html,
            body {
                overflow-x: hidden;
            }

            .scroll-section {
                height: 95vh!important;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 48px 5%!important;
                position: relative;
                overflow: hidden;
                background:
                    radial-gradient(circle at 82% 20%, rgba(62, 198, 255, 0.22), transparent 30%),
                    radial-gradient(circle at 16% 82%, rgba(15, 119, 193, 0.18), transparent 34%),
                    linear-gradient(180deg, var(--cap-bg-top) 0%, var(--cap-bg-mid) 45%, var(--cap-bg-bottom) 100%);
                font-family: 'Inter', sans-serif;
            }

            .scroll-section * {
                font-family: 'Inter', sans-serif;
            }

            .top-area {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex: 1;
            }

            .animate-content {
                width: 35%;
                padding: 12px 0;
            }

            .animate-title {
                font-size: clamp(34px, 4.2vw, 54px);
                font-weight: 700;
                margin-bottom: 12px;
                line-height: 1.08;
                letter-spacing: -0.02em;
            }

            .animate-text {
                font-size: 16px;
                line-height: 1.8;
                color: var(--cap-text-soft);
            }

            .animate-image {
                width: 45%;
                text-align: center;
                position: relative;
            }

            .animate-image img {
                will-change: transform, opacity;
            }

            @keyframes carFloat {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-12px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .car-details {
                width: 20%;
                text-align: right;
                position: relative;
                padding-right: 10px;
            }

            .car-details::before {
                content: "";
                position: absolute;
                right: -10px;
                top: 5%;
                width: 1px;
                height: 90%;
                background: linear-gradient(180deg, transparent, rgba(191, 232, 255, 0.4), transparent);
            }

            .part {
                display: block;
                margin: 20px 0;
                font-size: 17px;
                opacity: .65;
                cursor: pointer;
                transition: .3s;
                color: #cde6fb;
                letter-spacing: .2px;
                padding: 6px 0;
            }

            .part.active {
                opacity: 1;
                font-weight: 600;
                color: #bfe8ff;
                font-size: 27px;
                text-shadow: 0 0 18px rgba(62, 198, 255, .5);
                line-height: 1.3;
            }

            .button-group {
                display: flex;
                justify-content: space-between;
                gap: 14px;
                padding-top: 30px;
            }

            .vehicle-btn {
                padding: 16px 24px;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(191, 232, 255, .3);
                border-radius: 14px;
                color: white;
                cursor: pointer;
                transition: .3s;
                font-size: 14px;
                min-width: 170px;
                backdrop-filter: blur(4px);
                line-height: 1.45;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                white-space: nowrap;
            }

            .vehicle-btn:hover {
                background: linear-gradient(135deg, #0d7dcd, #1aa6ef);
                border-color: #34b8ff;
                transform: translateY(-2px);
            }

            .vehicle-btn.active {
                background: linear-gradient(135deg, var(--cap-primary), #1492e2);
                border-color: #1492e2;
                font-weight: 700;
                box-shadow: 0 12px 24px rgba(11, 115, 192, 0.34);
            }


            @media(max-width:992px) {
                .top-area {
                    flex-direction: column;
                    text-align: center;
                    gap: 40px;
                }

                .animate-content {
                    width: 100%;
                    padding: 8px 0;
                }

                .animate-image {
                    width: 100%;
                }

                .car-details {
                    width: 100%;
                    text-align: center;
                    display: flex;
                    justify-content: center;
                    gap: 30px;
                }

                .car-details::before {
                    display: none;
                }

                .part {
                    margin: 0;
                }

                .button-group {
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .animate-title {
                    font-size: 34px;
                }

                .scroll-section {
                    height: auto;
                    padding: 60px 5%;
                }

                .vehicle-btn {
                    min-width: auto;
                    width: calc(50% - 5px);
                    padding: 13px 12px;
                    font-size: 13px;
                }
            }

            .image-wrapper{
                width:100%;
                max-width:700px;
                margin:auto;
                display:flex;
                justify-content:center;
                align-items:center;
                position:relative;
                /* overflow:hidden; */
            }

            .image-wrapper::before {
                content: "";
                position: absolute;
                width: min(540px, 85%);
                height: min(540px, 85%);
                border-radius: 50%;
                background: radial-gradient(circle, rgba(62, 198, 255, 0.28) 0%, rgba(62, 198, 255, 0) 70%);
                filter: blur(14px);
                z-index: 0;
            }

            .image-wrapper img{
                width:100%;
                max-width:700px;
                height:auto;
                transform:scale(1.2);
                position: relative;
                z-index: 1;
                filter: drop-shadow(0 16px 32px rgba(3, 20, 39, 0.45));
            }

            .auto-badge{
                border: 1px solid rgba(191, 232, 255, 0.28);
                background: rgba(255, 255, 255, 0.06);
                color: #d8efff;
                padding: 4px 12px;
                border-radius: 50px;
                font-size: 11px;
                letter-spacing: 1px;
                font-weight: 600;
                text-transform: uppercase;
            }

            .btn-contact{
                border:1px solid rgba(191, 232, 255, 0.3);
                padding:10px 20px;
                border-radius:10px;
                color:#fff;
                font-weight:600;
                text-decoration:none;
                transition:all .3s ease;
            }

            .btn-contact:hover{
                background:rgba(255, 255, 255, 0.1);
                color:#fff;
                transform: translateY(-2px);
            }

            .btn-accent{
                background:linear-gradient(135deg, var(--cap-primary), #1492e2);
                color:#fff;
                padding:10px 20px;
                border-radius:10px;
                font-weight:600;
                text-decoration:none;
                display:inline-flex;
                align-items:center;
                gap:8px;
                box-shadow:0 12px 26px rgba(11,115,192,0.48);
                transition:all .3s ease;
            }

            .btn-accent:hover{
                background:linear-gradient(135deg, #1a9aec, var(--cap-primary-light));
                color:#fff;
                box-shadow:0 12px 28px rgba(11,115,192,0.58);
            }

            .btn-accent svg{
                transition:transform .3s ease;
            }

            .btn-accent:hover svg{
                transform:translateX(4px);
            }
        </style>
  
        <section class="scroll-section">
            <div class="top-area">
                <div class="animate-content">
                    <span class="auto-badge mb-4 d-inline-block text-uppercase">
                        Auto Dynamics
                    </span>
                    <h2 class="animate-title text-white" id="aboutTitle">Two Wheeler Solutions</h2>
                    <p class="animate-text text-white mb-4" id="aboutText1"> Lightweight composite parts engineered for performance motorcycles and scooters </p>
                    
                </div>
                <div class="animate-image">
                    <div class="image-wrapper">
                        <img id="carImage" src="assets/images/2w-interior.png">
                    </div>
                </div>
                <div class="car-details">
                    <span class="part active" data-index="0">Interior</span>
                    <span class="part" data-index="1">Exterior</span>
                    <span class="part" data-index="2">Under Bonnet</span>
                </div>
            </div>
            <div class="button-group">
                <button class="vehicle-btn active" onclick="selectVehicle(this,'2w')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="18.5" cy="17.5" r="3.5"></circle>
                        <circle cx="5.5" cy="17.5" r="3.5"></circle>
                        <circle cx="15" cy="5" r="1"></circle>
                        <path d="M12 17.5V14l-3-3 4-3 2 3h2"></path>
                    </svg>
                    Two Wheeler </button>
                <button class="vehicle-btn" onclick="selectVehicle(this,'3w')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                        <path d="M15 18H9"></path>
                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                        <circle cx="17" cy="18" r="2"></circle>
                        <circle cx="7" cy="18" r="2"></circle>
                    </svg>
                    Three Wheeler </button>
                <button class="vehicle-btn" onclick="selectVehicle(this,'car')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <path d="M9 17h6"></path>
                        <circle cx="17" cy="17" r="2"></circle>
                    </svg>
                    Passenger Vehicles </button>
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
                    Commercial Vehicles </button>
                
            </div>
        </section>

        <script>
            gsap.registerPlugin(ScrollTrigger);
            const vehicleData = {
                "2w": {
                    title: "Two Wheeler Solutions",
                    text1: "Lightweight composite parts engineered for performance motorcycles and scooters.",
                    images: ["assets/images/2w-interior.png", "assets/images/2w-exterior.png", "assets/images/2w-bonnet.png"]
                },
                "3w": {
                    title: "Three Wheeler Innovation",
                    text1: "Durable and cost-effective composite solutions for commercial three wheelers.",
                    images: ["assets/images/3w-interior.png", "assets/images/3w-exterior.png", "assets/images/3w-bonnet.png"]
                },
                "4w": {
                    title: "Commercial Vehicles",
                    text1: "Heavy duty molded components for trucks and commercial fleets.",
                    images: ["assets/images/cw-interior.png", "assets/images/cw-exterior.png", "assets/images/cw-bonnet.png"]
                },
                "car": {
                    title: "Passenger Vehicles",
                    text1: "Premium plastic injection molded components for passenger cars.",
                    images: ["assets/images/car-interior.png", "assets/images/car-exterior.png", "assets/images/car-bonnet.png"]
                }
            };
            const parts = document.querySelectorAll(".part");
            const imageElement = document.getElementById("carImage");
            let currentVehicle = "2w";
            let currentStep = -1;
            ScrollTrigger.create({
                trigger: ".scroll-section",
                start: "top top",
                end: "bottom top",
                pin: true,
                scrub: 1,
                onUpdate: (self) => {
                    let progress = self.progress;
                    let step = Math.floor(progress * 3);
                    if (step > 2) step = 2;
                    if (step !== currentStep) {
                        currentStep = step;
                        activatePart(step);
                    }
                }
            });

            function activatePart(index) {
                parts.forEach(p => p.classList.remove("active"));
                parts[index].classList.add("active");
                let newImage = vehicleData[currentVehicle].images[index];
                gsap.timeline().to(imageElement, {
                    x: -120,
                    opacity: 0,
                    duration: .35,
                    ease: "power2.in"
                }).add(() => {
                    imageElement.src = newImage;
                }).fromTo(imageElement, {
                    x: 120,
                    opacity: 0
                }, {
                    x: 0,
                    opacity: 1,
                    duration: .45,
                    ease: "power3.out"
                });
            }
            
            function selectVehicle(button, type) {
                document.querySelectorAll(".vehicle-btn").forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                currentVehicle = type;
                let data = vehicleData[type];
                document.getElementById("aboutTitle").innerText = data.title;
                document.getElementById("aboutText1").innerText = data.text1;
                currentStep = 0;
                activatePart(0);
            }

            // function selectVehicle(button, type) {
            //     document.querySelectorAll(".vehicle-btn").forEach(btn => btn.classList.remove("active"));
            //     button.classList.add("active");
            //     currentVehicle = type;
            //     let data = vehicleData[type];
            //     document.getElementById("aboutTitle").innerText = data.title;
            //     document.getElementById("aboutText1").innerText = data.text1;
            //     activatePart(0);
            // }
        </script>

        <script>
            document.querySelectorAll(".part").forEach((el, index) => {
                el.addEventListener("click", function () {
                    currentStep = index;
                    activatePart(index);
                });
            });
        </script>   

