<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - RFID System</title>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    overflow-x: hidden;
    }

    /* Header */
    .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #0d2a5c;
    color: white;
    padding: 10px 20px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    z-index: 1000;
    }
    .header .college-name {
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
            font-size: 20px;
            line-height: 1.2;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-transform: uppercase;
        }
    .menu-btn {
    font-size: 24px;
    cursor: pointer;
    margin-right: 10px;
    }
    .header-left {
    display: flex;
    align-items: center;
    gap: 10px;
    }
    .header-logo-container {
    display: flex;
    align-items: center;
    }
    .header-logo {
    height: 40px;
    margin-right: 15px;
    }
    .header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    }
    .header-right .logout-btn {
    background: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
    cursor: pointer;
    transition: background 0.3s;
    }
    .header-right .logout-btn:hover {
    background: #d32f2f;
    }

    /* Sidebar */
    .sidebar {
    position: fixed;
    top: 0;
    left: -250px;
    height: 100%;
    width: 250px;
    background: #0a1d37;
    color: white;
    display: flex;
    flex-direction: column;
    padding-top: 60px; /* below header */
    transition: left 0.3s ease;
    z-index: 999;
    }
    .sidebar.active {
    left: 0;
    }
    .sidebar a {
    padding: 15px 20px;
    text-decoration: none;
    color: white;
    display: block;
    transition: 0.3s;
    }
    .sidebar a:hover {
    background: #1e3a70;
    }

    /* User section (moved up) */
    .sidebar .user {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 20px;
    background: #102b55;
    font-size: 14px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
    }
    .sidebar .user strong {
    font-size: 15px;
    }
    .logout-btn {
    background: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
    cursor: pointer;
    transition: background 0.3s;
    }
    .logout-btn:hover {
    background: #d32f2f;
    }

    /* Main content */
    .main {
    padding: 80px 20px 20px;
    transition: margin-left 0.3s ease;
    }
    .main.shifted {
    margin-left: 250px;
    }

    /* Stats */
    .stats {
    margin: 20px 0;
    }
    .stat-box {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    font-weight: bold;
    font-size: 18px;
    color: #333;
    }
    .blue { background: #b3e5fc; }
    .yellow { background: #fff9c4; }
    .pink { background: #f8bbd0; }
    .green { background: #c8e6c9; }

    /* Table */
    table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    table th, table td {
    padding: 12px 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    }
    table th {
    background: #f57c00;
    color: white;
    }
    table tr:hover {
    background: #f9f9f9;
    }
</style>
</head>
<body>

<div class="header">
    <div class="header-left">
        <span class="menu-btn" id="menu-btn">&#9776;</span>
        <div class="header-logo-container">
            <img src="https://edukasyon-production.s3.amazonaws.com/uploads/school/avatar/1790/bc.jpg" alt="Benedicto College Logo" class="header-logo">
            <div class="college-name">BENEDICTO<br>COLLEGE</div>
        </div>
    </div>
    <div class="header-right">
    <span>Admin</span>
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
    </div>
</div>

<div class="sidebar" id="sidebar">
    <div class="user">
    <p><strong>Bene Dicto</strong><br>Admin</p>
    </div>

    <a href="#">Dashboard</a>
    <a href="#">Student</a>
    <a href="#">Employee</a>
    <a href="#">Settings</a>
</div>

<div class="main" id="main">
    <div class="stats">
    <div class="stat-box blue">Attendance Rate: 100%</div>
    <div class="stat-box yellow">Students Present: 99</div>
    <div class="stat-box pink">Employees Present: 98</div>
    <div class="stat-box green">Recent Absences: 97%</div>
    </div>

    <table>
    <thead>
        <tr>
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
        <td>13:07</td>
        <td>13:07</td>
        </tr>
        <tr>
        <td>14 July 2025</td>
        <td>Cuh Ledge</td>
        <td>2020 - 12345</td>
        <td>13:14</td>
        <td>13:07</td>
        </tr>
    </tbody>
    </table>
</div>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main');

    menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    main.classList.toggle('shifted');
    });
</script>

</body>
</html>