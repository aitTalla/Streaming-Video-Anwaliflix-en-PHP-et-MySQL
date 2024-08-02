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

include '../libs/php/system.php';

if (!isset($_GET["watch"])) {
	die("Fail Load Saison ! Problems");
}

$episode_id = base64_decode(htmlspecialchars($_GET["watch"]));

$episode_req = mysqli_query(conn,"SELECT * FROM episodes WHERE id=$episode_id LIMIT 1");
$episode = mysqli_fetch_assoc($episode_req);

$saison_req = mysqli_query(conn,"SELECT * FROM saison WHERE id=".$episode['saison_id']." LIMIT 1");
$saison = mysqli_fetch_assoc($saison_req);

$serie_req = mysqli_query(conn,"SELECT * FROM series WHERE id=".$saison["serie_id"]." LIMIT 1");
$serie = mysqli_fetch_assoc($serie_req);


?>

<!DOCTYPE html>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="">

		<title><?= $serie["titre"] ?> - Saison <?= $episode["saison"] ?> - Episode <?= $episode["numero"] ?>  - Anwaliflix</title>

		<link rel="stylesheet" href="/data/libs/css/style.css">

	</head>
	<body>

		<section class="player">
            <div class="videoplayer">
                <video controls="" autoplay="" poster="">
                    <source src="/series/<?= $episode["folder_seriers"].'/'.$episode["folder_saison"].'/'.$episode["file_episode"] ?>" type="video/mp4">
                </video>
            </div>
            <div>
                <h2><?= $episode["titre"] ?></h2>
                <h4><?= $serie["titre"] ?> - Saison <?= $episode["saison"] ?> - Episode <?= $episode["numero"] ?></h4>
                <p class="description"><?= $episode["description"] ?></p>
            </div>

        </section>
        <?php

        echo getAllEpisodeFromSaison($serie,$saison,$episode);

        ?>

		<section class="header">

			<div class="backgroundSerie" style='background-image: url("/data/media/images/covers/<?= $serie["image_url"] ?> ");' >

				<div class="textSerie">
					<h2 class="title"><?= $serie["titre"] ?></h2>
					<p class="description"><?= substr($serie["description"],0,1000) ?></p>
					<p class="information"><?= $serie["genre"] ?></p>
					<p class="information"><?= $serie["numbre_saison"] ?> Saison - <?=  $serie["numbre_episode"] ?> Episodes</p>
					<div class="buttonSerie">
						<button class="btn-red mr" onclick="showSaison('<?= base64_encode($saison["id"]) ?>')">Commancer A Regarder</button>
						<button onclick="window.location = '/'">Home</button>
					</div>
				</div>
			</div>

		</section>

		<?php

		echo makeAllSaisonsSection($serie["id"],$serie["titre"]. " - All Saison ");

		?>

		<footer style="margin-top: 100px;margin-bottom: 100px ;display: flex;justify-content: center;">
			<img src="/data/media/images/banner720x280.png" style="width: 30%">
		</footer>
	</body>
	<script src="/data/libs/js/app.js"></script>
</html>
