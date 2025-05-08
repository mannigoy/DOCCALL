<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Patient Registration - MediConnect</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#4CAF50", secondary: "#2196F3" },
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
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      body {
          font-family: 'Inter', sans-serif;
          background-color: #f9fafb;
      }
      .custom-file-input::-webkit-file-upload-button {
          display: none;
      }
      .custom-file-input::file-selector-button {
          display: none;
      }
      input[type="date"]::-webkit-calendar-picker-indicator {
          cursor: pointer;
      }
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
      .custom-checkbox {
          position: relative;
          padding-left: 28px;
          cursor: pointer;
          user-select: none;
      }
      .custom-checkbox input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
          height: 0;
          width: 0;
      }
      .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 20px;
          width: 20px;
          background-color: #fff;
          border: 2px solid #d1d5db;
          border-radius: 4px;
      }
      .custom-checkbox:hover input ~ .checkmark {
          border-color: #9ca3af;
      }
      .custom-checkbox input:checked ~ .checkmark {
          background-color: #4CAF50;
          border-color: #4CAF50;
      }
      .checkmark:after {
          content: "";
          position: absolute;
          display: none;
      }
      .custom-checkbox input:checked ~ .checkmark:after {
          display: block;
      }
      .custom-checkbox .checkmark:after {
          left: 6px;
          top: 2px;
          width: 5px;
          height: 10px;
          border: solid white;
          border-width: 0 2px 2px 0;
          transform: rotate(45deg);
      }
      .custom-radio {
          position: relative;
          padding-left: 28px;
          cursor: pointer;
          user-select: none;
      }
      .custom-radio input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
          height: 0;
          width: 0;
      }
      .radio-mark {
          position: absolute;
          top: 0;
          left: 0;
          height: 20px;
          width: 20px;
          background-color: #fff;
          border: 2px solid #d1d5db;
          border-radius: 50%;
      }
      .custom-radio:hover input ~ .radio-mark {
          border-color: #9ca3af;
      }
      .custom-radio input:checked ~ .radio-mark {
          background-color: #fff;
          border-color: #4CAF50;
      }
      .radio-mark:after {
          content: "";
          position: absolute;
          display: none;
      }
      .custom-radio input:checked ~ .radio-mark:after {
          display: block;
      }
      .custom-radio .radio-mark:after {
          top: 3px;
          left: 3px;
          width: 10px;
          height: 10px;
          border-radius: 50%;
          background: #4CAF50;
      }
      .password-strength {
          height: 4px;
          transition: all 0.3s;
      }
      .strength-weak { width: 25%; background-color: #ef4444; }
      .strength-medium { width: 50%; background-color: #f59e0b; }
      .strength-strong { width: 75%; background-color: #10b981; }
      .strength-very-strong { width: 100%; background-color: #4CAF50; }
    </style>
  </head>
  <body>
    <header class="bg-white shadow-sm">
      <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center"
      >
        <a
          href=""
       
          class="text-2xl font-['Pacifico'] text-primary"
          >MediConnect</a
        >
        <a
          href="new_home.php"
       
          class="flex items-center text-gray-600 hover:text-primary transition-colors"
        >
          <div class="w-5 h-5 flex items-center justify-center mr-1">
            <i class="ri-arrow-left-line"></i>
          </div>
          <span>Back to Home</span>
        </a>
      </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 mb-12">
      <div class="bg-white shadow-md rounded-lg p-6 sm:p-8">
        <div class="text-center mb-8">
          <h1 class="text-3xl font-bold text-gray-900">
            Create Doctor Account
          </h1>
          <p class="mt-2 text-gray-600">
            Join MediConnect to access quality healthcare services and manage
            your medical needs
          </p>
        </div>

        <form id="doctorRegistrationForm" action="register_doc_handler.php" method="POST" class="space-y-8">
          <!-- Personal Information -->
          <div>
            <h2
              class="text-xl font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200"
            >
              Personal Information
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label
                  for="firstName"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >First Name <span class="text-red-500">*</span></label
                >
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label
                  for="lastName"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Last Name <span class="text-red-500">*</span></label
                >
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label
                  for="email"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Email Address <span class="text-red-500">*</span></label
                >
                <input
                  type="email"
                  id="email"
                  name="email"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label
                  for="phone"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Phone Number <span class="text-red-500">*</span></label
                >
                <input
                  type="tel"
                  id="phone"
                  name="phone"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label
                  for="dob"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Date of Birth <span class="text-red-500">*</span></label
                >
                <input
                  type="date"
                  id="dob"
                  name="dob"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1"
                  >Gender <span class="text-red-500">*</span></label
                >
                <div class="flex space-x-6 mt-2">
                  <label class="custom-radio">
                    <input type="radio" name="gender" value="male" required />
                    <span class="radio-mark"></span>
                    Male
                  </label>
                  <label class="custom-radio">
                    <input type="radio" name="gender" value="female" />
                    <span class="radio-mark"></span>
                    Female
                  </label>
              
                </div>
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
            </div>
          </div>

          <!-- Medical Information -->
          <div>
            <h2
              class="text-xl font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200"
            >
              Professional Credentials
            </h2>
            <div class="space-y-6">
              
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                        <div class="relative">
                        <select name="department" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors" name="department" required>
                           <option value="" selected disabled>Select your department</option>
                           <option value="internal_medicine">Internal Medicine</option>
                           <option value="surgery">Surgery</option>
                           <option value="pediatrics">Pediatrics Department</option>
                           <option value="emergency">Emergency Department (ER)</option>
                           <option value="cardiology">Cardiology Department</option>
                           <option value="oncology">Oncology Department</option>
                           <option value="neurology">Neurology Department</option>
                           <option value="radiology">Radiology Department</option>
                           <option value="obstetrics_gynecology">Obstetrics & Gynecology</option>
                           <option value="orthopedic">Orthopedic Department</option>
                           <option value="psychiatry">Psychiatry Department</option>
                           <option value="icu">ICU (Intensive Care Unit)</option>
                           <option value="opd">Outpatient Department (OPD)</option>
                           <option value="general_practice">General Practice</option>
                           <option value="pathology">Pathology</option>
                       </select>

                            
                            </div>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-1">Medical Specialization</label>
                        <div class="relative">
                            <select name="specialization" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors">
                            <option value="" selected disabled>Select your specialization</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="dermatology">Dermatology</option>
                            <option value="endocrinology">Endocrinology</option>
                            <option value="gastroenterology">Gastroenterology</option>
                            <option value="neurology">Neurology</option>
                            <option value="obstetrics">Obstetrics & Gynecology</option>
                            <option value="oncology">Oncology</option>
                            <option value="pediatrics">Pediatrics</option>
                            <option value="psychiatry">Psychiatry</option>
                            <option value="urology">Urology</option>
                            </select>
                            
                            </div>
            </div>
            <div>
                <label
                  for="phone"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >License Number <span class="text-red-500">*</span></label
                >
                <input
                  type="text"
                  id="license_number"
                  name="licence_number"
                  required
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                />
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>

             

            
            </div>
          </div>

          <!-- Account Security -->
          <div>
            <h2
              class="text-xl font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200"
            >
              Account Security
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label
                  for="password"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Password <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                  />
              
                </div>
              
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              <div>
                <label
                  for="confirmPassword"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Confirm Password <span class="text-red-500">*</span></label
                >
                <div class="relative">
                  <input
                    type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                  />
                 
                 
                  </button>
                </div>
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              
            
            </div>
          </div>

          <!-- Profile & Documents -->
          
           

         

          

          <!-- Submit Button -->
          <div class="pt-4">
            <button
              type="submit"
              id="submitButton"
              class="w-full flex justify-center py-3 px-4 border border-transparent text-base font-medium rounded-button shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors whitespace-nowrap"
            >
              Create Account
            </button>
            <p class="text-center mt-4 text-sm text-gray-600">
              Already have an account?
              <a href="#" class="text-primary hover:underline">Sign in</a>
            </p>
          </div>
        </form>
      </div>
    </main>

    <footer class="bg-gray-50 border-t border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="md:col-span-1">
            <a
              href=""
            
              class="text-2xl font-['Pacifico'] text-primary"
              >MediConnect</a
            >
            <p class="mt-2 text-sm text-gray-600">
              Connecting patients with quality healthcare services since 2020.
            </p>
            <div class="flex space-x-4 mt-4">
              <a href="#" class="text-gray-400 hover:text-primary">
                <div class="w-6 h-6 flex items-center justify-center">
                  <i class="ri-facebook-fill"></i>
                </div>
              </a>
              <a href="#" class="text-gray-400 hover:text-primary">
                <div class="w-6 h-6 flex items-center justify-center">
                  <i class="ri-twitter-x-fill"></i>
                </div>
              </a>
              <a href="#" class="text-gray-400 hover:text-primary">
                <div class="w-6 h-6 flex items-center justify-center">
                  <i class="ri-instagram-fill"></i>
                </div>
              </a>
              <a href="#" class="text-gray-400 hover:text-primary">
                <div class="w-6 h-6 flex items-center justify-center">
                  <i class="ri-linkedin-fill"></i>
                </div>
              </a>
            </div>
          </div>
          <div>
            <h3
              class="text-sm font-semibold text-gray-900 tracking-wider uppercase"
            >
              Services
            </h3>
            <ul class="mt-4 space-y-2">
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Find a Doctor</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Book Appointment</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Video Consultation</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Health Records</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Medication Reminders</a
                >
              </li>
            </ul>
          </div>
          <div>
            <h3
              class="text-sm font-semibold text-gray-900 tracking-wider uppercase"
            >
              Company
            </h3>
            <ul class="mt-4 space-y-2">
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >About Us</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Our Team</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Careers</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Blog</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Contact Us</a
                >
              </li>
            </ul>
          </div>
          <div>
            <h3
              class="text-sm font-semibold text-gray-900 tracking-wider uppercase"
            >
              Legal
            </h3>
            <ul class="mt-4 space-y-2">
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Privacy Policy</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Terms of Service</a
                >
              </li>
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Cookie Policy</a
                >
              </li>
              
              <li>
                <a href="#" class="text-sm text-gray-600 hover:text-primary"
                  >Accessibility</a
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-200">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-sm text-gray-500">
              &copy; 2025 MediConnect. All rights reserved.
            </p>
           
          </div>
        </div>
      </div>
    </footer>

  
  </body>
</html>
