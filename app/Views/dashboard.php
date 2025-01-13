<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS Gestion des Examens - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar">
                <div class="sidebar-sticky">
                    <h4 class="text-center py-3">Gestion des Examens</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/exams">Gérer les Examens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/students">Gérer les Étudiants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/teachers">Gérer les Enseignants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/stats">Statistiques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/logout">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h2>Dashboard</h2>
                </div>

                <!-- Display Success Messages -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </div>
                <?php endif; ?>

                <!-- Display Error Messages -->
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Content Section -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bienvenue dans le tableau de bord</h4>
                        <p class="card-text">Utilisez le menu à gauche pour gérer les examens, les étudiants et les enseignants.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
