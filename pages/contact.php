<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Contact</title>

  <!-- Font (dùng giống Home) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap (nếu bạn đang dùng, có thể giữ giống Home) -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>

  <!-- HEADER / NAV: giống Home, chỉ khác chỗ active -->
  <header class="main-header">
    <div class="nav-container">
      <div class="nav-logo">
        <img src="../assets/img/logo.png" alt="PhoneStore Logo">
      </div>

      <nav class="nav-menu">
        <a href="home.php" class="nav-link">Home</a>
        <a href="#" class="nav-link">Shop</a>
        <a href="#" class="nav-link">About</a>
        <a href="contact.php" class="nav-link active">Contact</a>
        <a href="#" class="nav-link nav-signup">Sign up</a>
      </nav>
    </div>
  </header>

  <!-- CONTACT PAGE BODY (giống footer Furniro phóng to lên) -->
  <main class="contact-page">
    <section class="contact-footer-section">
      <div class="contact-container">

        <div class="contact-grid">
          <!-- Cột 1: Brand + địa chỉ -->
          <div>
            <div class="contact-brand-name">PhoneStore.</div>
            <p class="contact-address">
              400 University Drive Suite 200 Coral Gables,<br>
              FL 33134 USA
            </p>
          </div>

          <!-- Cột 2: Links -->
          <div>
            <div class="contact-column-title">Links</div>
            <ul class="contact-link-list">
              <li><a class="contact-link" href="home.php">Home</a></li>
              <li><a class="contact-link" href="#">Shop</a></li>
              <li><a class="contact-link" href="#">About</a></li>
              <li><a class="contact-link" href="contact.php">Contact</a></li>
            </ul>
          </div>

          <!-- Cột 3: Help -->
          <div>
            <div class="contact-column-title">Help</div>
            <ul class="contact-link-list">
              <li><a class="contact-link" href="#">Payment Options</a></li>
              <li><a class="contact-link" href="#">Returns</a></li>
              <li><a class="contact-link" href="#">Privacy Policies</a></li>
            </ul>
          </div>

          <!-- Cột 4: Newsletter -->
          <div>
            <div class="contact-column-title">Newsletter</div>
            <form action="#" method="post" class="newsletter-form" onsubmit="return false;">
              <div class="newsletter-input-wrap">
                <input
                  type="email"
                  class="newsletter-input"
                  placeholder="Enter Your Email Address"
                  required
                />
                <button class="newsletter-btn" type="submit">SUBSCRIBE</button>
              </div>
            </form>
          </div>
        </div>

        <!-- dòng dưới cùng -->
        <div class="contact-bottom-line">
          2025 PhoneStore. All rights reserved
        </div>

      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
