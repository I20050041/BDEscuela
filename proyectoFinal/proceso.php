<!DOCTYPE html>
<html lang="en">
  <form>
<head>
  <title>Responsive Sidebar</title>
    <!-- Link Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <i class="bx bxl-audible icon"></i>
      <div class="logo_name">Menu</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="alumno.php">
        <i class="bi bi-person-fill"></i>
          <span class="link_name">Alumno</span>
        </a>
        <span class="tooltip">Alumno</span>
      </li>
      <li>
        <a href="carrera.php">
        <i class="bi bi-mortarboard"></i>
          <span class="link_name">Carrera</span>
        </a>
        <span class="tooltip">Carrera</span>
      </li>
      <li>
        <a href="grupo.php">
        <i class="bi bi-people-fill"></i>
          <span class="link_name">Grupo</span>
        </a>
        <span class="tooltip">Grupo</span>
      </li>
      <li>
        <a href="asignatura.php">
        <i class="bi bi-book"></i>
          <span class="link_name">Asignatura</span>
        </a>
        <span class="tooltip">Asignatura</span>
      </li>
      <li>
        <a href="profesor.php">
        <i class="bi bi-person-fill"></i>
          <span class="link_name">Profesor</span>
        </a>
        <span class="tooltip">Profesor</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <div class="profile_content">
            <div class="designation">Admin</div>
          </div>
        </div>
        <form action="post" action="login.php">
        <a class="bx bx-log-out" id="log_out" href="login.php"></a>
        </form>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">Escuela</div>
  </section>
  <!-- Scripts -->
  <script src="script.js"></script>
</body>
</html>
</form>