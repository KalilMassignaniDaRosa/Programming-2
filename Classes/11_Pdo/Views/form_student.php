<?php
require_once __DIR__ . '/../Student.php';

$student = new Student();
$message = '';
$alertType = 'info';
$editMode = false;
$studentData = null;

// Processa DELETE primeiro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleted = $student->delete((int)$_POST['delete_id']);
    if ($deleted) {
        header("Location: list_students.php");
        exit;
    } else {
        $message = "Failed to delete student.";
        $alertType = 'danger';
    }
}

// Verifica se é edição
if (isset($_GET['id'])) {
    $editMode = true;
    $studentData = $student->getById((int)$_GET['id']);
    if (!$studentData) {
        $message = "Student not found.";
        $alertType = 'warning';
        $editMode = false;
    }
}

// Processa CREATE ou UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_id'])) {
    // Debug: mostra os dados recebidos
    error_log("POST Data: " . print_r($_POST, true));

    $data = [
        'name'   => trim($_POST['name'] ?? ''),
        'age'    => isset($_POST['age']) ? (int)$_POST['age'] : 0,
        'email'  => trim($_POST['email'] ?? ''),
        'course' => trim($_POST['course'] ?? '')
    ];

    // Debug
    error_log("Processed Data: " . print_r($data, true));

    if (!empty($_POST['id'])) {
        // UPDATE
        $data['id'] = (int)$_POST['id'];

        $updated = $student->update($data);
        $message = $updated ? "Student updated successfully!" : "Failed to update student.";
        $alertType = $updated ? 'success' : 'danger';

        if ($updated) {
            $studentData = $student->getById($data['id']);
            $editMode = true;
        }
    } else {
        // INSERT
        // Verifica se todos os campos obrigatórios estão preenchidos
        if (empty($data['name']) || empty($data['email']) || empty($data['course'])) {
            $message = "All fields are required.";
            $alertType = 'danger';
        } elseif ($data['age'] < 16 || $data['age'] > 100) {
            $message = "Age must be between 16 and 100.";
            $alertType = 'danger';
        } else {
            $createdId = $student->create($data);

            // Debug
            error_log("Created ID: " . var_export($createdId, true));

            if ($createdId) {
                $message = "Student created successfully!";
                $alertType = 'success';

                // Redireciona para edição
                header("Location: form_student.php?id=" . $createdId);
                exit;
            } else {
                $message = "Failed to create student. Please check the error log.";
                $alertType = 'danger';
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $editMode ? 'Edit Student' : 'Register Student' ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { padding-top: 40px; background: #f8f9fa; }
    .card { max-width: 720px; margin: 0 auto; }
  </style>
</head>
<body>
  <div class="container">
    <div class="card shadow-sm">
      <div class="card-body">
        <h2 class="card-title mb-3"><?= $editMode ? 'Edit Student' : 'Register Student' ?></h2>

        <?php if ($message): ?>
          <div class="alert alert-<?= htmlspecialchars($alertType) ?>"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form id="studentForm" method="POST" onsubmit="return validateForm()" novalidate>
          <?php if ($editMode && $studentData): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($studentData->id) ?>">
          <?php endif; ?>

          <div class="mb-3">
            <label class="form-label">Name *</label>
            <input class="form-control" type="text" name="name" required value="<?= htmlspecialchars($studentData->name ?? '') ?>">
            <div class="invalid-feedback">Please enter the name.</div>
          </div>

          <div class="mb-3">
            <label class="form-label">Age *</label>
            <input class="form-control" type="number" name="age" min="16" max="100" required value="<?= htmlspecialchars($studentData->age ?? '') ?>">
            <div class="form-text">Allowed range: 16–100</div>
            <div class="invalid-feedback">Please enter a valid age (16–100).</div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email *</label>
            <input class="form-control" type="email" name="email" required value="<?= htmlspecialchars($studentData->email ?? '') ?>">
            <div class="invalid-feedback">Please enter a valid email.</div>
          </div>

          <div class="mb-3">
            <label class="form-label">Course *</label>
            <input class="form-control" type="text" name="course" required value="<?= htmlspecialchars($studentData->course ?? '') ?>">
            <div class="invalid-feedback">Please enter the course.</div>
          </div>

          <div class="d-flex justify-content-between">
            <div>
              <button type="submit" class="btn btn-primary"><?= $editMode ? 'Update' : 'Save' ?></button>
              <a href="list_students.php" class="btn btn-outline-secondary ms-2">Back to list</a>
            </div>

            <?php if ($editMode && $studentData): ?>
              <div>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
              </div>
            <?php endif; ?>
          </div>
        </form>

        <?php if ($editMode && $studentData): ?>
        <form id="deleteForm" method="POST" style="display:none;">
          <input type="hidden" name="delete_id" value="<?= (int)$studentData->id ?>">
        </form>
        <?php endif; ?>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function validateForm() {
      const form = document.getElementById('studentForm');

      // Valida HTML5
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return false;
      }

      // Valida idade
      const age = Number(form.age.value);
      if (isNaN(age) || age < 16 || age > 100) {
        alert('Age must be between 16 and 100.');
        return false;
      }

      // Valida email
      const email = form.email.value.trim();
      if (!email || !email.includes('@')) {
        alert('Please enter a valid email address.');
        return false;
      }

      return true;
    }

    function confirmDelete() {
      if (confirm('Are you sure you want to delete this student? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
      }
    }
  </script>
</body>
</html>
