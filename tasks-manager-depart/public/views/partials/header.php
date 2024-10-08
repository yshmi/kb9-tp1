<body>
    <header class="bg-primary text-white py-3">
        <div class="container header-content">
            <div></div> <!-- Empty div to help center the title -->
            <h1 class="header-title mb-0">
                <i class="fa-solid fa-list-check"></i> Gestionnaire de Tâches
            </h1>

            <?php if (isset($_GET['username'])): ?>
                <form action="index.php" method="GET" class="d-inline">
                    <button class="btn btn-outline-light mb-0" type="submit">Déconnexion</button>
                </form>
            <?php endif; ?>

        </div>
    </header>    

    <div class="container mt-4"></div>