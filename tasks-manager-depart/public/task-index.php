<?php
require "views/partials/head.php";
require "views/partials/header.php";
require '../src/functions.php';



$tasks = readFromFile('data/user1-tasks.json');
$categories = readFromFile('data/categories.json');
$statuses = readFromFile('data/status.json');
$noTasksMessage = "";

if ($tasks === []) {
    $noTasksMessage = "Aucune tâche trouvée";
}


if($_SERVER['REQUEST_METHOD'] === 'POST') {





}
?>


<div class="row">
    <div class="col-md-12">
        <!-- TODO : Filtre -->
        <form action="" method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <!-- Catégorie -->
                    <select class="form-select">
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
                    <select class="form-select">
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
                    <textarea class="form-control" placeholder="Rechercher par texte" rows="1"></textarea>

                     

                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary">Filtrer</button>

                </div>
            </div>
        </form>

        <!-- TODO : Ajouter une tâche -->
        <form action="" method="POST" class="mb-2">
            <h1 style="padding-bottom: 10px; color: red;"> <?= $noTasksMessage ?> </h1>


        </form>
        <!-- TODO : Liste des tâches -->

        <div class="row g-3">
            <?php
            foreach ($tasks as $task) {
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
                                </form>
                                <!-- TODO : Supprimer une tâche -->
                                <form action="" method="POST" class="d-inline-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">Titre de la tâche</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Categorie - Date Statut</h6>
                        <p class="card-text">Description de la tâche</p>
                        <div class="container">
                            <!-- TODO : Modifier une tâche -->
                            <form action="" method="POST" class="d-inline-block">
                            </form>
                            <!-- TODO : Supprimer une tâche -->
                            <form action="" method="POST" class="d-inline-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require "views/partials/footer.php";
?>