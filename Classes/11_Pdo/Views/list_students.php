<?php
require_once __DIR__ . '/../Student.php';

$student = new Student();
$message = '';
$alertType = 'info';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleted = $student->delete((int)$_POST['delete_id']);
    if ($deleted) {
        $message = 'Student deleted successfully.';
        $alertType = 'success';
    } else {
        $message = 'Failed to delete student.';
        $alertType = 'danger';
    }
}

$students = $student->list();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Students List</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 40px; background: #f8f9fa; }
    .table-actions a { margin-right: .4rem; }
    .card { max-width: 1100px; margin: 0 auto; }
  </style>
</head>
<body>
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 class="mb-0">Students List</h2>
          <a href="form_student.php" class="btn btn-success">+ Register new student</a>
        </div>

        <?php if ($message): ?>
          <div class="alert alert-<?= htmlspecialchars($alertType) ?>"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if (empty($students)): ?>
          <div class="alert alert-secondary">No students registered.</div>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Email</th>
                  <th scope="col">Course</th>
                  <th scope="col" class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $st): ?>
                  <tr>
                    <td><?= htmlspecialchars($st->id) ?></td>
                    <td><?= htmlspecialchars($st->name) ?></td>
                    <td><?= htmlspecialchars($st->age) ?></td>
                    <td><?= htmlspecialchars($st->email) ?></td>
                    <td><?= htmlspecialchars($st->course) ?></td>
                    <td class="text-end table-actions">
                      <a href="form_student.php?id=<?= (int)$st->id ?>" class="btn btn-sm btn-primary">Edit</a>

                      <!-- Delete button submits the hidden delete form -->
                      <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= (int)$st->id ?>)">Delete</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

        <!-- Hidden delete form (POST) -->
        <form id="deleteForm" method="POST" style="display:none;">
          <input type="hidden" name="delete_id" id="delete_id" value="">
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function confirmDelete(id) {
      if (confirm('Are you sure you want to delete this student?')) {
        const f = document.getElementById('deleteForm');
        document.getElementById('delete_id').value = id;
        f.submit();
      }
    }
  </script>
</body>
</html>
