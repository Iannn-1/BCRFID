<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - RFID System</title>
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

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