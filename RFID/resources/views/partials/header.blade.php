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


