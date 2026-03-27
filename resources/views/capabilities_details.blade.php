
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <style>
            html,
            body {
                overflow-x: hidden;
            }

            .scroll-section {
                height: 95vh!important;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 50px 5%!important;
                position: relative;
                overflow: hidden;
            }

            .top-area {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex: 1;
            }

            .animate-content {
                width: 35%;
            }

            .animate-title {
                font-size: 65px;
                font-weight: 700;
                margin-bottom: 20px;
            }

            .animate-text {
                font-size: 18px;
                line-height: 1.7;
                opacity: 0.9;
            }

            .animate-image {
                width: 45%;
                text-align: center;
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
            }

            .part {
                display: block;
                margin: 30px 0;
                font-size: 20px;
                opacity: .6;
                cursor: pointer;
                transition: .3s;
                color: #fff;
            }

            .part.active {
                opacity: 1;
                font-weight: 700;
                color: #dcf4ff;
                font-size: 35px;
                text-shadow: 2px 0px 5px rgba(79, 195, 247, .6);
                line-height: 45px;
            }

            .button-group {
                display: flex;
                justify-content: space-between;
                gap: 40px;
                padding-top: 40px;
            }

            .vehicle-btn {
                padding: 20px 75px 20px 75px;
                background: transparent;
                border: 1px solid rgba(255, 255, 255, .4);
                border-radius: 10px;
                color: white;
                cursor: pointer;
                transition: .3s;
            }

            .vehicle-btn:hover {
                background: #0b73c0;
                border-color: #0b73c0;
            }

            .vehicle-btn.active {
                background: #0b73c0;
                border-color: #0b73c0;
                font-weight: 700;
                /* font-size: 18px; */
            }

            .scroll-section::before {
                content: "";
                position: absolute;
                top: 0;
                left: -50%;
                width: 200%;
                height: 100%;
                background-image: repeating-linear-gradient(0deg,
                        transparent,
                        transparent 120px,
                        rgba(255, 255, 255, .05) 121px,
                        transparent 122px);
                animation: speedHorizontal 8s linear infinite;
                pointer-events: none;
            }

            .scroll-section::after {
                content: "";
                position: absolute;
                top: 0;
                left: -50%;
                width: 200%;
                height: 100%;
                background-image: repeating-linear-gradient(0deg,
                        transparent,
                        transparent 200px,
                        rgba(255, 255, 255, .03) 201px,
                        transparent 202px);
                animation: speedHorizontal2 12s linear infinite;
                pointer-events: none;
            }

            .scroll-section::before,
            .scroll-section::after{
                filter: blur(.3px);
            }

            @keyframes speedHorizontal {
                0% {
                    transform: translateX(0);
                }

                30% {
                    transform: translateX(120px);
                }

                45% {
                    transform: translateX(200px); 
                }

                60% {
                    transform: translateX(240px);
                }

                80% {
                    transform: translateX(280px);
                }

                100% {
                    transform: translateX(300px);
                }
            }

            @keyframes speedHorizontal2 {
                0% {
                    transform: translateX(0);
                }

                25% {
                    transform: translateX(150px);
                }

                40% {
                    transform: translateX(260px); 
                }

                70% {
                    transform: translateX(380px);
                }

                100% {
                    transform: translateX(500px);
                }
            }

            @media(max-width:992px) {
                .top-area {
                    flex-direction: column;
                    text-align: center;
                    gap: 40px;
                }

                .animate-content {
                    width: 100%;
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

                .part {
                    margin: 0;
                }

                .button-group {
                    flex-wrap: wrap;
                    gap: 15px;
                }

                .animate-title {
                    font-size: 40px;
                }

                .scroll-section {
                    height: auto;
                    padding: 60px 5%;
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

            .image-wrapper img{
                width:100%;
                max-width:700px;
                height:auto;
                transform:scale(1.2);
            }

            .auto-badge{
                border: 1px solid rgba(255, 255, 255, 0.2);
                background: rgba(255, 255, 255, 0.1);
                color: rgba(255, 255, 255, 0.85);
                padding: 1px 15px;
                border-radius: 50px;
                font-size: 10px;
                letter-spacing: 1px;
                font-weight: 500;
            }

            .btn-contact{
                border:1px solid rgba(255,255,255,0.3);
                padding:10px 24px;
                border-radius:8px;
                color:#fff;
                font-weight:500;
                text-decoration:none;
                transition:all .3s ease;
            }

            .btn-contact:hover{
                background:rgba(255,255,255,0.1);
                color:#fff;
            }

            .btn-accent{
                background:#0b73c0;
                color:#fff;
                padding:10px 24px;
                border-radius:8px;
                font-weight:500;
                text-decoration:none;
                display:inline-flex;
                align-items:center;
                gap:8px;
                box-shadow:0 8px 20px rgba(11,115,192,0.35);
                transition:all .3s ease;
            }

            .btn-accent:hover{
                background:#1590eb;
                color:#fff;
                box-shadow:0 10px 28px rgba(11,115,192,0.5);
            }

            .btn-accent svg{
                transition:transform .3s ease;
            }

            .btn-accent:hover svg{
                transform:translateX(4px);
            }
        </style>
  
        <section class="scroll-section" style="background:linear-gradient( 180deg, #021c3c 0%, #052a55 40%, #0a3c74 70%, #021c3c 100% );">
            <div class="top-area">
                <div class="animate-content">
                    <span class="auto-badge mb-4 d-inline-block text-uppercase">
                        Auto Dynamics
                    </span>
                    <h2 class="animate-title text-white" id="aboutTitle">Two Wheeler Solutions</h2>
                    <p class="animate-text text-white mb-4" id="aboutText1"> Lightweight composite parts engineered for performance motorcycles and scooters </p>
                    <a href="#" class="btn-accent d-inline-flex align-items-center gap-2">
                        Explore More
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m5 15 6-6-6-6"></path>
                        </svg>
                    </a>&nbsp;&nbsp;
                    <a href="#" class="btn-contact d-inline-flex align-items-center gap-2">
                        Contact Us
                    </a>
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
                    <br> Two Wheeler </button>
                <button class="vehicle-btn" onclick="selectVehicle(this,'3w')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                        <path d="M15 18H9"></path>
                        <path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14"></path>
                        <circle cx="17" cy="18" r="2"></circle>
                        <circle cx="7" cy="18" r="2"></circle>
                    </svg>
                    <br> Three Wheeler </button>
                <button class="vehicle-btn" onclick="selectVehicle(this,'car')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                        <circle cx="7" cy="17" r="2"></circle>
                        <path d="M9 17h6"></path>
                        <circle cx="17" cy="17" r="2"></circle>
                    </svg>
                    <br> Passenger Vehicles </button>
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
                    <br> Commercial Vehicles </button>
                
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
                let trigger = ScrollTrigger.getAll()[0];
                if (trigger) {
                    gsap.fromTo(trigger, 
                        { progress: trigger.progress }, 
                        { 
                            progress: 0, 
                            duration: 0.8, 
                            ease: "power2.inOut",
                            onUpdate: () => {
                                trigger.scroll(trigger.start + (trigger.end - trigger.start) * trigger.progress);
                            }
                        }
                    );
                }
                document.querySelectorAll(".vehicle-btn").forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                currentVehicle = type;
                let data = vehicleData[type];
                document.getElementById("aboutTitle").innerText = data.title;
                document.getElementById("aboutText1").innerText = data.text1;
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
                    let trigger = ScrollTrigger.getAll()[0];
                    if (trigger) {
                        let targetProgress = index / 2; 

                        gsap.to(trigger, {
                            progress: targetProgress,
                            duration: 0.6,
                            ease: "power2.inOut",
                            onUpdate: () => {
                                trigger.scroll(
                                    trigger.start +
                                    (trigger.end - trigger.start) * trigger.progress
                                );
                            }
                        });
                    }

                });
            });
        </script>   

