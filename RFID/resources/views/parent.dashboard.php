<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Benedicto College - Attendance</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <!-- Header -->
    <header class="header">
      <div class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Placeholder.png" alt="BC Logo">
        <h1>Benedicto College</h1>
      </div>
      <button class="logout-btn">LOG OUT</button>
    </header>

    <!-- Main Content -->
    <main class="content">
      <h2>Hello, {{ $parentName }}!</h2>
      <p class="child-info">Your child : <strong>{{ $childName }}</strong></p>

      <div class="status-box">
        <p>Current Status</p>
        <div class="status">undefined</div>
      </div>

      <div class="attendance-section">
        <label for="week-select">Weekly Attendance ▼</label>
        <table class="attendance-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($attendances as $attendance)
              <tr>
                <td><a href="#">{{ $attendance['date'] }}</a></td>
                <td>{{ $attendance['time_in'] }}</td>
                <td>{{ $attendance['time_out'] }}</td>
                <td class="{{ strtolower($attendance['status']) }}">{{ $attendance['status'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script>
    document.querySelector("label[for='week-select']").addEventListener("click", () => {
      alert("This is a placeholder for weekly attendance dropdown.");
    });
  </script>
</body>
</html>