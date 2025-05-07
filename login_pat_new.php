<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Login - MediConnect</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#4CAF50", secondary: "#64B5F6" },
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
      input:focus, button:focus {
          outline: none;
      }
      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
      .password-toggle:hover {
          cursor: pointer;
      }
    </style>
  </head>
  <body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-sm py-4">
      <div class="container mx-auto px-4 flex items-center">
        <a
          href=""
          data-readdy="true"
          class="text-2xl font-['Pacifico'] text-primary"
          >logo</a
        >
        <a
          href="new_home.php"
          data-readdy="true"
          class="ml-6 text-gray-600 hover:text-primary transition-colors flex items-center"
        >
          <i class="ri-arrow-left-line mr-1"></i> Back to Home
        </a>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center py-12 px-4">
      <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-8 border border-gray-100">
          <div class="text-center mb-8">
            <div
              class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4"
            >
              <i class="ri-stethoscope-line ri-2x text-primary"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Patient Login</h1>
            <p class="text-gray-600 mt-2">Access your patient dashboard</p>
          </div>

          <!-- Login Form -->
          <form id="login-form" method="POST" action="patient_login_handler.php">
            <!-- Error Message Area -->
            <div
              id="error-message"
              class="hidden bg-red-50 text-red-600 p-3 rounded mb-4 text-sm"
            ></div>

            <!-- Email/Username Field -->
            <div class="mb-4">
              <label
                for="email"
                class="block text-sm font-medium text-gray-700 mb-1"
                >Email</label
              >
              <div class="relative">
                <div
                  class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                >
                  <i class="ri-user-line text-gray-400"></i>
                </div>
                <input
                  type="text"
                  id="email"
                  name="email"
                  class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary text-sm"
                  placeholder="Enter your email"
                  required
                />
              </div>
            </div>

            <!-- Password Field -->
            <div class="mb-6">
              <div class="flex items-center justify-between mb-1">
                <label
                  for="password"
                  class="block text-sm font-medium text-gray-700"
                  >Password</label
                >
                <a
                  href="#"
                  class="text-xs text-secondary hover:text-secondary/80 transition-colors"
                  >Forgot password?</a
                >
              </div>
              <div class="relative">
                <div
                  class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                >
                  <i class="ri-lock-line text-gray-400"></i>
                </div>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary text-sm"
                  placeholder="Enter your password"
                  required
                />
                
              </div>
            </div>

            <!-- Remember Me Checkbox -->
            

            <!-- Login Button -->
            <button
              type="submit"
              id="login-button"
              class="w-full bg-primary text-white py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition-colors flex items-center justify-center"
            >
              <span>Login</span>
            </button>
          </form>

          <!-- Register Link -->
          <div class="mt-6 text-center">
            <p class="text-gray-600 text-sm">
              New to MediConnect?
              <a
                href="register_patient_new.php"
                class="text-primary font-medium hover:text-primary/80 transition-colors"
                >Register as Patient</a
              >
            </p>
          </div>
        </div>

        <!-- Additional Information -->
       

      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-600 text-sm mb-4 md:mb-0">
            © 2025 MediConnect. All rights reserved.
          </p>
          <div class="flex space-x-6">
            <a
              href="#"
              class="text-gray-600 text-sm hover:text-primary transition-colors"
              >Privacy Policy</a
            >
            <a
              href="#"
              class="text-gray-600 text-sm hover:text-primary transition-colors"
              >Terms of Service</a
            >
            <a
              href="#"
              class="text-gray-600 text-sm hover:text-primary transition-colors"
              >Support</a
            >
          </div>
        </div>
      </div>
    </footer>

   
  </body>
</html>
