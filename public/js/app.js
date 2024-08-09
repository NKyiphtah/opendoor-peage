document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('transaction-form');
    const transactionsTable = document.getElementById('transactions-table');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        if (form.checkValidity() === false) {
            form.classList.add('was-validated');
            return;
        }

        // Récupérer les valeurs des champs
        const plaque = document.getElementById('plaque').value;
        const categorie = document.getElementById('categorie').value;
        const montant = document.getElementById('montant').value;

        // Exemple de données pour la marque et le type (à remplacer par une vraie base de données)
        const marques = {
            '1a': 'Yamaha',
            '1b': 'Bajaj',
            '2': 'Toyota',
            '3': 'Mercedes',
            '4': 'Renault'
        };
        const types = {
            '1a': 'Moto',
            '1b': 'Tricycle',
            '2': 'Voiture',
            '3': 'Bus',
            '4': 'Camion'
        };

        const marque = marques[categorie];
        const type = types[categorie];
        
        // Format de la date
        const date = new Date().toLocaleString();

        // Ajouter une nouvelle ligne dans le tableau des transactions
        const row = transactionsTable.insertRow();
        row.innerHTML = `
            <td>${date}</td>
            <td>${plaque}</td>
            <td>${categorie}</
            <td>${marque} / ${type}</td>
            <td>${montant}</td>
            <td><span class="badge bg-warning">Enregistré</span></td>
            <td><button class="btn btn-primary btn-sm validate-btn">Valider</button></td>
        `;

        // Attacher un événement de clic au bouton "Valider"
        row.querySelector('.validate-btn').addEventListener('click', function() {
            row.querySelector('td:nth-child(6)').innerHTML = '<span class="badge bg-success">Validé</span>';
            this.disabled = true; // Désactiver le bouton après validation
        });

        // Réinitialiser le formulaire
        form.reset();
        form.classList.remove('was-validated');
    });
});
