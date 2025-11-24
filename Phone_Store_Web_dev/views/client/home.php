<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Home</title>

  <!-- Google Fonts (hoặc có thể bỏ nếu dùng font local) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

  <?php include 'views/layouts/header.php';?>

  <!-- HomePage Section -->
  <section class="homepage">
    <div class="homepage-overlay">
      <div class="homepage-content">
        <p class="homepage-subtitle">New Arrival</p>
        <h1 class="homepage-title">Discover Our New Collection</h1>
        <a href="#" class="btn-see-more">See more</a>
      </div>
    </div>
  </section>

  <?php include 'views/layouts/footer.php';?>

  <!-- JS Bootstrap nếu cần -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
