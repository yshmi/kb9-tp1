<?php
//Variables
require '../src/functions.php';
$users = readFromFile('data/users.json');
$username = "";
$message = "";
//Vérification Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = $_POST['username'];
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            redirect("task-index.php");
        } else {
            $message = "Ce nom d'utilisateur n'existe pas";
        }
    }
}

require "views/partials/head.php";
require "views/partials/header.php";
?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                                <span class="help-inline"><?= $message ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require "views/partials/footer.php";
?>