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
include 'data/libs/php/system.php';

?>

<!DOCTYPE html>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="description" content="">

		<title>Anwaliflix - Home</title>

		<link rel="stylesheet" href="data/libs/css/style.css">

	</head>
	<body>

		<video id="background-video" style="display: none;" poster="">
			<source src="/data/media/videos/" type="video/mp4"> 
		</video>

		<?php
		echo makeRandomSectionSerie("id desc");
		
		echo makeRandomSectionSaisons('Random Series');
		echo makeOneSaisonsSection('The Walking Dead Edition ', "The Walking Dead");
		echo makeOneSaisonsSection('The 100 Editoin', "The 100 ");


		
		echo makeRandomSectionSerie();
		

		echo makeRandomSectionSaisons('More Serie Random');
		echo makeOneSaisonsSection('La Casa De Papel Edition', "La Casa De Papel");
		echo makeRandomSectionSaisons('For You Do You Love');


		echo makeRandomSectionSerie();
		?>


		<footer style="margin-top: 100px;margin-bottom: 100px ;display: flex;justify-content: center;">
			<img src="/data/media/images/banner720x280.png" style="width: 30%">
		</footer>
	</body>
	<script src="data/libs/js/app.js"></script>
</html>
