<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Healthcare Management System</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#3b82f6", secondary: "#6366f1" },
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.5.0/echarts.min.js"></script>
    
  </head>
]
  <body class="bg-slate-50 min-h-screen">
    <div class="h-screen">
      <!-- Main Content -->
      <main class="flex-1 overflow-x-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm py-4 px-6">
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
              <div class="font-['Pacifico'] text-2xl text-slate-900 mr-8">
                logo
              </div>
              <nav class="flex space-x-6">
                <a href="#dashboard" class="text-primary font-medium"
                  >Dashboard</a
                >
                <a href="#patients" class="hover:text-primary"
                  >Patients</a
                >
                <a href="#doctors" class=" hover:text-primary"
                  >Doctors</a
                >
                <a
                  href="#appointments"
                  class="text-slate-600 hover:text-primary"
                  >Appointments</a
                >
              </nav>
            </div>
            <div class="flex items-center space-x-4">
              
             
              <div class="flex items-center">
                <div
                  class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center mr-3"
                >
                  <i class="ri-user-line text-slate-600"></i>
                </div>
                <div>
                  <p class="text-sm font-medium text-slate-900">Admin User</p>
                  <p class="text-xs text-slate-500">admin@healthcare.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center">
            <h1 class="text-xl font-semibold text-slate-900">
              Dashboard Overview
            </h1>
            <span class="text-sm text-slate-500 ml-4"
              >Thursday, May 8, 2025</span
            >
          </div>
        </header>
        <!-- Dashboard Content -->
        <div class="p-6" id="dashboard">
          <!-- Stats Cards -->
          <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6"
          >
            <div class="bg-white rounded shadow p-5 border-l-4 border-primary">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-slate-500">
                    Total Patients
                  </p>
                  <h3 class="text-2xl font-bold text-slate-900 mt-1">1,248</h3>
                  <p class="text-xs text-emerald-500 mt-2 flex items-center">
                    <i class="ri-arrow-up-line mr-1"></i> 12% from last month
                  </p>
                </div>
                <div
                  class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-primary"
                >
                  <i class="ri-user-line text-xl"></i>
                </div>
              </div>
            </div>
            <div
              class="bg-white rounded shadow p-5 border-l-4 border-secondary"
            >
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-slate-500">
                    Total Doctors
                  </p>
                  <h3 class="text-2xl font-bold text-slate-900 mt-1">64</h3>
                  <p class="text-xs text-emerald-500 mt-2 flex items-center">
                    <i class="ri-arrow-up-line mr-1"></i> 4% from last month
                  </p>
                </div>
                <div
                  class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-secondary"
                >
                  <i class="ri-user-star-line text-xl"></i>
                </div>
              </div>
            </div>
            <div
              class="bg-white rounded shadow p-5 border-l-4 border-emerald-500"
            >
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-slate-500">
                    Appointments Today
                  </p>
                  <h3 class="text-2xl font-bold text-slate-900 mt-1">42</h3>
                  <p class="text-xs text-emerald-500 mt-2 flex items-center">
                    <i class="ri-arrow-up-line mr-1"></i> 8% from yesterday
                  </p>
                </div>
                <div
                  class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-500"
                >
                  <i class="ri-calendar-check-line text-xl"></i>
                </div>
              </div>
            </div>
            <div
              class="bg-white rounded shadow p-5 border-l-4 border-amber-500"
            >
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-slate-500">
                    Pending Appointments
                  </p>
                  <h3 class="text-2xl font-bold text-slate-900 mt-1">18</h3>
                  <p class="text-xs text-red-500 mt-2 flex items-center">
                    <i class="ri-arrow-up-line mr-1"></i> 3% from yesterday
                  </p>
                </div>
                <div
                  class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center text-amber-500"
                >
                  <i class="ri-time-line text-xl"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- Charts Section -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Appointments Chart -->
            <div class="bg-white rounded shadow p-5">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-slate-900">
                  Appointments Overview
                </h3>
                <div class="flex space-x-2">
                  <button
                    class="px-3 py-1 text-xs font-medium text-primary bg-blue-50 rounded-full"
                  >
                    Weekly
                  </button>
                  <button
                    class="px-3 py-1 text-xs font-medium text-slate-500 hover:bg-slate-100 rounded-full"
                  >
                    Monthly
                  </button>
                  <button
                    class="px-3 py-1 text-xs font-medium text-slate-500 hover:bg-slate-100 rounded-full"
                  >
                    Yearly
                  </button>
                </div>
              </div>
              <div id="appointmentsChart" style="height: 300px;"></div>
            </div>
            <!-- Specialties Chart -->
            <div class="bg-white rounded shadow p-5">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-slate-900">
                  Appointments by Specialty
                </h3>
                <button
                  class="text-primary hover:text-blue-700 text-sm font-medium"
                >
                  View All
                </button>
              </div>
              <div id="specialtiesChart" style="height: 300px;"></div>
            </div>
          </div>
          <!-- Recent Appointments -->
          <div class="bg-white rounded shadow mb-6">
            <div
              class="p-5 border-b border-slate-100 flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold text-slate-900">
                Recent Appointments
              </h3>
              <button
                class="text-primary hover:text-blue-700 text-sm font-medium"
              >
                View All Appointments
              </button>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-slate-50">
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Patient
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Doctor
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Date & Time
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-primary mr-3"
                        >
                          <span class="font-medium text-sm">EB</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Emma Brown
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1024</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. Michael Chen</div>
                      <div class="text-xs text-slate-500">Cardiology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">10:30 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-emerald-600 mr-3"
                        >
                          <span class="font-medium text-sm">JD</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            James Davis
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0987</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Dr. Sarah Johnson
                      </div>
                      <div class="text-xs text-slate-500">Neurology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">11:45 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800"
                        >Pending</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3"
                        >
                          <span class="font-medium text-sm">SW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Sophia Williams
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1122</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Dr. Robert Garcia
                      </div>
                      <div class="text-xs text-slate-500">Dermatology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">2:15 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3"
                        >
                          <span class="font-medium text-sm">LM</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Liam Miller
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0934</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. Emily Wilson</div>
                      <div class="text-xs text-slate-500">Pediatrics</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">3:30 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800"
                        >Cancelled</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-slate-400 cursor-not-allowed">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 mr-3"
                        >
                          <span class="font-medium text-sm">OT</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Olivia Thompson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1256</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. David Kim</div>
                      <div class="text-xs text-slate-500">Orthopedics</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 9, 2025</div>
                      <div class="text-xs text-slate-500">9:00 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Doctor Availability -->
          <div class="bg-white rounded shadow">
            <div
              class="p-5 border-b border-slate-100 flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold text-slate-900">
                Doctor Availability Today
              </h3>
              <div class="flex space-x-2">
                <div class="flex items-center">
                  <div class="w-3 h-3 rounded-full bg-emerald-500 mr-2"></div>
                  <span class="text-xs text-slate-500">Available</span>
                </div>
                <div class="flex items-center">
                  <div class="w-3 h-3 rounded-full bg-amber-500 mr-2"></div>
                  <span class="text-xs text-slate-500">Busy</span>
                </div>
                <div class="flex items-center">
                  <div class="w-3 h-3 rounded-full bg-slate-300 mr-2"></div>
                  <span class="text-xs text-slate-500">Unavailable</span>
                </div>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-slate-50">
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Doctor
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Specialty
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Next Available
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Appointments
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">MC</span>
                        </div>
                        <div class="text-sm font-medium text-slate-900">
                          Dr. Michael Chen
                        </div>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Cardiology
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-3 h-3 rounded-full bg-emerald-500 mr-2"
                        ></div>
                        <span class="text-sm text-slate-900">Available</span>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Now
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      8 today
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">SJ</span>
                        </div>
                        <div class="text-sm font-medium text-slate-900">
                          Dr. Sarah Johnson
                        </div>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Neurology
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-3 h-3 rounded-full bg-amber-500 mr-2"
                        ></div>
                        <span class="text-sm text-slate-900">Busy</span>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      12:30 PM
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      6 today
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">RG</span>
                        </div>
                        <div class="text-sm font-medium text-slate-900">
                          Dr. Robert Garcia
                        </div>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Dermatology
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-3 h-3 rounded-full bg-slate-300 mr-2"
                        ></div>
                        <span class="text-sm text-slate-900">Unavailable</span>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Tomorrow
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      0 today
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">EW</span>
                        </div>
                        <div class="text-sm font-medium text-slate-900">
                          Dr. Emily Wilson
                        </div>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Pediatrics
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-3 h-3 rounded-full bg-emerald-500 mr-2"
                        ></div>
                        <span class="text-sm text-slate-900">Available</span>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Now
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      10 today
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">DK</span>
                        </div>
                        <div class="text-sm font-medium text-slate-900">
                          Dr. David Kim
                        </div>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      Orthopedics
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-3 h-3 rounded-full bg-amber-500 mr-2"
                        ></div>
                        <span class="text-sm text-slate-900">Busy</span>
                      </div>
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      4:15 PM
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-slate-900"
                    >
                      7 today
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Patients Section -->
        <div class="p-6 hidden" id="patients">
          <div class="bg-white rounded shadow mb-6">
            <div
              class="p-5 border-b border-slate-100 flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold text-slate-900">
                Patient Management
              </h3>
              <div class="flex items-center space-x-3">
                <div class="relative">
                  <input
                    type="text"
                    placeholder="Search patients..."
                    class="py-2 pl-10 pr-4 w-64 rounded-button border border-slate-200 focus:outline-none focus:border-primary text-sm"
                  />
                  <div
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-slate-400"
                  >
                    <i class="ri-search-line"></i>
                  </div>
                </div>
                <button
                  class="flex items-center justify-center px-4 py-2 bg-primary text-white rounded-button text-sm font-medium hover:bg-blue-700 whitespace-nowrap"
                >
                  <div class="w-4 h-4 flex items-center justify-center mr-2">
                    <i class="ri-add-line"></i>
                  </div>
                  Add Patient
                </button>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-slate-50">
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-2" />
                        Patient
                      </div>
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Contact
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Medical History
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Last Visit
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-primary mr-3"
                        >
                          <span class="font-medium text-sm">EB</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Emma Brown
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1024</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        emma.brown@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 123-4567
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Hypertension, Diabetes
                      </div>
                      <div class="text-xs text-slate-500">
                        Allergies: Penicillin
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">April 28, 2025</div>
                      <div class="text-xs text-slate-500">Dr. Michael Chen</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-emerald-600 mr-3"
                        >
                          <span class="font-medium text-sm">JD</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            James Davis
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0987</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        james.davis@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 987-6543
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">Migraine, Asthma</div>
                      <div class="text-xs text-slate-500">Allergies: None</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 1, 2025</div>
                      <div class="text-xs text-slate-500">
                        Dr. Sarah Johnson
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3"
                        >
                          <span class="font-medium text-sm">SW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Sophia Williams
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1122</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        sophia.w@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 234-5678
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Eczema, Seasonal Allergies
                      </div>
                      <div class="text-xs text-slate-500">
                        Allergies: Sulfa drugs
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">April 15, 2025</div>
                      <div class="text-xs text-slate-500">
                        Dr. Robert Garcia
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3"
                        >
                          <span class="font-medium text-sm">LM</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Liam Miller
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0934</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        liam.miller@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 876-5432
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Broken arm (healed), ADHD
                      </div>
                      <div class="text-xs text-slate-500">Allergies: None</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 3, 2025</div>
                      <div class="text-xs text-slate-500">Dr. Emily Wilson</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-slate-100 text-slate-800"
                        >Inactive</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 mr-3"
                        >
                          <span class="font-medium text-sm">OT</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Olivia Thompson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1256</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        olivia.t@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 345-6789
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Knee surgery (2024), Arthritis
                      </div>
                      <div class="text-xs text-slate-500">
                        Allergies: Ibuprofen
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">April 22, 2025</div>
                      <div class="text-xs text-slate-500">Dr. David Kim</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-600 mr-3"
                        >
                          <span class="font-medium text-sm">NA</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Noah Anderson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0856</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        noah.a@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 456-7890
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Type 1 Diabetes, Celiac Disease
                      </div>
                      <div class="text-xs text-slate-500">
                        Allergies: Gluten
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 5, 2025</div>
                      <div class="text-xs text-slate-500">Dr. Michael Chen</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 mr-3"
                        >
                          <span class="font-medium text-sm">AW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Ava Wilson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1378</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        ava.wilson@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 567-8901
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        Pregnancy (3rd trimester)
                      </div>
                      <div class="text-xs text-slate-500">
                        Allergies: Shellfish
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">April 30, 2025</div>
                      <div class="text-xs text-slate-500">
                        Dr. Jessica Martinez
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="px-6 py-4 border-t border-slate-100 flex items-center justify-between"
            >
              <div class="text-sm text-slate-500">
                Showing 1 to 7 of 124 patients
              </div>
              <div class="flex items-center space-x-2">
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Previous
                </button>
                <button class="px-3 py-1 rounded bg-primary text-white text-sm">
                  1
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  2
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  3
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  ...
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  18
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Next
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Doctors Section -->
        <div class="p-6 hidden" id="doctors">
          <div class="bg-white rounded shadow mb-6">
            <div
              class="p-5 border-b border-slate-100 flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold text-slate-900">
                Doctor Management
              </h3>
              <div class="flex items-center space-x-3">
                <div class="relative">
                  <input
                    type="text"
                    placeholder="Search doctors..."
                    class="py-2 pl-10 pr-4 w-64 rounded-button border border-slate-200 focus:outline-none focus:border-primary text-sm"
                  />
                  <div
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-slate-400"
                  >
                    <i class="ri-search-line"></i>
                  </div>
                </div>
                <button
                  class="flex items-center justify-center px-4 py-2 bg-primary text-white rounded-button text-sm font-medium hover:bg-blue-700 whitespace-nowrap"
                >
                  <div class="w-4 h-4 flex items-center justify-center mr-2">
                    <i class="ri-add-line"></i>
                  </div>
                  Add Doctor
                </button>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-slate-50">
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-2" />
                        Doctor
                      </div>
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Specialty
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Contact
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Available Hours
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">MC</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. Michael Chen
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0045</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Cardiology</div>
                      <div class="text-xs text-slate-500">Heart & Vascular</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        michael.chen@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 123-7890
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Mon-Fri: 9:00 AM - 5:00 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Sat: 9:00 AM - 12:00 PM
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">SJ</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. Sarah Johnson
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0032</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Neurology</div>
                      <div class="text-xs text-slate-500">Brain & Nerve</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        sarah.johnson@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 234-5678
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Mon, Wed, Fri: 8:00 AM - 4:00 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Thu: 10:00 AM - 6:00 PM
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">RG</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. Robert Garcia
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0058</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dermatology</div>
                      <div class="text-xs text-slate-500">Skin & Hair</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        robert.garcia@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 345-6789
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Tue, Thu: 9:00 AM - 5:00 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Sat: 10:00 AM - 2:00 PM
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-slate-100 text-slate-800"
                        >On Leave</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">EW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. Emily Wilson
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0023</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Pediatrics</div>
                      <div class="text-xs text-slate-500">
                        Children's Health
                      </div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        emily.wilson@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 456-7890
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Mon-Fri: 8:30 AM - 4:30 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Wed: 10:00 AM - 6:00 PM
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">DK</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. David Kim
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0067</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Orthopedics</div>
                      <div class="text-xs text-slate-500">Bone & Joint</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        david.kim@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 567-8901
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Mon, Tue, Thu, Fri: 9:00 AM - 5:00 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Surgery Days: Wed
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <div
                          class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 mr-3"
                        >
                          <span class="font-medium text-sm">JM</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Dr. Jessica Martinez
                          </div>
                          <div class="text-xs text-slate-500">ID: D-0039</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Obstetrics & Gynecology
                      </div>
                      <div class="text-xs text-slate-500">Women's Health</div>
                    </td>
                    <td class="px-6 py-4">
                      <div class="text-sm text-slate-900">
                        jessica.m@example.com
                      </div>
                      <div class="text-xs text-slate-500">
                        +1 (555) 678-9012
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Mon, Wed, Fri: 9:00 AM - 5:00 PM
                      </div>
                      <div class="text-xs text-slate-500">
                        Tue: 12:00 PM - 8:00 PM
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Active</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="px-6 py-4 border-t border-slate-100 flex items-center justify-between"
            >
              <div class="text-sm text-slate-500">
                Showing 1 to 6 of 64 doctors
              </div>
              <div class="flex items-center space-x-2">
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Previous
                </button>
                <button class="px-3 py-1 rounded bg-primary text-white text-sm">
                  1
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  2
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  3
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  ...
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  11
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Next
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Appointments Section -->
        <div class="p-6 hidden" id="appointments">
          <div class="bg-white rounded shadow mb-6">
            <div
              class="p-5 border-b border-slate-100 flex justify-between items-center"
            >
              <h3 class="text-lg font-semibold text-slate-900">
                Appointment Management
              </h3>
              <div class="flex items-center space-x-3">
                <div class="relative">
                  <input
                    type="text"
                    placeholder="Search appointments..."
                    class="py-2 pl-10 pr-4 w-64 rounded-button border border-slate-200 focus:outline-none focus:border-primary text-sm"
                  />
                  <div
                    class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center text-slate-400"
                  >
                    <i class="ri-search-line"></i>
                  </div>
                </div>
                <button
                  class="flex items-center justify-center px-4 py-2 bg-primary text-white rounded-button text-sm font-medium hover:bg-blue-700 whitespace-nowrap"
                >
                  <div class="w-4 h-4 flex items-center justify-center mr-2">
                    <i class="ri-add-line"></i>
                  </div>
                  New Appointment
                </button>
              </div>
            </div>
            <div class="p-5 border-b border-slate-100 flex flex-wrap gap-4">
              <div class="flex items-center">
                <label class="text-sm text-slate-700 mr-2">Status:</label>
                <div class="relative">
                  <button
                    class="flex items-center justify-between bg-white border border-slate-200 rounded-button py-2 px-3 w-40 text-sm text-left"
                  >
                    <span>All Statuses</span>
                    <div class="w-4 h-4 flex items-center justify-center">
                      <i class="ri-arrow-down-s-line"></i>
                    </div>
                  </button>
                </div>
              </div>
              <div class="flex items-center">
                <label class="text-sm text-slate-700 mr-2">Doctor:</label>
                <div class="relative">
                  <button
                    class="flex items-center justify-between bg-white border border-slate-200 rounded-button py-2 px-3 w-40 text-sm text-left"
                  >
                    <span>All Doctors</span>
                    <div class="w-4 h-4 flex items-center justify-center">
                      <i class="ri-arrow-down-s-line"></i>
                    </div>
                  </button>
                </div>
              </div>
              <div class="flex items-center">
                <label class="text-sm text-slate-700 mr-2">Date Range:</label>
                <div class="relative">
                  <input
                    type="text"
                    placeholder="Start date"
                    class="py-2 px-3 w-32 rounded-button border border-slate-200 focus:outline-none focus:border-primary text-sm"
                  />
                </div>
                <span class="mx-2 text-slate-400">-</span>
                <div class="relative">
                  <input
                    type="text"
                    placeholder="End date"
                    class="py-2 px-3 w-32 rounded-button border border-slate-200 focus:outline-none focus:border-primary text-sm"
                  />
                </div>
              </div>
              <button
                class="flex items-center justify-center px-4 py-2 bg-slate-100 text-slate-700 rounded-button text-sm font-medium hover:bg-slate-200 whitespace-nowrap"
              >
                <div class="w-4 h-4 flex items-center justify-center mr-2">
                  <i class="ri-filter-line"></i>
                </div>
                Apply Filters
              </button>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="bg-slate-50">
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-2" />
                        Appointment ID
                      </div>
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Patient
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Doctor
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Date & Time
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Type
                    </th>
                    <th
                      class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Status
                    </th>
                    <th
                      class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider"
                    >
                      Actions
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-001</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-primary mr-3"
                        >
                          <span class="font-medium text-sm">EB</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Emma Brown
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1024</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. Michael Chen</div>
                      <div class="text-xs text-slate-500">Cardiology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">10:30 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Follow-up</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-002</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-emerald-600 mr-3"
                        >
                          <span class="font-medium text-sm">JD</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            James Davis
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0987</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Dr. Sarah Johnson
                      </div>
                      <div class="text-xs text-slate-500">Neurology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">11:45 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">New Patient</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800"
                        >Pending</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-003</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3"
                        >
                          <span class="font-medium text-sm">SW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Sophia Williams
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1122</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Dr. Robert Garcia
                      </div>
                      <div class="text-xs text-slate-500">Dermatology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">2:15 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Consultation</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-004</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 mr-3"
                        >
                          <span class="font-medium text-sm">LM</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Liam Miller
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0934</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. Emily Wilson</div>
                      <div class="text-xs text-slate-500">Pediatrics</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 8, 2025</div>
                      <div class="text-xs text-slate-500">3:30 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Check-up</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800"
                        >Cancelled</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-slate-400 cursor-not-allowed mr-3">
                        Edit
                      </button>
                      <button class="text-slate-400 cursor-not-allowed">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-005</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 mr-3"
                        >
                          <span class="font-medium text-sm">OT</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Olivia Thompson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1256</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. David Kim</div>
                      <div class="text-xs text-slate-500">Orthopedics</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 9, 2025</div>
                      <div class="text-xs text-slate-500">9:00 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Follow-up</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-006</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-600 mr-3"
                        >
                          <span class="font-medium text-sm">NA</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Noah Anderson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-0856</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Dr. Michael Chen</div>
                      <div class="text-xs text-slate-500">Cardiology</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 9, 2025</div>
                      <div class="text-xs text-slate-500">11:15 AM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">Consultation</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-amber-100 text-amber-800"
                        >Pending</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                  <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <input type="checkbox" class="mr-3" />
                        <span class="text-sm text-slate-900"
                          >#APT-2505-007</span
                        >
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div
                          class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 mr-3"
                        >
                          <span class="font-medium text-sm">AW</span>
                        </div>
                        <div>
                          <div class="text-sm font-medium text-slate-900">
                            Ava Wilson
                          </div>
                          <div class="text-xs text-slate-500">ID: P-1378</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Dr. Jessica Martinez
                      </div>
                      <div class="text-xs text-slate-500">
                        Obstetrics & Gynecology
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">May 9, 2025</div>
                      <div class="text-xs text-slate-500">2:30 PM</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-slate-900">
                        Prenatal Check-up
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 py-1 text-xs rounded-full bg-emerald-100 text-emerald-800"
                        >Confirmed</span
                      >
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                    >
                      <button class="text-primary hover:text-blue-700 mr-3">
                        View
                      </button>
                      <button class="text-secondary hover:text-indigo-700 mr-3">
                        Edit
                      </button>
                      <button class="text-red-500 hover:text-red-700">
                        Cancel
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div
              class="px-6 py-4 border-t border-slate-100 flex items-center justify-between"
            >
              <div class="text-sm text-slate-500">
                Showing 1 to 7 of 42 appointments
              </div>
              <div class="flex items-center space-x-2">
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Previous
                </button>
                <button class="px-3 py-1 rounded bg-primary text-white text-sm">
                  1
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  2
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  3
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  ...
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  6
                </button>
                <button
                  class="px-3 py-1 rounded border border-slate-200 text-slate-500 hover:bg-slate-50 text-sm"
                >
                  Next
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <!-- Delete Confirmation Modal -->
    <div
      class="fixed inset-0 bg-slate-900 bg-opacity-50 z-50 hidden"
      id="deleteModal"
    >
      <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
          <div class="p-6">
            <div
              class="flex items-center justify-center w-12 h-12 rounded-full bg-red-100 text-red-500 mx-auto mb-4"
            >
              <i class="ri-error-warning-line text-xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-slate-900 text-center mb-2">
              Confirm Deletion
            </h3>
            <p class="text-slate-600 text-center mb-6">
              Are you sure you want to delete this item? This action cannot be
              undone.
            </p>
            <div class="flex justify-center space-x-3">
              <button
                class="px-4 py-2 bg-slate-100 text-slate-700 rounded-button text-sm font-medium hover:bg-slate-200 whitespace-nowrap"
                id="cancelDelete"
              >
                Cancel
              </button>
              <button
                class="px-4 py-2 bg-red-500 text-white rounded-button text-sm font-medium hover:bg-red-600 whitespace-nowrap"
                id="confirmDelete"
              >
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Initialize ECharts for Appointments Overview
        const appointmentsChart = echarts.init(
          document.getElementById("appointmentsChart"),
        );
        const appointmentsOption = {
          animation: false,
          tooltip: {
            trigger: "axis",
            backgroundColor: "rgba(255, 255, 255, 0.9)",
            borderColor: "#e2e8f0",
            borderWidth: 1,
            textStyle: {
              color: "#1f2937",
            },
          },
          grid: {
            left: "3%",
            right: "4%",
            bottom: "3%",
            top: "3%",
            containLabel: true,
          },
          xAxis: {
            type: "category",
            boundaryGap: false,
            data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            axisLine: {
              lineStyle: {
                color: "#e2e8f0",
              },
            },
            axisLabel: {
              color: "#1f2937",
            },
          },
          yAxis: {
            type: "value",
            axisLine: {
              show: false,
            },
            axisTick: {
              show: false,
            },
            splitLine: {
              lineStyle: {
                color: "#e2e8f0",
              },
            },
            axisLabel: {
              color: "#1f2937",
            },
          },
          series: [
            {
              name: "Appointments",
              type: "line",
              smooth: true,
              symbol: "none",
              lineStyle: {
                width: 3,
                color: "rgba(87, 181, 231, 1)",
              },
              areaStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                  {
                    offset: 0,
                    color: "rgba(87, 181, 231, 0.2)",
                  },
                  {
                    offset: 1,
                    color: "rgba(87, 181, 231, 0.05)",
                  },
                ]),
              },
              data: [8, 12, 15, 9, 11, 5, 3],
            },
            {
              name: "Completed",
              type: "line",
              smooth: true,
              symbol: "none",
              lineStyle: {
                width: 3,
                color: "rgba(141, 211, 199, 1)",
              },
              areaStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
                  {
                    offset: 0,
                    color: "rgba(141, 211, 199, 0.2)",
                  },
                  {
                    offset: 1,
                    color: "rgba(141, 211, 199, 0.05)",
                  },
                ]),
              },
              data: [7, 10, 12, 8, 9, 4, 2],
            },
          ],
        };
        appointmentsChart.setOption(appointmentsOption);
        // Initialize ECharts for Specialties Chart
        const specialtiesChart = echarts.init(
          document.getElementById("specialtiesChart"),
        );
        const specialtiesOption = {
          animation: false,
          tooltip: {
            trigger: "item",
            backgroundColor: "rgba(255, 255, 255, 0.9)",
            borderColor: "#e2e8f0",
            borderWidth: 1,
            textStyle: {
              color: "#1f2937",
            },
          },
          legend: {
            orient: "vertical",
            right: 10,
            top: "center",
            textStyle: {
              color: "#1f2937",
            },
          },
          series: [
            {
              name: "Appointments",
              type: "pie",
              radius: ["45%", "70%"],
              center: ["40%", "50%"],
              avoidLabelOverlap: false,
              itemStyle: {
                borderRadius: 8,
                borderColor: "#fff",
                borderWidth: 2,
              },
              label: {
                show: false,
              },
              emphasis: {
                label: {
                  show: false,
                },
              },
              labelLine: {
                show: false,
              },
              data: [
                {
                  value: 28,
                  name: "Cardiology",
                  itemStyle: { color: "rgba(87, 181, 231, 1)" },
                },
                {
                  value: 22,
                  name: "Neurology",
                  itemStyle: { color: "rgba(141, 211, 199, 1)" },
                },
                {
                  value: 18,
                  name: "Orthopedics",
                  itemStyle: { color: "rgba(251, 191, 114, 1)" },
                },
                {
                  value: 15,
                  name: "Dermatology",
                  itemStyle: { color: "rgba(252, 141, 98, 1)" },
                },
                { value: 12, name: "Pediatrics", itemStyle: { color: "#a3a1fb" } },
                { value: 5, name: "Others", itemStyle: { color: "#e2e8f0" } },
              ],
            },
          ],
        };
        specialtiesChart.setOption(specialtiesOption);
        // Resize charts when window is resized
        window.addEventListener("resize", function () {
          appointmentsChart.resize();
          specialtiesChart.resize();
        });
        // Navigation functionality
        const navLinks = document.querySelectorAll("nav a");
        const sections = document.querySelectorAll("main > div[id]");
        const header = document.querySelector("header h1");
        navLinks.forEach((link) => {
          link.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            // Update active navigation
            navLinks.forEach((navLink) => {
              navLink.classList.remove("bg-primary", "text-white");
              navLink.classList.add(
                "text-slate-300",
                
                "hover:text-primary",
              );
            });
            this.classList.remove(
              "text-slate-300",
              "hover:bg-slate-800",
              "hover:text-white",
            );
            this.classList.add("text-primary", "font-medium");
            // Update visible section
            sections.forEach((section) => {
              section.classList.add("hidden");
            });
            document.getElementById(targetId).classList.remove("hidden");
            // Update header title
            header.textContent = this.querySelector("span").textContent;
          });
        });
        // Delete modal functionality
        const deleteButtons = document.querySelectorAll(
          "button:not(#cancelDelete):not(#confirmDelete)",
        );
        const deleteModal = document.getElementById("deleteModal");
        const cancelDelete = document.getElementById("cancelDelete");
        const confirmDelete = document.getElementById("confirmDelete");
        deleteButtons.forEach((button) => {
          if (
            button.textContent.trim() === "Delete" ||
            button.textContent.trim() === "Cancel"
          ) {
            button.addEventListener("click", function () {
              deleteModal.classList.remove("hidden");
            });
          }
        });
        cancelDelete.addEventListener("click", function () {
          deleteModal.classList.add("hidden");
        });
        confirmDelete.addEventListener("click", function () {
          // Here you would add the actual delete functionality
          deleteModal.classList.add("hidden");
          // Show a success notification or update the UI
        });
        // Close modal when clicking outside
        deleteModal.addEventListener("click", function (e) {
          if (e.target === deleteModal) {
            deleteModal.classList.add("hidden");
          }
        });
      });
    </script>
  </body>
</html>
