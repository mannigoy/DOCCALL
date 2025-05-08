<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#2196F3", secondary: "#4CAF50" },
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
          background-color: #F5F7FA;
      }
      .status-requesting { background-color: rgba(255, 152, 0, 0.1); color: #FF9800; }
      .status-approved { background-color: rgba(76, 175, 80, 0.1); color: #4CAF50; }
      .status-denied { background-color: rgba(244, 67, 54, 0.1); color: #F44336; }
      .status-cancelled { background-color: rgba(158, 158, 158, 0.1); color: #9E9E9E; }
      .status-completed { background-color: rgba(33, 150, 243, 0.1); color: #2196F3; }

      input[type="checkbox"] {
          appearance: none;
          width: 1.25rem;
          height: 1.25rem;
          border: 2px solid #d1d5db;
          border-radius: 4px;
          position: relative;
          cursor: pointer;
      }

      input[type="checkbox"]:checked {
          background-color: #2196F3;
          border-color: #2196F3;
      }

      input[type="checkbox"]:checked::after {
          content: "";
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%) rotate(45deg);
          width: 0.25rem;
          height: 0.5rem;
          border-bottom: 2px solid white;
          border-right: 2px solid white;
      }

      input[type="date"], input[type="time"] {
          appearance: none;
          padding: 0.5rem 0.75rem;
          border: 1px solid #d1d5db;
          border-radius: 8px;
          background-color: white;
      }

      input[type="date"]::-webkit-calendar-picker-indicator,
      input[type="time"]::-webkit-calendar-picker-indicator {
          filter: invert(0.5);
      }

      .switch {
          position: relative;
          display: inline-block;
          width: 3rem;
          height: 1.5rem;
      }

      .switch input {
          opacity: 0;
          width: 0;
          height: 0;
      }

      .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          transition: .4s;
          border-radius: 34px;
      }

      .slider:before {
          position: absolute;
          content: "";
          height: 1.1rem;
          width: 1.1rem;
          left: 0.2rem;
          bottom: 0.2rem;
          background-color: white;
          transition: .4s;
          border-radius: 50%;
      }

      input:checked + .slider {
          background-color: #2196F3;
      }

      input:checked + .slider:before {
          transform: translateX(1.5rem);
      }

      .modal {
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
          z-index: 50;
      }

      .dropdown-menu {
          display: none;
          position: absolute;
          right: 0;
          top: 100%;
          background-color: white;
          border-radius: 8px;
          box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
          z-index: 10;
          min-width: 10rem;
      }
    </style>
  </head>
  <body>
    <div class="flex h-screen">
      <!-- Sidebar -->
      <div class="w-64 bg-white shadow-md flex flex-col">
        <div class="p-4 flex items-center">
          <span class="text-2xl font-['Pacifico'] text-primary">logo</span>
          <span class="ml-2 text-gray-800 font-medium">MedConnect</span>
        </div>

        <nav class="flex-1 pt-6">
          <div class="px-4 mb-4">
            <div
              class="text-xs font-semibold text-gray-400 uppercase tracking-wider"
            >
              Main
            </div>
          </div>

          <a
            href="#"
            class="flex items-center px-4 py-3 text-primary bg-blue-50 border-r-4 border-primary"
          >
            <div class="w-6 h-6 flex items-center justify-center">
              <i class="ri-calendar-line ri-lg"></i>
            </div>
            <span class="ml-3 font-medium">Appointments</span>
          </a>

          <a
            href="#"
            class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50"
          >
            <div class="w-6 h-6 flex items-center justify-center">
              <i class="ri-user-line ri-lg"></i>
            </div>
            <span class="ml-3">Patients</span>
          </a>

          

          

          <div class="px-4 mt-6 mb-4">
            <div
              class="text-xs font-semibold text-gray-400 uppercase tracking-wider"
            >
              Settings
            </div>
          </div>

          <a
            href="#"
            class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50"
          >
            <div class="w-6 h-6 flex items-center justify-center">
              <i class="ri-user-settings-line ri-lg"></i>
            </div>
            <span class="ml-3">Profile</span>
          </a>

          <a
            href="#"
            class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50"
          >
            <div class="w-6 h-6 flex items-center justify-center">
              <i class="ri-settings-3-line ri-lg"></i>
            </div>
            <span class="ml-3">Settings</span>
          </a>
        </nav>

        <div class="p-4 border-t">
          <a href="#" class="flex items-center text-gray-600">
            <div class="w-6 h-6 flex items-center justify-center">
              <i class="ri-logout-box-line ri-lg"></i>
            </div>
            <span class="ml-3">Logout</span>
          </a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm z-10">
          <div class="flex items-center justify-between px-6 py-3">
            <div class="flex items-center">
              <h1 class="text-xl font-semibold text-gray-800">Appointments</h1>
              <div class="ml-6 flex">
                <span class="text-sm text-gray-500">May 6, 2025</span>
                <span class="mx-2 text-gray-300">|</span>
                <span class="text-sm text-gray-500">Tuesday</span>
              </div>
            </div>

            <div class="flex items-center space-x-4">
              <div class="relative">
                <button
                  class="relative p-1 text-gray-400 hover:text-gray-600 focus:outline-none"
                >
                  <div class="w-6 h-6 flex items-center justify-center">
                    <i class="ri-notification-3-line ri-lg"></i>
                  </div>
                  <span
                    class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full flex items-center justify-center text-xs text-white"
                    >3</span
                  >
                </button>
              </div>

              <div class="flex items-center">
                <img
                  class="h-8 w-8 rounded-full object-cover"
                  src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520male%2520doctor%2520with%2520glasses%2520wearing%2520a%2520white%2520coat%2520with%2520stethoscope%2520around%2520neck%2520looking%2520confident%2520and%2520approachable%2520with%2520a%2520warm%2520smile%2520on%2520neutral%2520background&width=100&height=100&seq=123&orientation=squarish"
                  alt="Doctor profile"
                />
                <div class="ml-2">
                  <div class="text-sm font-medium text-gray-800">
                    Dr. FIRST NAME LAST NAME
                  </div>
                  <div class="text-xs text-gray-500">Cardiologist</div>
                </div>
                <button class="ml-2 text-gray-400 hover:text-gray-600">
                  <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-arrow-down-s-line"></i>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </header>

        <!-- Dashboard Stats -->
        <div class="bg-white border-b">
          <div class="px-6 py-4 grid grid-cols-4 gap-4">
            <div class="bg-blue-50 rounded p-4">
              <div class="flex items-center">
                <div
                  class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-primary"
                >
                  <i class="ri-calendar-check-line ri-lg"></i>
                </div>
                <div class="ml-3">
                  <div class="text-sm text-gray-500">Today's Appointments</div>
                  <div class="text-xl font-semibold">8</div>
                </div>
              </div>
            </div>

            <div class="bg-orange-50 rounded p-4">
              <div class="flex items-center">
                <div
                  class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-500"
                >
                  <i class="ri-time-line ri-lg"></i>
                </div>
                <div class="ml-3">
                  <div class="text-sm text-gray-500">Pending Requests</div>
                  <div class="text-xl font-semibold">3</div>
                </div>
              </div>
            </div>

            <div class="bg-green-50 rounded p-4">
              <div class="flex items-center">
                <div
                  class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-500"
                >
                  <i class="ri-check-line ri-lg"></i>
                </div>
                <div class="ml-3">
                  <div class="text-sm text-gray-500">Completed Today</div>
                  <div class="text-xl font-semibold">5</div>
                </div>
              </div>
            </div>

            <div class="bg-purple-50 rounded p-4">
              <div class="flex items-center">
                <div
                  class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-500"
                >
                  <i class="ri-user-line ri-lg"></i>
                </div>
                <div class="ml-3">
                  <div class="text-sm text-gray-500">Total Patients</div>
                  <div class="text-xl font-semibold">247</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-auto p-6">
          <!-- Filters -->
          <div class="mb-6 flex justify-between items-center">
            <div class="flex space-x-2">
              <div class="relative">
                <input
                  type="text"
                  placeholder="Search patients..."
                  class="pl-10 pr-4 py-2 border-none bg-white rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50"
                />
                <div class="absolute left-3 top-2.5 text-gray-400">
                  <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-search-line"></i>
                  </div>
                </div>
              </div>

              

            
            </div>

            <button
              class="px-4 py-2 bg-primary text-white rounded shadow-sm flex items-center space-x-2 hover:bg-blue-600 focus:outline-none !rounded-button whitespace-nowrap"
            >
              <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-add-line"></i>
              </div>
              <span>New Appointment</span>
            </button>
          </div>

          <!-- Tabs -->
          <div class="mb-6 border-b">
            <div class="flex space-x-8">
              <button
                class="pb-4 text-primary border-b-2 border-primary font-medium flex items-center"
              >
                <span>Requesting</span>
                <span
                  class="ml-2 bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 text-xs font-medium"
                  >3</span
                >
              </button>

              <button
                class="pb-4 text-gray-500 hover:text-gray-700 font-medium flex items-center"
              >
                <span>Approved</span>
                <span
                  class="ml-2 bg-green-100 text-green-600 rounded-full px-2 py-0.5 text-xs font-medium"
                  >12</span
                >
              </button>

              <button
                class="pb-4 text-gray-500 hover:text-gray-700 font-medium flex items-center"
              >
                <span>Denied</span>
                <span
                  class="ml-2 bg-red-100 text-red-600 rounded-full px-2 py-0.5 text-xs font-medium"
                  >2</span
                >
              </button>

              <button
                class="pb-4 text-gray-500 hover:text-gray-700 font-medium flex items-center"
              >
                <span>Cancelled</span>
                <span
                  class="ml-2 bg-gray-100 text-gray-600 rounded-full px-2 py-0.5 text-xs font-medium"
                  >5</span
                >
              </button>

              <button
                class="pb-4 text-gray-500 hover:text-gray-700 font-medium flex items-center"
              >
                <span>Completed</span>
                <span
                  class="ml-2 bg-blue-100 text-blue-600 rounded-full px-2 py-0.5 text-xs font-medium"
                  >187</span
                >
              </button>
            </div>
          </div>

          <!-- Appointment Table -->
          <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Patient
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Date & Time
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Reason
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Status
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520young%2520woman%2520with%2520brown%2520hair%2520and%2520a%2520friendly%2520smile%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=124&orientation=squarish"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Emily Johnson
                        </div>
                        <div class="text-sm text-gray-500">
                          32 years • Female
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">May 7, 2025</div>
                    <div class="text-sm text-gray-500">10:30 AM - 11:00 AM</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      Annual checkup and blood pressure monitoring
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full status-requesting"
                    >
                      Requesting
                    </span>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <div class="flex justify-end space-x-2">
                      <button
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Approve
                      </button>
                      <button
                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Deny
                      </button>
                      <div class="relative">
                        <button
                          class="px-2 py-1 text-gray-500 rounded hover:bg-gray-100 focus:outline-none"
                          onclick="toggleDropdown('dropdown1')"
                        >
                          <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-2-fill"></i>
                          </div>
                        </button>
                        <div id="dropdown1" class="dropdown-menu">
                          <div class="py-1">
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              onclick="openEditModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-edit-line"></i>
                                </div>
                                <span class="ml-2">Edit</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                              onclick="openCancelModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-close-circle-line"></i>
                                </div>
                                <span class="ml-2">Cancel</span>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520an%2520elderly%2520man%2520with%2520gray%2520hair%2520and%2520glasses%2520smiling%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=125&orientation=squarish"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Robert Williams
                        </div>
                        <div class="text-sm text-gray-500">68 years • Male</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">May 7, 2025</div>
                    <div class="text-sm text-gray-500">1:00 PM - 1:30 PM</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      Follow-up on heart medication and ECG results
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full status-requesting"
                    >
                      Requesting
                    </span>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <div class="flex justify-end space-x-2">
                      <button
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Approve
                      </button>
                      <button
                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Deny
                      </button>
                      <div class="relative">
                        <button
                          class="px-2 py-1 text-gray-500 rounded hover:bg-gray-100 focus:outline-none"
                          onclick="toggleDropdown('dropdown2')"
                        >
                          <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-2-fill"></i>
                          </div>
                        </button>
                        <div id="dropdown2" class="dropdown-menu">
                          <div class="py-1">
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              onclick="openEditModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-edit-line"></i>
                                </div>
                                <span class="ml-2">Edit</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                              onclick="openCancelModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-close-circle-line"></i>
                                </div>
                                <span class="ml-2">Cancel</span>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520middle-aged%2520woman%2520with%2520short%2520blonde%2520hair%2520and%2520a%2520confident%2520smile%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=126&orientation=squarish"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Sarah Thompson
                        </div>
                        <div class="text-sm text-gray-500">
                          45 years • Female
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">May 8, 2025</div>
                    <div class="text-sm text-gray-500">9:00 AM - 9:30 AM</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      Chest pain and shortness of breath
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full status-requesting"
                    >
                      Requesting
                    </span>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <div class="flex justify-end space-x-2">
                      <button
                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Approve
                      </button>
                      <button
                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none !rounded-button whitespace-nowrap"
                      >
                        Deny
                      </button>
                      <div class="relative">
                        <button
                          class="px-2 py-1 text-gray-500 rounded hover:bg-gray-100 focus:outline-none"
                          onclick="toggleDropdown('dropdown3')"
                        >
                          <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-2-fill"></i>
                          </div>
                        </button>
                        <div id="dropdown3" class="dropdown-menu">
                          <div class="py-1">
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              onclick="openEditModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-edit-line"></i>
                                </div>
                                <span class="ml-2">Edit</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                              onclick="openCancelModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-close-circle-line"></i>
                                </div>
                                <span class="ml-2">Cancel</span>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50 bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520young%2520man%2520with%2520dark%2520hair%2520and%2520a%2520friendly%2520expression%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=127&orientation=squarish"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          Daniel Rodriguez
                        </div>
                        <div class="text-sm text-gray-500">29 years • Male</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">May 6, 2025</div>
                    <div class="text-sm text-gray-500">2:30 PM - 3:00 PM</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      Consultation for heart palpitations
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full status-approved"
                    >
                      Approved
                    </span>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <div class="flex justify-end space-x-2">
                      <div class="relative">
                        <button
                          class="px-2 py-1 text-gray-500 rounded hover:bg-gray-100 focus:outline-none"
                          onclick="toggleDropdown('dropdown4')"
                        >
                          <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-2-fill"></i>
                          </div>
                        </button>
                        <div id="dropdown4" class="dropdown-menu">
                          <div class="py-1">
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              onclick="openEditModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-edit-line"></i>
                                </div>
                                <span class="ml-2">Edit</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                              onclick="openCancelModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-close-circle-line"></i>
                                </div>
                                <span class="ml-2">Cancel</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-check-double-line"></i>
                                </div>
                                <span class="ml-2">Mark as Completed</span>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr class="hover:bg-gray-50 bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img
                          class="h-10 w-10 rounded-full"
                          src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520middle-aged%2520man%2520with%2520salt%2520and%2520pepper%2520hair%2520and%2520a%2520warm%2520smile%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=128&orientation=squarish"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          James Wilson
                        </div>
                        <div class="text-sm text-gray-500">52 years • Male</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">May 6, 2025</div>
                    <div class="text-sm text-gray-500">4:00 PM - 4:30 PM</div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-900">
                      Post-surgery follow-up for bypass operation
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full status-approved"
                    >
                      Approved
                    </span>
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <div class="flex justify-end space-x-2">
                      <div class="relative">
                        <button
                          class="px-2 py-1 text-gray-500 rounded hover:bg-gray-100 focus:outline-none"
                          onclick="toggleDropdown('dropdown5')"
                        >
                          <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-2-fill"></i>
                          </div>
                        </button>
                        <div id="dropdown5" class="dropdown-menu">
                          <div class="py-1">
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                              onclick="openEditModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-edit-line"></i>
                                </div>
                                <span class="ml-2">Edit</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                              onclick="openCancelModal()"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-close-circle-line"></i>
                                </div>
                                <span class="ml-2">Cancel</span>
                              </div>
                            </button>
                            <button
                              class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            >
                              <div class="flex items-center">
                                <div
                                  class="w-5 h-5 flex items-center justify-center"
                                >
                                  <i class="ri-check-double-line"></i>
                                </div>
                                <span class="ml-2">Mark as Completed</span>
                              </div>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
              <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                  <a
                    href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                  >
                    Previous
                  </a>
                  <a
                    href="#"
                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                  >
                    Next
                  </a>
                </div>
                <div
                  class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
                >
                  <div>
                    <p class="text-sm text-gray-700">
                      Showing <span class="font-medium">1</span> to
                      <span class="font-medium">5</span> of
                      <span class="font-medium">209</span> results
                    </p>
                  </div>
                  <div>
                    <nav
                      class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                      aria-label="Pagination"
                    >
                      <a
                        href="#"
                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                      >
                        <span class="sr-only">Previous</span>
                        <div class="w-5 h-5 flex items-center justify-center">
                          <i class="ri-arrow-left-s-line"></i>
                        </div>
                      </a>
                      <a
                        href="#"
                        aria-current="page"
                        class="z-10 bg-primary border-primary text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                      >
                        1
                      </a>
                      <a
                        href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                      >
                        2
                      </a>
                      <a
                        href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                      >
                        3
                      </a>
                      <span
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"
                      >
                        ...
                      </span>
                      <a
                        href="#"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                      >
                        42
                      </a>
                      <a
                        href="#"
                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                      >
                        <span class="sr-only">Next</span>
                        <div class="w-5 h-5 flex items-center justify-center">
                          <i class="ri-arrow-right-s-line"></i>
                        </div>
                      </a>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Appointment Modal -->
    <div id="editModal" class="modal">
      <div class="relative w-full max-w-lg mx-auto mt-24">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
          <div
            class="px-6 py-4 bg-primary text-white flex justify-between items-center"
          >
            <h3 class="text-lg font-medium">Edit Appointment</h3>
            <button
              onclick="closeEditModal()"
              class="text-white hover:text-gray-200 focus:outline-none"
            >
              <div class="w-6 h-6 flex items-center justify-center">
                <i class="ri-close-line ri-lg"></i>
              </div>
            </button>
          </div>

          <div class="p-6">
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  class="h-10 w-10 rounded-full"
                  src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520young%2520woman%2520with%2520brown%2520hair%2520and%2520a%2520friendly%2520smile%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=124&orientation=squarish"
                  alt=""
                />
                <div class="ml-3">
                  <div class="text-sm font-medium text-gray-900">
                    Emily Johnson
                  </div>
                  <div class="text-xs text-gray-500">32 years • Female</div>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Appointment Date</label
              >
              <input type="date" class="w-full" value="2025-05-07" />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Appointment Time</label
              >
              <div class="flex space-x-2">
                <div class="flex-1">
                  <label class="block text-xs text-gray-500 mb-1"
                    >Start Time</label
                  >
                  <input type="time" class="w-full" value="10:30" />
                </div>
                <div class="flex-1">
                  <label class="block text-xs text-gray-500 mb-1"
                    >End Time</label
                  >
                  <input type="time" class="w-full" value="11:00" />
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Reason for Visit</label
              >
              <textarea
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50"
                rows="3"
              >
Annual checkup and blood pressure monitoring</textarea
              >
            </div>

            <div class="mb-6">
              <div class="flex items-center justify-between">
                <label class="text-sm font-medium text-gray-700"
                  >Notify Patient of Changes</label
                >
                <label class="switch">
                  <input type="checkbox" checked />
                  <span class="slider"></span>
                </label>
              </div>
            </div>

            <div class="flex justify-end space-x-3">
              <button
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none !rounded-button whitespace-nowrap"
                onclick="closeEditModal()"
              >
                Cancel
              </button>
              <button
                class="px-4 py-2 bg-primary text-white rounded hover:bg-blue-600 focus:outline-none !rounded-button whitespace-nowrap"
              >
                Save Changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cancel Appointment Modal -->
    <div id="cancelModal" class="modal">
      <div class="relative w-full max-w-lg mx-auto mt-24">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
          <div
            class="px-6 py-4 bg-red-500 text-white flex justify-between items-center"
          >
            <h3 class="text-lg font-medium">Cancel Appointment</h3>
            <button
              onclick="closeCancelModal()"
              class="text-white hover:text-gray-200 focus:outline-none"
            >
              <div class="w-6 h-6 flex items-center justify-center">
                <i class="ri-close-line ri-lg"></i>
              </div>
            </button>
          </div>

          <div class="p-6">
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  class="h-10 w-10 rounded-full"
                  src="https://readdy.ai/api/search-image?query=professional%2520headshot%2520of%2520a%2520young%2520woman%2520with%2520brown%2520hair%2520and%2520a%2520friendly%2520smile%2520on%2520a%2520neutral%2520background&width=100&height=100&seq=124&orientation=squarish"
                  alt=""
                />
                <div class="ml-3">
                  <div class="text-sm font-medium text-gray-900">
                    Emily Johnson
                  </div>
                  <div class="text-xs text-gray-500">
                    May 7, 2025 • 10:30 AM - 11:00 AM
                  </div>
                </div>
              </div>
            </div>

            <div class="mb-6">
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Reason for Cancellation</label
              >
              <textarea
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                rows="3"
                placeholder="Please provide a reason for cancellation..."
              ></textarea>
            </div>

            <div class="mb-6">
              <div class="flex items-center">
                <input type="checkbox" id="notifyPatient" class="mr-2" />
                <label for="notifyPatient" class="text-sm text-gray-700"
                  >Notify patient about cancellation</label
                >
              </div>
            </div>

            <div class="flex justify-end space-x-3">
              <button
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 focus:outline-none !rounded-button whitespace-nowrap"
                onclick="closeCancelModal()"
              >
                Go Back
              </button>
              <button
                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none !rounded-button whitespace-nowrap"
              >
                Confirm Cancellation
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const allDropdowns = document.querySelectorAll(".dropdown-menu");

        allDropdowns.forEach((menu) => {
          if (menu.id !== id) {
            menu.style.display = "none";
          }
        });

        if (dropdown.style.display === "block") {
          dropdown.style.display = "none";
        } else {
          dropdown.style.display = "block";
        }
      }

      function openEditModal() {
        document.getElementById("editModal").style.display = "block";
        closeAllDropdowns();
      }

      function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
      }

      function openCancelModal() {
        document.getElementById("cancelModal").style.display = "block";
        closeAllDropdowns();
      }

      function closeCancelModal() {
        document.getElementById("cancelModal").style.display = "none";
      }

      function closeAllDropdowns() {
        const allDropdowns = document.querySelectorAll(".dropdown-menu");
        allDropdowns.forEach((menu) => {
          menu.style.display = "none";
        });
      }

      document.addEventListener("DOMContentLoaded", function () {
        document.addEventListener("click", function (event) {
          const dropdowns = document.querySelectorAll(".dropdown-menu");
          let clickedOnDropdown = false;

          dropdowns.forEach((dropdown) => {
            if (dropdown.contains(event.target)) {
              clickedOnDropdown = true;
            }
          });

          const dropdownButtons = document.querySelectorAll(
            '[onclick^="toggleDropdown"]',
          );
          let clickedOnDropdownButton = false;

          dropdownButtons.forEach((button) => {
            if (button.contains(event.target)) {
              clickedOnDropdownButton = true;
            }
          });

          if (!clickedOnDropdown && !clickedOnDropdownButton) {
            closeAllDropdowns();
          }
        });

        const modals = document.querySelectorAll(".modal");
        modals.forEach((modal) => {
          modal.addEventListener("click", function (event) {
            if (event.target === modal) {
              modal.style.display = "none";
            }
          });
        });
      });
    </script>
  </body>
</html>
