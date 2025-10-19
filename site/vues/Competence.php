<div id="illustration">
	<img id='picnic_equipe' src='images/Picnic_equipe.jpg' alt='SJP_Picnic_equipe' />
</div>
<div id="description">
	<h2> Les competences sont : </h2>
	<table border='1'>
		<thead>
			<tr>
                
				<th>Nom</th>
				<th>ID</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($lesCompetences as $Competence) {
				echo '<tr>';
				echo '<td>' . htmlspecialchars($Competence->getNom()) . '</td>';
				echo '<td>' . htmlspecialchars($Competence->getId()) . '</td>';
				echo '<td><a href="index.php?controleur=competence&action=Competence&id=' . $Competence->getId() . '">suppression</a></td>';
				echo '</tr>';
			}
			?>
		</tbody>
	</table>

</div>