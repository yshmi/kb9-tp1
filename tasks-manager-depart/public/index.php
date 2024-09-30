


<?php
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
                                <input type="text" class="form-control" id="username" name="username" value="">
                                <span class="help-inline"></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; 2024 Gestionnaire de Tâches</p>
    </footer>
</body>
</html>
