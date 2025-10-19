

<form method="post" action="index.php?controleur=developpeurs&action=enregDev">
    <input type="hidden" name="id" value="<?= htmlspecialchars($dev->getId()) ?>">
    <label>Nom :
        <input type="text" name="nom" value="<?= htmlspecialchars($dev->getNom()) ?>" required>
    </label><br>
    <label>Prénom :
        <input type="text" name="prenom" value="<?= htmlspecialchars($dev->getPrenom()) ?>" required>
    </label><br>
    <button type="submit">Modifier</button>
</form>
