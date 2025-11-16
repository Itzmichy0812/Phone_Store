<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneStore - Manage Q&A</title>

  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- Tabler CSS -->
  <link href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta10/dist/css/tabler.min.css" rel="stylesheet"/>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/style.css"/>

</head>
<body>

  <?php include '../includes/header.php'?>

  <main class="admin-page">
    <div class="admin-container">

      <h1 class="admin-title">Manage Q&A</h1>
      <p class="admin-subtitle">
        Add, remove, or edit questions and answers shown on the Q&A page. Front-end only demo.
      </p>

      <!-- Add Q&A Button -->
      <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qnaModal" id="addNewBtn">
          Add New Q&A
        </button>
      </div>

      <!-- Tabler Table -->
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap" id="qnaTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Question</th>
              <th>Answer</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Rows filled by JS -->
          </tbody>
        </table>
      </div>

    </div>
  </main>

  <!-- Modal -->
  <div class="modal modal-blur fade" id="qnaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Add Q&A</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form id="qnaForm">
            <input type="hidden" id="qnaIndex">

            <div class="form-row mb-3">
              <label class="form-label">Question</label>
              <input type="text" id="qnaQuestion" class="form-control" required>
            </div>

            <div class="form-row mb-3">
              <label class="form-label">Answer</label>
              <textarea id="qnaAnswer" class="form-control" rows="4" required></textarea>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-link" data-bs-dismiss="modal">Cancel</button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Old version of Tabler JS is used because its more compatible with Bootstrap-->
  <!-- Dont include Bootstrap JS with older Tabler JS as old Tabler JS already contain Bootstrap modal-->
  <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta10/dist/js/tabler.min.js"></script>

  <script src="../javascript/admin_manage_qna.js"></script>

</body>
</html>
