<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Manage Site Info</title>

  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

<?php include '../includes/header.php'?>

<main class="admin-page">
  <div class="admin-container">
    <h1 class="admin-title">Quản lý thông tin trang</h1>
    <p class="admin-subtitle">
      Chỉnh sửa các nội dung hiển thị trên Trang chủ và Trang liên hệ. Hiện tại form chỉ demo front-end.
    </p>

    <form class="admin-form" onsubmit="alert('Demo: dữ liệu chưa được lưu vào CSDL.'); return false;">

      <h2 class="admin-section-title">Thông tin chung</h2>

      <div class="form-row">
        <label for="siteName">Tên website / thương hiệu</label>
        <input type="text" id="siteName" name="siteName" value="PhoneStore">
      </div>

      <div class="form-row">
        <label for="tagline">Slogan / Tagline</label>
        <input type="text" id="tagline" name="tagline" value="Discover Your Next Smartphone">
      </div>

      <h2 class="admin-section-title">Nội dung Trang chủ</h2>

      <div class="form-row">
        <label for="heroSmall">Dòng nhỏ (New Arrival)</label>
        <input type="text" id="heroSmall" name="heroSmall" value="New Arrival">
      </div>

      <div class="form-row">
        <label for="heroTitle">Tiêu đề lớn (Discover Our New Collection)</label>
        <input type="text" id="heroTitle" name="heroTitle" value="Discover Our New Collection">
      </div>

      <div class="form-row">
        <label for="heroButton">Chữ trên nút (See more)</label>
        <input type="text" id="heroButton" name="heroButton" value="See more">
      </div>

      <h2 class="admin-section-title">Thông tin liên hệ</h2>

      <div class="form-row">
        <label for="address">Địa chỉ</label>
        <textarea id="address" name="address" rows="2">400 University Drive Suite 200 Coral Gables, FL 33134 USA</textarea>
      </div>

      <div class="form-row">
        <label for="phone">Số điện thoại</label>
        <input type="text" id="phone" name="phone" value="+1 800 123 4567">
      </div>

      <div class="form-row">
        <label for="email">Email liên hệ</label>
        <input type="email" id="email" name="email" value="support@phonestore.com">
      </div>

      <h2 class="admin-section-title">Hình ảnh</h2>

      <div class="form-row">
        <label for="logoFile">Logo (logo.png)</label>
        <input type="file" id="logoFile" name="logoFile" accept="image/*">
      </div>

      <div class="form-row">
        <label for="bgFile">Ảnh nền Trang chủ (HomePageBackground.png)</label>
        <input type="file" id="bgFile" name="bgFile" accept="image/*">
      </div>

      <div class="form-actions">
        <button type="submit" class="btn-primary-save">Lưu thay đổi</button>
      </div>

    </form>

  </div>
</main>

</body>
</html>
