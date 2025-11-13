<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Admin Dashboard</title>

  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<header class="main-header">
  <div class="nav-container">
    <div class="nav-logo">
      <img src="../assets/img/logo.png" alt="PhoneStore Logo">
    </div>

    <nav class="nav-menu">
      <a href="home.php" class="nav-link">Home</a>
      <a href="#" class="nav-link">Shop</a>
      <a href="#" class="nav-link">About</a>
      <a href="contact.php" class="nav-link">Contact</a>
      <a href="#" class="nav-link nav-signup">Sign up</a>
    </nav>
  </div>
</header>

<main class="admin-page">
  <div class="admin-container">

    <h1 class="admin-title">Admin Dashboard</h1>
    <p class="admin-subtitle">
      Quản trị nội dung website PhoneStore: chỉnh thông tin trang và quản lý liên hệ khách hàng.
    </p>

    <div class="admin-card-grid">
      <a href="manage_info.php" class="admin-card">
        <h2>Quản lý thông tin trang</h2>
        <p>Thay đổi nội dung Trang chủ, Trang liên hệ, địa chỉ, số điện thoại, logo, ảnh nền…</p>
      </a>

      <a href="manage_contacts.php" class="admin-card">
        <h2>Quản lý liên hệ khách hàng</h2>
        <p>Xem danh sách liên hệ, đánh dấu đã đọc / đã phản hồi, và xoá các liên hệ không cần thiết.</p>
      </a>
    </div>

  </div>
</main>

</body>
</html>
