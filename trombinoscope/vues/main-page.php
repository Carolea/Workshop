<div class="content">
	<section class="col-lg-4 divBorder">
		<h1 id="title">Trombino-PoleS</h1>
		
	<!--	<button id="hasard">Random</button> //blocage du 2eme bouton random-->
		<form action="" method="post" id="form">
			<div class="col-lg-12">
				<select id="personnage" name="personnage">
					<option value="">Choisisez un personnage en BDD</option>
					<?php 

						$personnages = $pdo->query("SELECT id, nom FROM ensemble");
						foreach ($personnages as $personnage) :
							print_r($personnage);
							echo '<option value=' . $personnage['id'] . '>' . $personnage['nom'] . '</option>';
						endforeach;

					 ?>

				</select>
			</div>
			<div class="col-lg-6  firstColumn">
				<label class="labelAttr">visage</label>
				<?php
					getter('visage');
				?>
				<label class="labelAttr">nez</label>
				<?php
					getter('nez');
				?>
				<!--ajout d'un id pour le bouton hasard-->
				<button class="buttonCheck" id="hasard">Hasard</button>
			</div>
			<div class="col-lg-6  secondColumn">
				<label class="labelAttr">yeux</label>
				<?php
					getter('yeux');
				?>
				<label class="labelAttr">bouche</label>
				<?php
					getter('bouche');
				?>
				<input type="submit" value="Envoyer" class="buttonCheck">
			</div>
			<button id="bouton" class="buttonCheck place"><a href='index.php'>Refresh</a></button>
		</form>
		
		<!--<form name="sauvegarde_image" id="sauvegarde_image" action="">
				<label for="nom_sauvegarde" > Nom </label>
				<input type="text" name="nom_sauvegarde" id="nom_sauvegarde" required>
				<button id="sauvegarde" type="submit"> Sauvegarder </button>
		</form>  //désactivation du 2eme bouton de sauvegarde -->
		
		
	</section>

	<?php
$ensembleArray = array();
if(isset($_GET['existing'])){
	echo '<a href="../vues" class="return">Retour</a>';
}
if(isset($_POST) && !empty($_POST) && !isset($_GET['existing']) && empty($_GET['existing'])){?>
	<section class="col-lg-3 divBorder">
	<?php
	$visage = $_POST['visage'];
	$yeux = $_POST['yeux'];
	$nez = $_POST['nez'];
	$bouche = $_POST['bouche'];
	$args =array('modeles/img/'.$tableau[0].'/'.$visage,'modeles/img/'.$tableau[2].'/'.$yeux,'modeles/img/'.$tableau[1].'/'.$nez,'modeles/img/'.$tableau[3].'/'.$bouche);
	?>
	<form action="modeles/action.php" method="post" class="formsave">
				<label for="nom" id="labelName">nom du fichier</label>
				<input type="text" name="nom">
				<?php $ensemble = $visage.",".$yeux.",".$nez.",".$bouche; ?>
				<input type="hidden" value="<?=$ensemble;?>" name='ensemble'>
				<input type="submit" value="Enregistrer">

			</form>
	<div class="containerr">
		<?php

			image($args);
		?>
	</div>
	</section>
	<?php
	}else{?>
	<section id="secondaire" class="col-lg-4 divBorder">
	<?php

	showEnsemble();
	if(!empty($_GET)){
			$visagePath = 'modeles/img/'.$tableau[0].'/'.$visageSave;
			$yeuxPath = 'modeles/img/'.$tableau[2].'/'.$yeuxSave;
			$nezPath = 'modeles/img/'.$tableau[1].'/'.$nezSave;
			$bouchePath = 'modeles/img/'.$tableau[3].'/'.$boucheSave;
			$args = array(
				$visagePath,
				$yeuxPath,
				$nezPath,
				$bouchePath
			);?>
			<div class="containerr">
		<?php
			image($args);
		?>
	</div>
	</section>
<?php }}?>
</div>
