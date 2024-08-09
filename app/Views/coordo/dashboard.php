<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Coordinateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Inclure Chart.js -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard Coordinateur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="mb-4">Tableau de Bord - Coordinateur</h2>

        <!-- Graphiques -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        Répartition des Montants par Catégorie
                    </div>
                    <div class="card-body">
                        <canvas id="montantChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        Nombre de Véhicules par Catégorie
                    </div>
                    <div class="card-body">
                        <canvas id="vehiculesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Montant Total et Nombre Total des Véhicules -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Montant Total de la Journée</div>
                    <div class="card-body">
                        <h5 class="card-title">5,000,000 FC</h5>
                        <p class="card-text">Montant total collecté jusqu'à présent aujourd'hui.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Nombre Total de Véhicules Passés</div>
                    <div class="card-body">
                        <h5 class="card-title">1,200</h5>
                        <p class="card-text">Nombre total de véhicules passés jusqu'à présent aujourd'hui.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Détail par Catégorie -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                Détail des Catégories de Véhicules
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Nombre de Véhicules</th>
                            <th>Montant Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cat 1a : 2 roues (Motos)</td>
                            <td>300</td>
                            <td>500,000 FC</td>
                        </tr>
                        <tr>
                            <td>Cat 1b : 3 roues (Tricycles)</td>
                            <td>150</td>
                            <td>750,000 FC</td>
                        </tr>
                        <tr>
                            <td>Cat 2 : 4 roues (Voitures, Jeeps, Camionnettes)</td>
                            <td>500</td>
                            <td>2,500,000 FC</td>
                        </tr>
                        <tr>
                            <td>Cat 3 : Véhicules de transport (Bus, Mini-bus)</td>
                            <td>200</td>
                            <td>1,000,000 FC</td>
                        </tr>
                        <tr>
                            <td>Cat 4 : Personnel moral (Véhicules d'entreprises)</td>
                            <td>50</td>
                            <td>250,000 FC</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="table-secondary">
                            <th>Total</th>
                            <th>1,200</th>
                            <th>5,000,000 FC</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts pour les graphiques -->
    <script>
        // Répartition des Montants par Catégorie
        var ctxMontant = document.getElementById('montantChart').getContext('2d');
        var montantChart = new Chart(ctxMontant, {
            type: 'pie',
            data: {
                labels: ['2 roues', '3 roues', '4 roues', 'Véhicules de transport', 'Personnel moral'],
                datasets: [{
                    data: [500000, 750000, 2500000, 1000000, 250000],
                    backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'],
                    borderColor: ['#fff', '#fff', '#fff', '#fff', '#fff'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Nombre de Véhicules par Catégorie
        var ctxVehicules = document.getElementById('vehiculesChart').getContext('2d');
        var vehiculesChart = new Chart(ctxVehicules, {
            type: 'bar',
            data: {
                labels: ['2 roues', '3 roues', '4 roues', 'Véhicules de transport', 'Personnel moral'],
                datasets: [{
                    label: 'Nombre de Véhicules',
                    data: [300, 150, 500, 200, 50],
                    backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'],
                    borderColor: ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
