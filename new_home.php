<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediConnect - Book Appointments with Trusted Doctors</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {   primary: '#3b82f6',
              secondary: '#6366f1' },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      body {
        font-family: 'Inter', sans-serif;
      }
      input:focus, button:focus {
        outline: none;
      }
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
    </style>
  </head>
  <body class="bg-white">
    <!-- Navigation Bar -->
    <header class="fixed top-0 left-0 right-0 bg-white shadow-sm z-50">
      <div class="container mx-auto px-4 py-4 flex items-center justify-between">
      <div class="flex items-center space-x-2">
    <img src="assets/logo_without.png" alt="Logo" class="h-10">
    <span class="text-2xl font-bold">
    <div class="flex items-center space-x-2">
 
  <span class="text-2xl font-bold">
    <span class="text-primary">DOC</span><span class="text-gray-500">CALL</span>
  </span>
</div>
</span>
  </div>
   
        <!-- Desktop Navigation -->
         <div class="px-10"></div>
        <nav class="flex items-center space-x-8">
          <a href="#" class="text-gray-800 font-medium hover:text-primary transition-colors px-10">Home</a>
          <a href="#" class="text-gray-800 font-medium hover:text-primary transition-colors px-10">About</a>
          <a href="#" class="text-gray-800 font-medium hover:text-primary transition-colors px-10">Services</a>
          <a href="#" class="text-gray-800 font-medium hover:text-primary transition-colors px-10">Contact</a>
        </nav>
        <div class="flex items-center space-x-4">
          <a href="login_doc_new.php">
            <button class="bg-white text-primary border border-primary px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/5 transition-colors">
              Login as Doctor
            </button>
          </a>
          <a href="login_pat_new.php">
          <button class="bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition-colors">
            Login as Patient
          </button>
          </a>
          
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-24 relative w-full min-h-[600px] flex items-center" style="background-image: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.9) 50%, rgba(255,255,255,0.7) 70%, rgba(255,255,255,0.5) 100%), url('https://readdy.ai/api/search-image?query=A%20modern%20healthcare%20environment%20with%20soft%20natural%20lighting%2C%20showing%20a%20clean%20medical%20office%20with%20technology%20integration.%20The%20left%20side%20has%20a%20clean%20white%20gradient%20that%20smoothly%20transitions%20to%20the%20right%20where%20we%20see%20medical%20professionals%20in%20white%20coats%20with%20stethoscopes%20attending%20to%20patients.%20The%20image%20conveys%20professionalism%2C%20care%2C%20and%20advanced%20medical%20technology%20with%20a%20calming%20atmosphere.%20The%20left%20side%20is%20completely%20white%20and%20empty%20for%20text%20placement.&width=1600&height=800&seq=1&orientation=landscape'); background-size: cover; background-position: center right;">
      <div class="container mx-auto px-4 w-full">
        <div class="max-w-2xl">
          <h1 class="text-5xl font-bold text-gray-900 mb-4">Book Appointments with Trusted Doctors</h1>
          <p class="text-lg text-gray-700 mb-8">Connect with verified healthcare professionals and manage your appointments effortlessly. Your health journey starts here.</p>
          <div class="flex gap-4">
            <button class="bg-primary text-white px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition-colors">
              Get Started
            </button>
            <button class="bg-white text-gray-800 border border-gray-300 px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-gray-50 transition-colors">
              Learn More
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded shadow-sm text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4 bg-secondary/10 rounded-full">
              <i class="ri-user-heart-line ri-2x text-secondary"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">5,000+</h3>
            <p class="text-gray-600">Verified Doctors</p>
          </div>
          <div class="bg-white p-6 rounded shadow-sm text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4 bg-primary/10 rounded-full">
              <i class="ri-calendar-check-line ri-2x text-primary"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">50,000+</h3>
            <p class="text-gray-600">Appointments Booked</p>
          </div>
          <div class="bg-white p-6 rounded shadow-sm text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-4 bg-secondary/10 rounded-full">
              <i class="ri-star-line ri-2x text-secondary"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">98%</h3>
            <p class="text-gray-600">Patient Satisfaction</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose Us</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">Our platform makes healthcare accessible, convenient, and secure for everyone.</p>
        </div>
        <div class="grid grid-cols-3 gap-8">
          <div class="bg-white p-8 rounded shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 flex items-center justify-center mb-6 bg-primary/10 rounded-full">
              <i class="ri-calendar-line ri-xl text-primary"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Easy Booking</h3>
            <p class="text-gray-600">Schedule appointments with just a few clicks. Choose your preferred doctor and time slot without hassle.</p>
          </div>
          <div class="bg-white p-8 rounded shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 flex items-center justify-center mb-6 bg-secondary/10 rounded-full">
              <i class="ri-shield-check-line ri-xl text-secondary"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Verified Doctors</h3>
            <p class="text-gray-600">All healthcare professionals on our platform are thoroughly verified to ensure you receive quality care.</p>
          </div>
          <div class="bg-white p-8 rounded shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
            <div class="w-14 h-14 flex items-center justify-center mb-6 bg-primary/10 rounded-full">
              <i class="ri-lock-line ri-xl text-primary"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Secure Patient Records</h3>
            <p class="text-gray-600">Your medical information is encrypted and securely stored, accessible only to you and your authorized doctors.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">How It Works</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">Get started with our simple three-step process</p>
        </div>
        <div class="grid grid-cols-3 gap-8">
          <div class="text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 bg-white rounded-full shadow-sm text-primary font-bold text-xl">1</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Create an Account</h3>
            <p class="text-gray-600">Sign up as a patient with your basic information and medical history.</p>
          </div>
          <div class="text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 bg-white rounded-full shadow-sm text-primary font-bold text-xl">2</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Find a Doctor</h3>
            <p class="text-gray-600">Browse through our network of specialists and read patient reviews.</p>
          </div>
          <div class="text-center">
            <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 bg-white rounded-full shadow-sm text-primary font-bold text-xl">3</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">Book Appointment</h3>
            <p class="text-gray-600">Select a convenient time slot and confirm your appointment.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary/5">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Take Control of Your Healthcare?</h2>
      <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
        Join thousands of patients and doctors who are already experiencing the benefits of our platform.
      </p>
      <div class="flex gap-4 justify-center">
        <button id="patientBtn" class="bg-primary text-white px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition-colors">
          Create Patient Account
        </button>
        <button id="doctorBtn" class="bg-white text-primary border border-primary px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/5 transition-colors">
          Join as a Doctor
        </button>
      </div>
    </div>
  </div>
</section>

    <!-- Newsletter Section -->
   

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-16 pb-8">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-4 gap-8 mb-12">
          <div>
  <div class="flex items-center space-x-2">
  <img src="assets/logo_without.png" alt="Logo" class="h-10">
  <span class="text-2xl font-bold">DOCCALL</span>
</div>
<div class="py-5"></div>
            <p class="text-gray-400 mb-4">Connecting patients with trusted healthcare professionals for better health outcomes.</p>
            <div class="flex space-x-4">
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition-colors">
                <i class="ri-facebook-fill"></i>
              </a>
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition-colors">
                <i class="ri-twitter-fill"></i>
              </a>
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition-colors">
                <i class="ri-instagram-fill"></i>
              </a>
              <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-700 hover:bg-primary transition-colors">
                <i class="ri-linkedin-fill"></i>
              </a>
            </div>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Find Doctors</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">For Patients</h3>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Book Appointment</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Patient Dashboard</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Medical Records</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Health Articles</a></li>
              <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQs</a></li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
            <ul class="space-y-3">
              <li class="flex">
                <div class="w-6 h-6 flex items-center justify-center mr-3 text-primary">
                  <i class="ri-map-pin-line"></i>
                </div>
                <span class="text-gray-400">Natalio B. Bacalso Ave, Cebu City, 6000 Cebu</span>
              </li>
              <li class="flex">
                <div class="w-6 h-6 flex items-center justify-center mr-3 text-primary">
                  <i class="ri-phone-line"></i>
                </div>
                <span class="text-gray-400">+639773761701</span>
              </li>
              <li class="flex">
                <div class="w-6 h-6 flex items-center justify-center mr-3 text-primary">
                  <i class="ri-mail-line"></i>
                </div>
                <span class="text-gray-400">contact@libronpielagodecretales.com</span>
              </li>
              <li class="flex">
                <div class="w-6 h-6 flex items-center justify-center mr-3 text-primary">
                  <i class="ri-time-line"></i>
                </div>
                <span class="text-gray-400">Mon-Fri: 8:00 AM - 8:00 PM</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="border-t border-gray-700 pt-8">
          <div class="flex justify-between items-center">
            <p class="text-gray-400 text-sm">© 2025 LibronPielagoDecretales. All rights reserved.</p>
            <div class="flex space-x-6">
              <a href="#" class="text-gray-400 text-sm hover:text-white transition-colors">Privacy Policy</a>
              <a href="#" class="text-gray-400 text-sm hover:text-white transition-colors">Terms of Service</a>
              <a href="#" class="text-gray-400 text-sm hover:text-white transition-colors">Cookie Policy</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("patientBtn").addEventListener("click", function () {
      window.location.href = "register_patient_new.php";
    });

    document.getElementById("doctorBtn").addEventListener("click", function () {
      window.location.href = "register_doc.php";
    });
  });
  </script>
</html>