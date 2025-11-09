<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liverpool FC</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= BASEURL; ?>">Liverpool FC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASEURL; ?>/player">Daftar Pemain</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container text-center mt-5">
    <div class="card shadow-lg border-0 p-5 mx-auto" style="max-width: 700px;">
        <h1 class="display-5 fw-bold text-danger mb-4">
            Selamat datang di <br> Liverpool FC
        </h1>
        <p class="lead text-muted mb-4">
            Sistem CRUD sederhana.<br>.
        </p>
        <a href="<?= BASEURL; ?>/player" class="btn btn-danger btn-lg px-4">
            Lihat Daftar Pemain
        </a>
    </div>
</div>

<footer class="text-center mt-5 mb-3 text-muted">
    &copy; <?= date('Y'); ?> Liverpool FC - Di buat oleh Riyyadu
</footer>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
