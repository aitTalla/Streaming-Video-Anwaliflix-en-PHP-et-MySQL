<?php

/*
      `.       `..`... `......     `... `......      `.       `..      `..            `.       
     `. ..     `..     `..              `..         `. ..     `..      `..           `. ..     
    `.  `..    `..     `..              `..        `.  `..    `..      `..          `.  `..    
   `..   `..   `..     `..              `..       `..   `..   `..      `..         `..   `..   
  `...... `..  `..     `..              `..      `...... `..  `..      `..        `...... `..  
 `..       `.. `..     `..              `..     `..       `.. `..      `..       `..       `.. 
`..         `..`..     `..              `..    `..         `..`........`........`..         `..
                                                                                               
*/

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "anwaliflixDB";
$mysql_Connection = false;

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
define("conn", $conn);

// Vérifier la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
} else {
    $mysql_Connection = true;
}


function makeRandomSectionSerie($order = "RAND()")
{
	$getRandomSeriesForHeader = mysqli_query(conn,"SELECT * FROM series ORDER BY $order LIMIT 1");
	$series = mysqli_fetch_assoc($getRandomSeriesForHeader);
	$saison = mysqli_fetch_assoc(mysqli_query(conn,"SELECT * FROM saison WHERE serie_id=".$series['id']." LIMIT 1"));

	$page = '
	<section class="header">

			<div class="backgroundSerie" style=\'background-image: url("/data/media/images/covers/'.$series["image_url"].'");\'>

				<div class="textSerie">
					<h2 class="title">'. $series["titre"] .'</h2>
					<p class="description">'. substr($series["description"],0,400) .' ...</p>
					<p class="information">'. $series["genre"] .'</p>
					<p class="information">'. $series["numbre_saison"] .' Saison - '. $series["numbre_episode"]. ' Episodes</p>
					<div class="buttonSerie">
						<button class="btn-red mr" onclick="showSaison(\''.base64_encode($saison["id"]).'\')">Commancer A Regarder</button>
						<button>Download</button>
					</div>
				</div>
			</div>

		</section>';
	return $page;
}

function makeRandomSectionSaisons($title)
{
	$getRandomSaison = mysqli_query(conn,"SELECT * FROM saison ORDER BY RAND() LIMIT 5");
	$saison = '';
	
	while ($row = mysqli_fetch_assoc($getRandomSaison)) {
		$saison .= '
		<div class="boxFilm" onmouseover="enterViewBoxFilm(this,)" style="background-image: url(\'/data/media/images/poster/'.$row["poster_files"].'\');">
					<div class="boxFilmShow" onmouseout="outViewBoxFilm(this)" style="display: none;text-align: center;">
						<h3>'.$row["titre"].'</h3>
						<h5>'.$row["numbre_episode"].' Episodes</h5>
						<p style="width: 70%">'.substr($row["description"],0,100).'...</p>
						<div>
							<button onclick="showSaison(\''.base64_encode($row["id"]).'\')" class="btn-red">Play</button>
						</div>
					</div>
				</div>';
	}

	$page = '
	<section class="seriesPannel">
			<h2>'.$title.' : </h2>

			<div class="groups">

				'.$saison.'

			</div>
		</section>';

	return $page;
}


function makeOneSaisonsSection($titlePanel,$saison)
{
	$getRandomSaison = mysqli_query(conn,"SELECT * FROM saison WHERE titre LIKE '$saison%' LIMIT 5");
	$saisonBoxs = '';
	
	while ($row = mysqli_fetch_assoc($getRandomSaison)) {
		$saisonBoxs .= '
		<div class="boxFilm" onmouseover="enterViewBoxFilm(this,)" style="background-image: url(\'/data/media/images/poster/'.$row["poster_files"].'\');">
					<div class="boxFilmShow" onmouseout="outViewBoxFilm(this)" style="display: none;text-align: center;">
						<h3>'.$row["titre"].'</h3>
						<h5>'.$row["numbre_episode"].' Episodes</h5>
						<p style="width: 70%">'.substr($row["description"],0,100).'...</p>
						<div>
							<button onclick="showSaison(\''.base64_encode($row['id']).'\')" class="btn-red">Play</button>
						</div>
					</div>
				</div>';
	}

	$page = '
	<section class="seriesPannel">
			<h2>'.$titlePanel.' : </h2>

			<div class="groups">

				'.$saisonBoxs.'

			</div>
		</section>';

	return $page;
}





function makeAllSaisonsSection($serie_ID, $title)
{
	$getRandomSaison = mysqli_query(conn,"SELECT * FROM saison WHERE serie_id=$serie_ID");
	$saisonBoxs = '';
	
	while ($row = mysqli_fetch_assoc($getRandomSaison)) {
		$saisonForEpisode = mysqli_fetch_assoc(mysqli_query(conn,"SELECT id FROM episodes WHERE saison_id=".$row["id"]));

		$saisonBoxs .= '
		<div class="boxFilm" onmouseover="enterViewBoxFilm(this,)" style="background-image: url(\'/data/media/images/poster/'.$row["poster_files"].'\');">
					<div class="boxFilmShow" onmouseout="outViewBoxFilm(this)" style="display: none;text-align: center;">
						<h3>'.$row["titre"].'</h3>
						<h5>'.$row["numbre_episode"].' Episodes</h5>
						<p style="width: 70%">'.substr($row["description"],0,100).'...</p>
						<div>
							<button onclick="playSaison(\''.base64_encode($saisonForEpisode['id']).'\')" class="btn-red">Play</button>
						</div>
					</div>
				</div>';
	}

	$page = '
	<section class="seriesPannel">
			<h2>'.$title.' : </h2>

			<div class="SaisonGroups">

				'.$saisonBoxs.'

			</div>
		</section>';

	return $page;
}

function getAllEpisodeFromSaison($serie,$saison,$episode)
{
	$getEpisodeSaison = mysqli_query(conn,"SELECT * FROM episodes WHERE saison_id=".$saison["id"]);
	$saisonBoxs = '';
	
	while ($row = mysqli_fetch_assoc($getEpisodeSaison)) {
		$saisonBoxs .= '
		<div class="boxFilm" onmouseover="enterViewBoxFilm(this,)" style="background-image: url(\'/data/media/images/episodes/'.$row["poster_files"].'\');">
					<div class="boxFilmShow" onmouseout="outViewBoxFilm(this)" style="display: none;text-align: center;">
						<h2>Episode '.$row["numero"].'</h2>
						<div>
							<button onclick="playEpisode(\''.base64_encode($row["id"]).'\')" class="btn-red">Play</button>
						</div>
					</div>
				</div>';
	}

	$page = '
	<section class="seriesPannel">
			<h2>Continue A Regarder Les Autre Episode De La Saison '. $episode["saison"].' : </h2>

			<div class="EpisodesGroups">

				'.$saisonBoxs.'

			</div>
		</section>';

	return $page;
}


?>
