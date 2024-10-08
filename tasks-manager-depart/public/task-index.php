<?php
require "views/partials/head.php";
require "views/partials/header.php";
require '../src/functions.php';

$username = $_GET['username'];
$taskFile = "data/{$username}-tasks.json";
$tasks = readFromFile($taskFile);
$categories = readFromFile('data/categories.json');
$statuses = readFromFile('data/status.json');
$noTasksMessage = "";

if ($tasks === [])
    $noTasksMessage = "Aucune tâche trouvée";

$filteredTasks = $tasks; //Toutes les tâches sont incluses par défaut

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //les boutons modifier et supprimer
    if (isset($_POST['taskAddBtn'])) {
        redirect('task-add.php');
    }
    if (isset($_POST['deleteBtn'])) {
        redirect('task-delete.php');
    }
    if (isset($_POST['editBtn'])) {
        redirect('task-edit.php');
    }

    $selectedStatus = 'all';
    $selectedCategory = 'all';
    $textSearch = "";

    if (isset($_POST['filterBtn'])) {
        $selectedStatus = $_POST['selectedStatus'];
        $selectedCategory = $_POST['selectedCategory'];
        $textSearch = str_replace(' ', '', $_POST['textSearch']);

        $filteredTasks = array_filter($tasks, function ($task) use ($selectedCategory, $selectedStatus, $textSearch) {
            if ($selectedCategory !== 'all' && $task['category'] !== $selectedCategory) {
                return false;
            }

            if ($selectedStatus !== 'all' && $task['status'] !== $selectedStatus) {
                return false;
            }

            if (!empty($textSearch)) {
                if (stripos($task['title'], $textSearch) === false) {
                    return false;
                }
            }
            return true;
        });
    }
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- TODO : Filtre -->
        <form action="" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <!-- Catégorie -->
                    <select class="form-select" id="selectedCategory" name="selectedCategory">
                        <option value="all">Toutes les catégories</option>
                        <?php
                        foreach ($categories as $category) {
                            ?>
                            <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <!-- Statut -->
                    <select class="form-select" id="selectedStatus" name="selectedStatus">
                        <option value="all">Tous les statuts</option>
                        <?php
                        foreach ($statuses as $status) {
                            ?>
                            <option value="<?= $status['name'] ?>"><?= $status['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <!-- Recherche par texte -->
                    <textarea class="form-control" placeholder="Rechercher par texte" rows="1" id="textSearch"
                        name="textSearch"></textarea>



                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary" name="filterBtn">Filtrer</button>

                </div>
            </div>
        </form>

        <!-- TODO : Ajouter une tâche -->
        <form action="" method="POST" class="mb-2">
            <button class="btn btn-success" name="taskAddBtn">Ajouter une tâche</button>
            <h1 style="padding-bottom: 10px; color: red;"> <?= $noTasksMessage ?> </h1>


        </form>
        <!-- TODO : Liste des tâches -->

        <div class="row g-3">
            <?php
            if (!empty($filteredTasks)) {
                foreach ($filteredTasks as $task) {
                    $status = '';

                    if ($task['status'] == 'En Cours')
                        $status = 'primary';

                    if ($task['status'] == 'Terminé')
                        $status = 'success';

                    if ($task['status'] == 'À Débuter')
                        $status = 'secondary';

                    ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card card-custom">
                            <div class="card-body">
                                <h5 class="card-title"><?= $task['title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $task['category'] ?> - <?= $task['date'] ?> <span
                                        class="badge bg-<?= $status ?> ms-3"><?= $task['status'] ?></span></h6>
                                <p class="card-text"><?= $task['description'] ?></p>
                                <div class="container">
                                    <!-- TODO : Modifier une tâche -->
                                    <form action="" method="POST" class="d-inline-block">
                                        <button class="btn btn-warning" id="editBtn" name="editBtn">Modifier</button>
                                    </form>
                                    <!-- TODO : Supprimer une tâche -->
                                    <form action="task-delete.php" method="GET" class="d-inline-block">
                                        <input type="hidden" name="username" value="<?= $username ?>">
                                        <input type="hidden" name="task_id"
                                            value="<?= array_search($task, $tasks) //https://www.php.net/manual/en/function.array-search.php, cherche la tache dans le tableau de taches, et retourne son id ?>">
                                        <button class="btn btn-danger" id="deleteBtn" name="deleteBtn">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Aucune tâche ne correspond aux critères de recherche.</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php
require "views/partials/footer.php";
?>