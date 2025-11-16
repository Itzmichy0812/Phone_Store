<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PhoneStore - Manage About Page</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <!-- Tabler -->
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta10/dist/css/tabler.min.css"/>

  <!-- Global CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

  <?php include '../includes/header.php'?>

  <div class="page page-center">
    <div class="container-xl about-admin-container">

        <h1 class="page-title">Manage About Page</h1>
        <p class="page-subtitle">Update the contents displayed on the About page (client-side demo only).</p>

        <!-- FORM -->
        <form id="aboutForm" class="card card-body">

        <!-- SECTION 1 -->
        <h2 class="admin-section-title">Section 1: Website Introduction</h2>

        <div class="mb-3">
            <label class="form-label">Section Title</label>
            <input type="text" class="form-control" id="sec1Title" placeholder="Website introduction...">
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph Content</label>
            <textarea class="form-control" id="sec1Text" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" class="form-control" id="sec1Image" accept="image/*">
        </div>

        <hr class="my-4">

        <!-- SECTION 2 -->
        <h2 class="admin-section-title">Section 2: Why You Need a Phone</h2>

        <div class="mb-3">
            <label class="form-label">Section Title</label>
            <input type="text" class="form-control" id="sec2Title">
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph Content</label>
            <textarea class="form-control" id="sec2Text" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" class="form-control" id="sec2Image" accept="image/*">
        </div>

        <hr class="my-4">

        <!-- SECTION 3 -->
        <h2 class="admin-section-title">Section 3: Placeholder Section</h2>

        <div class="mb-3">
            <label class="form-label">Section Title</label>
            <input type="text" class="form-control" id="sec3Title">
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph Content</label>
            <textarea class="form-control" id="sec3Text" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" class="form-control" id="sec3Image" accept="image/*">
        </div>

        <div class="form-footer mt-4">
            <button type="button" id="previewBtn" class="btn btn-outline-primary">Preview</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

        </form>

    </div>
  </div>

    <!-- PREVIEW MODAL -->
  <div class="modal modal-blur fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">About Page Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="previewBody">
            <!-- Filled dynamically by JS -->
            </div>
        </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Old version of Tabler JS is used because its more compatible with Bootstrap-->
  <!-- Dont include Bootstrap JS with older Tabler JS as old Tabler JS already contain Bootstrap modal-->
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta10/dist/js/tabler.min.js"></script>

  <!-- Custom JS -->
  <script src="../javascript/admin_manage_about.js"></script>

</body>
</html>
