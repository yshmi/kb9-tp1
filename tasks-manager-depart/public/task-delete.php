<?php
require "views/partials/head.php";
require "views/partials/header.php";
require '../src/functions.php';

$username = $_GET['username'];
$taskId = $_GET['task_id'];
$taskFile = "data/{$username}-tasks.json";
$tasks = readFromFile($taskFile);
$task = $tasks[$taskId];
$categories = readFromFile('data/categories.json');
$statuses = readFromFile('data/status.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirmDelete'])) {
        deleteTask($taskFile, $taskId);
        redirect("task-index.php?username=" . urlencode($username));
    } else if (isset($_POST['cancel'])) {
        redirect("task-index.php?username=" . urlencode($username));
    }
}
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h2>Supprimer une tâche</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $task['title'] ?>"
                            disabled>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Catégorie</label>
                        <input type="text" class="form-control" id="category" name="category"
                            value="<?= $task['category'] ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <input type="text" class="form-control" id="status" name="status" value="<?= $task['status'] ?>"
                            disabled>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            disabled><?= $task['description'] ?></textarea>
                    </div>

                    <button type="submit" name="confirmDelete" class="btn btn-danger">Supprimer</button>
                    <button type="submit" name="cancel" class="btn btn-primary">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require "views/partials/footer.php";
?>