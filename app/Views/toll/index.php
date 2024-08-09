<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Péage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
        .receipt {
            border: 1px solid #000;
            padding: 20px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url('images/logo.png') ?>" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Péage
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Enregistrement de la Transaction</h5>
                    </div>
                    <div class="card-body">
                        <form id="transaction-form" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="plaque" class="form-label">Plaque d'immatriculation</label>
                                <input type="text" class="form-control" id="plaque" placeholder="Ex : ABC-1234" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir une plaque valide.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="categorie" class="form-label">Catégorie du véhicule</label>
                                <select class="form-select" id="categorie" required>
                                    <option value="" disabled selected>Choisissez une catégorie</option>
                                    <option value="1a">Cat 1a : 2 roues (Motos)</option>
                                    <option value="1b">Cat 1b : 3 roues (Tricycles)</option>
                                    <option value="2">Cat 2 : 4 roues (Voitures, Jeeps, Camionnettes)</option>
                                    <option value="3">Cat 3 : Véhicules de transport (Bus, Mini-bus)</option>
                                    <option value="4">Cat 4 : Personnel moral (Véhicules d'entreprises)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Veuillez sélectionner une catégorie.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="montant" class="form-label">Montant à payer</label>
                                <input type="number" class="form-control" id="montant" placeholder="Ex : 5000" required>
                                <div class="invalid-feedback">
                                    Veuillez saisir un montant valide.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100" onclick="generateReceipt()">Enregistrer</button>
                        </form>
                    </div>
                </div>

                <!-- Tableau des Transactions -->
                <div class="card shadow-sm mt-5">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Dernières Transactions</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date/Heure</th>
                                    <th>Plaque</th>
                                    <th>Catégorie</th>
                                    <th>Marque/Type</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="transactions-table">
                                <!-- Les transactions seront ajoutées ici dynamiquement -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reçu d'Impression -->
    <div id="receipt" class="receipt no-print" style="display: none;">
        <h4>Reçu</h4>
        <p><strong>Numéro de reçu:</strong> <span id="receipt-number">123456</span></p>
        <p><strong>Véhicule:</strong> <span id="vehicle-info">Marque - Modèle - Roues</span></p>
        <p><strong>Montant payé:</strong> <span id="amount-paid">5000</span> FC</p>
        <p><strong>Destination:</strong> <span id="destination">Point A</span></p>
        <p><strong>Date et Heure:</strong> <span id="date-time">2024-08-09 12:34</span></p>
        <button class="btn btn-primary" onclick="printReceipt()">Imprimer le reçu</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/app.js') ?>"></script>
    <script>
        // Fonction pour générer un reçu
        function generateReceipt() {
            // Remplacez les valeurs par celles récupérées du formulaire ou de la base de données
            document.getElementById('receipt-number').innerText = Math.floor(Math.random() * 1000000);
            document.getElementById('vehicle-info').innerText = `${document.getElementById('plaque').value} - Modèle - Roues`;
            document.getElementById('amount-paid').innerText = document.getElementById('montant').value;
            document.getElementById('destination').innerText = 'Point A'; // ou Point B selon le cas
            document.getElementById('date-time').innerText = new Date().toLocaleString();

            // Afficher le reçu
            document.getElementById('receipt').style.display = 'block';
        }

        // Fonction pour imprimer le reçu
        function printReceipt() {
            window.print();
        }
    </script>
</body>
</html>

