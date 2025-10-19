<div id="ajout-developpeur">
	<h2>Ajouter un développeur</h2>
	<?php if (!empty($erreur)) : ?>
		<div style="color:red; font-weight:bold;"> <?= htmlspecialchars($erreur) ?> </div>
	<?php endif; ?>
	<form method="POST" action="index.php?controleur=developpeurs&action=ajouterDeveloppeur">
		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" required><br>
		<label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom" required><br>
		<button type="submit">Ajouter</button>
	</form>
</div>
