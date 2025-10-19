<div id="illustration">
    <img id='picnic_equipe' src='images/Picnic_equipe.jpg' alt='SJP_Picnic_equipe' />
</div>

<div id="description">
    <h2>L'équipe ayant créé cette application est composée de :</h2>

    <!-- Barre de recherche -->
    <form method="get" action="index.php">
        <input type="hidden" name="controleur" value="developpeurs">
        <input type="hidden" name="action" value="Rechercher">
        <input type="text" name="recherche" placeholder="Rechercher un développeur..."
               value="<?= htmlspecialchars($_GET['recherche'] ?? '') ?>">
        <button type="submit">Rechercher</button>
    </form>

    <table border='1'>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Suppression</th>
                <th>Modification</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lesDeveloppeurs as $developpeur) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($developpeur->getNom()) . '</td>';
                echo '<td>' . htmlspecialchars($developpeur->getPrenom()) . '</td>';
                echo '<td><a href="index.php?controleur=developpeurs&action=Supprimer&id=' .
                    $developpeur->getId() . '">suppression</a></td>';
                echo '<td><a href="index.php?controleur=developpeurs&action=Update&id=' .
                    $developpeur->getId() . '">modification</a></td>';
                echo '</tr>';
            }
					 if (empty($lesDeveloppeurs)) {
      					  echo "<p>Aucun développeur trouvé.</p>";
            }
            ?>
        </tbody>
    </table>

    <a href="index.php?controleur=developpeurs&action=ajouterDeveloppeur">Ajouter développeur</a>
</div>
