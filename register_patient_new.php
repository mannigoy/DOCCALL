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
            Create Patient Account
          </h1>
          <p class="mt-2 text-gray-600">
            Join MediConnect to access quality healthcare services and manage
            your medical needs
          </p>
        </div>

        <form id="patientRegistrationForm" class="space-y-8">
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
                  <label class="custom-radio">
                    <input type="radio" name="gender" value="other" />
                    <span class="radio-mark"></span>
                    Other
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
              Medical Information
            </h2>
            <div class="space-y-6">
              <div>
                <label
                  for="medicalHistory"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Medical History Summary</label
                >
                <textarea
                  id="medicalHistory"
                  name="medicalHistory"
                  rows="4"
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                  placeholder="Please provide a brief summary of your medical history..."
                ></textarea>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                  >Existing Conditions</label
                >
                <div
                  class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3"
                >
                  <label class="custom-checkbox">
                    <input
                      type="checkbox"
                      name="conditions"
                      value="hypertension"
                    />
                    <span class="checkmark"></span>
                    Hypertension
                  </label>
                  <label class="custom-checkbox">
                    <input type="checkbox" name="conditions" value="diabetes" />
                    <span class="checkmark"></span>
                    Diabetes
                  </label>
                  <label class="custom-checkbox">
                    <input type="checkbox" name="conditions" value="asthma" />
                    <span class="checkmark"></span>
                    Asthma
                  </label>
                  <label class="custom-checkbox">
                    <input
                      type="checkbox"
                      name="conditions"
                      value="heart_disease"
                    />
                    <span class="checkmark"></span>
                    Heart Disease
                  </label>
                  <label class="custom-checkbox">
                    <input
                      type="checkbox"
                      name="conditions"
                      value="arthritis"
                    />
                    <span class="checkmark"></span>
                    Arthritis
                  </label>
                  <label class="custom-checkbox">
                    <input type="checkbox" name="conditions" value="none" />
                    <span class="checkmark"></span>
                    None
                  </label>
                </div>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                  <label
                    for="medications"
                    class="block text-sm font-medium text-gray-700 mb-1"
                    >Current Medications</label
                  >
                  <input
                    type="text"
                    id="medications"
                    name="medications"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                    placeholder="Separate medications with commas"
                  />
                </div>
                <div>
                  <label
                    for="allergies"
                    class="block text-sm font-medium text-gray-700 mb-1"
                    >Allergies</label
                  >
                  <input
                    type="text"
                    id="allergies"
                    name="allergies"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-colors"
                    placeholder="Separate allergies with commas"
                  />
                </div>
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
                  <button
                    type="button"
                    id="togglePassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  >
                    <div class="w-5 h-5 flex items-center justify-center">
                      <i class="ri-eye-line text-gray-400"></i>
                    </div>
                  </button>
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
                  <button
                    type="button"
                    id="toggleConfirmPassword"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  >
                    <div class="w-5 h-5 flex items-center justify-center">
                      <i class="ri-eye-line text-gray-400"></i>
                    </div>
                  </button>
                </div>
                <p class="error-message text-red-500 text-sm mt-1 hidden"></p>
              </div>
              
            
            </div>
          </div>

          <!-- Profile & Documents -->
          
           

         

          <!-- Privacy & Terms -->
          <div class="space-y-4">
            <label class="custom-checkbox">
              <input type="checkbox" name="privacyPolicy" required />
              <span class="checkmark"></span>
              I have read and agree to the
              <a href="#" class="text-primary hover:underline"
                >Privacy Policy</a
              >
              <span class="text-red-500">*</span>
            </label>
            <label class="custom-checkbox">
              <input type="checkbox" name="termsOfService" required />
              <span class="checkmark"></span>
              I accept the
              <a href="#" class="text-primary hover:underline"
                >Terms of Service</a
              >
              <span class="text-red-500">*</span>
            </label>
            <label class="custom-checkbox">
              <input type="checkbox" name="marketingConsent" />
              <span class="checkmark"></span>
              I would like to receive updates about new services and health tips
              (optional)
            </label>
          </div>

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
                  >HIPAA Compliance</a
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
            <div class="flex space-x-6 mt-4 md:mt-0">
              <div class="w-8 h-5 flex items-center justify-center">
                <i class="ri-visa-fill text-blue-600 text-xl"></i>
              </div>
              <div class="w-8 h-5 flex items-center justify-center">
                <i class="ri-mastercard-fill text-orange-500 text-xl"></i>
              </div>
              <div class="w-8 h-5 flex items-center justify-center">
                <i class="ri-paypal-fill text-blue-800 text-xl"></i>
              </div>
              <div class="w-8 h-5 flex items-center justify-center">
                <i class="ri-apple-fill text-gray-800 text-xl"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Password visibility toggle
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");
    const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
    const confirmPassword = document.getElementById("confirmPassword");

    togglePassword.addEventListener("click", function () {
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      togglePassword.innerHTML =
        type === "password"
          ? '<div class="w-5 h-5 flex items-center justify-center"><i class="ri-eye-line text-gray-400"></i></div>'
          : '<div class="w-5 h-5 flex items-center justify-center"><i class="ri-eye-off-line text-gray-400"></i></div>';
    });

    toggleConfirmPassword.addEventListener("click", function () {
      const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
      confirmPassword.setAttribute("type", type);
      toggleConfirmPassword.innerHTML =
        type === "password"
          ? '<div class="w-5 h-5 flex items-center justify-center"><i class="ri-eye-line text-gray-400"></i></div>'
          : '<div class="w-5 h-5 flex items-center justify-center"><i class="ri-eye-off-line text-gray-400"></i></div>';
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    // Form validation
    const form = document.getElementById("patientRegistrationForm");

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      let isValid = true;

      // Reset all error messages
      document.querySelectorAll(".error-message").forEach((el) => {
        el.classList.add("hidden");
      });

      // Validate required fields
      const requiredFields = form.querySelectorAll("[required]");
      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          const errorMessage = field.nextElementSibling;
          if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.textContent = "This field is required";
            errorMessage.classList.remove("hidden");
          }
          isValid = false;
        }
      });

      // Validate password match
      const password = document.getElementById("password");
      const confirmPassword = document.getElementById("confirmPassword");
      if (password.value !== confirmPassword.value) {
        const errorMessage = confirmPassword.nextElementSibling;
        if (errorMessage && errorMessage.classList.contains("error-message")) {
          errorMessage.textContent = "Passwords do not match";
          errorMessage.classList.remove("hidden");
        }
        isValid = false;
      }

      // If form is valid, submit
      if (isValid) {
        const submitButton = document.getElementById("submitButton");
        submitButton.disabled = true;
        submitButton.innerHTML =
          '<div class="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin mr-2"></div> Creating Account...';

        // Simulate form submission
       
      }
    });
  });
</script>

  </body>
</html>
