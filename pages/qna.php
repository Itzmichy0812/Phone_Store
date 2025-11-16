<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Q&A</title>
  
   <!-- Google Fonts (hoặc có thể bỏ nếu dùng font local) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="../assets/css/style.css"/>
</head>

<body>

  <?php include '../includes/header.php'; ?>

  <main class="qna-page-section">
    <div class="container-default">

    <h1 class="text-center mb-4">Frequently Asked Questions</h1>

    <div class="qna-list">

        <div class="qna-item">
          <div class="qna-question-container">
            <span class="qna-question">What is the delivery time for my order?</span>
            <span class="qna-toggle-icon">+</span>
          </div>
          <div class="qna-answer">
           Delivery typically takes 3-5 business days for standard shipping.
          </div>
        </div>

        <div class="qna-item">
          <div class="qna-question-container">
            <span class="qna-question">Can I return a product if I’m not satisfied?</span>
            <span class="qna-toggle-icon">+</span>
          </div>
          <div class="qna-answer">
            Yes! We offer a 30-day return policy for most products. Please check our returns page.
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include '../includes/footer.php'?>

  <!-- Custom JS -->
  <script src="../javascript/qna_questionbox.js"></script>

</body>
</html>
