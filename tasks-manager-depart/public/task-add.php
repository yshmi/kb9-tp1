<?php
require "views/partials/head.php";
require "views/partials/header.php";
?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Ajouter une tâche</h2>
                        <form action="" >
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" value="">
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select id='category' name='category' class='form-select' >
                                    <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                    
                                </select>
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="">
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <select id="status" name="status" class="form-select">
                                    <option value="" disabled selected>-- Veuillez faire une sélection --</option>
                                    
                                </select>
                                <span class="help-inline"></span>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
                                <span class="help-inline"></span>
                            </div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <a class="btn btn-primary" href=""><span class="bi-arrow-left"></span> Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-light text-center py-3 mt-4">
            <p>&copy; 2024 Gestionnaire de Tâches</p>
        </footer>
    </div>
</body>
</html>
