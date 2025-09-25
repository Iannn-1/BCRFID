<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benedicto College</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #e2e8f0;
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease-in-out;
        }
        .sidebar {
            background-color: #00004d;
            color: white;
            width: 280px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem 1rem;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
            transition: width 0.3s ease-in-out;
            overflow: hidden;
        }
        .sidebar-item {
            padding: 1rem;
            cursor: pointer;
            transition: background-color 0.2s;
            position: relative;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-item.active {
            font-weight: 600;
        }
        .sidebar-item.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 2px;
            background-color: #f97316;
        }
        .main-content {
            flex-grow: 1;
            padding: 2rem;
            margin-left: 280px;
            background-image: url('https://placehold.co/1920x1080/c9d6e4/FFFFFF?text=Background');
            background-size: cover;
            background-position: center;
            transition: margin-left 0.3s ease-in-out;
        }
        .container {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            min-height: calc(100vh - 4rem);
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: white;
            color: #1a202c;
        }
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            border-radius: 8px;
            background-color: #e5f1ff;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        th {
            background-color: #d1e3ff;
            color: #1a202c;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        th:first-child {
            background-color: #ff914d;
        }
        tbody tr:nth-child(odd) {
            background-color: #f1f8ff;
        }
        tbody tr:hover {
            background-color: #c9e2ff;
        }
        .delete-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #ef4444;
            font-size: 1.25rem;
        }
        .delete-btn:hover {
            color: #b91c1c;
        }
        .search-box {
            background-color: #d1e3ff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .add-btn {
            background-color: #004d99;
            color: white;
            padding: 8px 16px;
            border-radius: 9999px;
            box-shadow: 0 4px 6px rgba(0, 77, 153, 0.3);
            transition: transform 0.2s ease-in-out;
            white-space: nowrap;
        }
        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 77, 153, 0.4);
        }
        /* Dashboard-specific colors */
        .stat-card-blue { background: linear-gradient(90deg, #94c4ff 0%, #FFFFFF 100%); }
        .stat-card-yellow { background: linear-gradient(90deg, #e7ff7d 0%, #FFFFFF 100%); }
        .stat-card-pink { background: linear-gradient(90deg, #e191ff 0%, #FFFFFF 100%); }
        .stat-card-green { background: linear-gradient(90deg, #81ffc9 0%, #FFFFFF 100%); }
        .dashboard-table th:first-child {
             background-color: #ff914d;
        }
        .dashboard-table th:not(:first-child) {
            background-color: #d1e3ff;
        }

        .form-input, .form-select {
            background-color: #d1e3ff;
            border: 1px solid #94c4ff;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
        }
        .form-group label {
            font-size: 0.75rem;
            color: #4b5563;
        }
        .form-group-triple {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .form-group-double {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        .done-btn {
            background-color: #d1e3ff;
            color: #3b82f6;
            padding: 8px 32px;
            border-radius: 9999px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            font-weight: 600;
        }
        .done-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        /* Collapsed Sidebar Styles */
        body.collapsed .sidebar {
            width: 80px;
        }
        body.collapsed .main-content {
            margin-left: 80px;
        }
        body.collapsed .sidebar .sidebar-text,
        body.collapsed .sidebar .user-info,
        body.collapsed .sidebar hr,
        body.collapsed .sidebar .ml-auto {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div>
            <div class="flex items-center space-x-2 p-2 cursor-pointer" id="menuBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-400" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                </svg>
            </div>
            <hr class="my-4 border-gray-700">
            <!-- Menu Items -->
            <ul class="space-y-4 pt-4">
                <li class="sidebar-item active" data-content-id="dashboard-content"><span class="sidebar-text">Dashboard</span></li>
                <li class="sidebar-item" data-content-id="student-content"><span class="sidebar-text">Student</span></li>
                <li class="sidebar-item" data-content-id="employee-content"><span class="sidebar-text">Employee</span></li>
                <li class="sidebar-item" data-content-id="settings-content"><span class="sidebar-text">Settings</span></li>
            </ul>
        </div>

        <!-- User Profile -->
        <div class="flex items-center space-x-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <div class="user-info">
                <span class="block text-md font-semibold">Bene Dicto</span>
                <span class="block text-sm text-gray-400">Admin</span>
            </div>
            <button class="ml-auto text-gray-400 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </button>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content" id="mainContent">
        <div id="dashboard-content" class="container p-6 lg:p-10 flex flex-col rounded-lg">
            <header class="bg-[#00004d] text-white p-4 rounded-t-lg flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src="" alt="Benedicto College Logo" class="h-10 w-auto">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold leading-tight">BENEDICTO</span>
                        <span class="text-xl font-bold leading-tight">COLLEGE</span>
                    </div>
                </div>
                <span class="text-lg font-medium">Admin</span>
            </header>
            <div class="flex flex-col flex-grow p-6 space-y-6">
                <!-- Attendance Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="stat-card-blue rounded-xl p-4 shadow-md text-gray-800">
                        <h3 class="text-lg font-semibold">Attendance Rate</h3>
                        <p class="text-4xl font-bold mt-2">100%</p>
                    </div>
                    <div class="stat-card-yellow rounded-xl p-4 shadow-md text-gray-800">
                        <h3 class="text-lg font-semibold">Students Present</h3>
                        <p class="text-4xl font-bold mt-2">99%</p>
                    </div>
                    <div class="stat-card-pink rounded-xl p-4 shadow-md text-gray-800">
                        <h3 class="text-lg font-semibold">Employees Present</h3>
                        <p class="text-4xl font-bold mt-2">98%</p>
                    </div>
                    <div class="stat-card-green rounded-xl p-4 shadow-md text-gray-800">
                        <h3 class="text-lg font-semibold">Recent Absences</h3>
                        <p class="text-4xl font-bold mt-2">97%</p>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="table-container flex-grow p-4">
                    <table class="bg-white rounded-lg dashboard-table">
                        <thead>
                            <tr class="text-sm text-gray-700 uppercase">
                                <th>Date</th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>14 July 2025</td>
                                <td>Bene Dicto</td>
                                <td>2020 - 12345</td>
                                <td>13 : 07</td>
                                <td>13 : 07</td>
                            </tr>
                            <tr>
                                <td>14 July 2025</td>
                                <td>Cuh Ledge</td>
                                <td>2020 - 12345</td>
                                <td>13 : 14</td>
                                <td>13 : 07</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="student-content" class="hidden container p-6 lg:p-10 flex flex-col rounded-lg">
            <header class="bg-[#00004d] text-white p-4 rounded-t-lg flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src="" alt="Benedicto College Logo" class="h-10 w-auto">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold leading-tight">BENEDICTO</span>
                        <span class="text-xl font-bold leading-tight">COLLEGE</span>
                    </div>
                </div>
                <span class="text-lg font-medium">Admin</span>
            </header>
            <div class="flex flex-col flex-grow p-6 space-y-6">
                <!-- Search Bar -->
                <div class="flex items-center search-box p-2">
                    <input type="text" id="studentSearchInput" placeholder="Search..." class="flex-grow bg-transparent outline-none text-gray-700 placeholder-gray-500 px-2 py-1">
                    <button class="bg-blue-400 text-white p-2 rounded-lg ml-2 hover:bg-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <!-- Table -->
                <div class="table-container flex-grow p-4">
                    <table class="bg-white rounded-lg">
                        <thead>
                            <tr class="text-sm text-gray-700 uppercase">
                                <th>Date</th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">
                           
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-end mt-4">
                    <button class="add-btn font-semibold shadow-md hover:shadow-lg transition-shadow duration-300" data-target-tab="student-content">
                        Add new account
                    </button>
                </div>
            </div>
        </div>

        <div id="employee-content" class="hidden container p-6 lg:p-10 flex flex-col rounded-lg">
            <header class="bg-[#00004d] text-white p-4 rounded-t-lg flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src="" alt="Benedicto College Logo" class="h-10 w-auto">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold leading-tight">BENEDICTO</span>
                        <span class="text-xl font-bold leading-tight">COLLEGE</span>
                    </div>
                </div>
                <span class="text-lg font-medium">Admin</span>
            </header>
            <div class="flex flex-col flex-grow p-6 space-y-6">
                <!-- SearchBar -->
                <div class="flex items-center search-box p-2">
                    <input type="text" id="employeeSearchInput" placeholder="Search..." class="flex-grow bg-transparent outline-none text-gray-700 placeholder-gray-500 px-2 py-1">
                    <button class="bg-blue-400 text-white p-2 rounded-lg ml-2 hover:bg-blue-500 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <!-- Table -->
                <div class="table-container flex-grow p-4">
                    <table class="bg-white rounded-lg">
                        <thead>
                            <tr class="text-sm text-gray-700 uppercase">
                                <th>Date</th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody">
                           
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-end mt-4">
                    <button class="add-btn font-semibold shadow-md hover:shadow-lg transition-shadow duration-300" data-target-tab="employee-content">
                        Add new account
                    </button>
                </div>
            </div>
        </div>

        <div id="add-account-content" class="hidden container p-6 lg:p-10 flex flex-col rounded-lg">
            <div class="flex items-center space-x-2 text-xl font-bold text-gray-600 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" id="backBtn" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                <span>Add new account</span>
            </div>
            
            <form class="space-y-6">
                <!-- Name -->
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                    <div class="form-group">
                        <label for="lastName" class="block">LAST NAME</label>
                        <input type="text" id="lastName" class="form-input" placeholder="Tomaquin" />
                    </div>
                    <div class="form-group">
                        <label for="firstName" class="block">FIRST NAME</label>
                        <input type="text" id="firstName" class="form-input" placeholder="Zoilo Jay" />
                    </div>
                    <div class="form-group">
                        <label for="middleName" class="block">MIDDLE NAME</label>
                        <input type="text" id="middleName" class="form-input" placeholder="WABALO" />
                    </div>
                    <div class="form-group">
                        <label for="suffix" class="block">SUFFIX</label>
                        <input type="text" id="suffix" class="form-input" placeholder="I" />
                    </div>
                </div>

                <!-- Department, Level, Position -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="form-group">
                        <label for="department" class="block">DEPARTMENT</label>
                        <select id="department" class="form-select">
                            <option>Dropdown field data</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level" class="block">LEVEL</label>
                        <select id="level" class="form-select">
                            <option>Dropdown field data</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position" class="block">POSITION (IF EMPLOYEE)</label>
                        <select id="position" class="form-select">
                            <option>Dropdown field data</option>
                        </select>
                    </div>
                </div>

                <!-- ID and Address -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="idNo" class="block">ID NO.</label>
                        <input type="text" id="idNo" class="form-input" placeholder="Text field data" />
                    </div>
                    <div class="form-group">
                        <label for="address" class="block">ADDRESS</label>
                        <input type="text" id="address" class="form-input" placeholder="Text field data" />
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="form-group">
                        <label for="contactPerson" class="block">CONTACT PERSON</label>
                        <input type="text" id="contactPerson" class="form-input" placeholder="Text field data" />
                    </div>
                    <div class="form-group">
                        <label for="contactNumber" class="block">CONTACT NUMBER</label>
                        <input type="text" id="contactNumber" class="form-input" placeholder="Text field data" />
                    </div>
                    <div class="form-group">
                        <label for="relationship" class="block">RELATIONSHIP</label>
                        <input type="text" id="relationship" class="form-input" placeholder="Text field data" />
                    </div>
                </div>

                <!-- Done Button -->
                <div class="flex justify-end mt-6">
                    <button type="button" class="done-btn" id="doneBtn" data-target-tab="">
                        Done
                    </button>
                </div>
            </form>
        </div>

        <div id="settings-content" class="hidden container p-6 lg:p-10 flex flex-col rounded-lg">
            <header class="bg-[#00004d] text-white p-4 rounded-t-lg flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src=" " alt="Benedicto College Logo" class="h-10 w-auto">
                    <div class="flex flex-col">
                        <span class="text-xl font-bold leading-tight">BENEDICTO</span>
                        <span class="text-xl font-bold leading-tight">COLLEGE</span>
                    </div>
                </div>
                <span class="text-lg font-medium">Admin</span>
            </header>
            <h2 class="text-2xl font-bold mb-4 text-blue-800">Settings</h2>
            <p>diri butang</p>
        </div>
    </main>
    </body>
</html>
