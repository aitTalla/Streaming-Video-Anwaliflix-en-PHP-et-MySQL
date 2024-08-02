# ANWALIFLIX
![img](cap1.png)
# Site de Streaming Vidéo en PHP et MySQL

Ce projet est un site web de streaming vidéo permettant aux utilisateurs de regarder des séries et des films. 
Il est conçu pour être un template de site de streaming créatif par Ait Talla.

## Fonctionnalités

- **Catalogue de Films et Séries :** Affiche une liste de films et séries disponibles à regarder.
- **Système de Recherche :** Permet aux utilisateurs de rechercher des films et séries par titre.
- **Système de Saison :** Classe les vidéos par Saison (action, comédie, drame, etc.).
- **Systeme de Catégorisation :** Classe les vidéos par genres (action, comédie, drame, etc.).
- **Lecture en Streaming :** Lecture fluide des vidéos directement sur le site.
- **Gestion des Episode :** Chaque Episode Avec Un Nom Une Petite Description .....

## Prérequis

Avant de commencer à utiliser ce projet, assurez-vous d'avoir les éléments suivants installés :

- Serveur web (par exemple Apache ou nginx)
- PHP version 7.0 ou supérieure moi c'est avec (PHP 8.2.20 (cli) Que Jai Cree Ce Project) 
- MySQL version 5.6 ou supérieure moi ( MariaDB 10.11.6 database server )

## Installation

1. **Création de la Base de Données pour le Site :**
   ### 1. Connexion à MySQL
   Assurez-vous d'avoir accès à votre serveur MySQL via une interface comme phpMyAdmin ou en ligne de commande.
   
  ### 2. Création de la Base de Données
  1. Connectez-vous à MySQL en utilisant votre interface préférée ou via la ligne de commande :
  ``` bash
   mysql -u utilisateur -p ```

  ### 3. Création de la base de données :
   - Créez une nouvelle base de données nommée `anwaliflixDB` :
     ```sql
     CREATE DATABASE anwaliflixDB;
     ```

 ### 4. **Utilisation de la base de données** :
   - Sélectionnez la base de données que vous venez de créer :
     ```sql
     USE anwaliflixDB;
     ```

 ### 5. **Création des tables** :
   - Créez les tables nécessaires pour le site.Une Table Pour Les Serier 'series' et une autre pour les saisons des series 'saison' et une autre pour les episodes 'episodes' :

     ```sql
     -- Table des series
     CREATE TABLE `series` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `titre` varchar(255) NOT NULL,
      `title` varchar(255) DEFAULT NULL,
      `description` text DEFAULT NULL,
      `genre` varchar(100) DEFAULT NULL,
      `numbre_episode` varchar(255) DEFAULT NULL,
      `numbre_saison` varchar(255) DEFAULT NULL,
      `trialer_files` varchar(255) DEFAULT NULL,
      `banner_url` varchar(255) DEFAULT NULL,
      `date_sortie` date DEFAULT NULL,
      `image_url` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


     -- Table des episodes
     CREATE TABLE `episodes` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `serie_id` int(11) DEFAULT NULL,
      `saison_id` int(11) DEFAULT NULL,
      `titre` varchar(255) NOT NULL,
      `description` text DEFAULT NULL,
      `saison` int(11) NOT NULL,
      `numero` int(11) NOT NULL,
      `date_sortie` date DEFAULT NULL,
      `video_url` varchar(255) DEFAULT NULL,
      `folder_seriers` varchar(255) DEFAULT NULL,
      `folder_saison` varchar(255) DEFAULT NULL,
      `file_episode` varchar(255) DEFAULT NULL,
      `poster_files` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

     -- Table des saison
     CREATE TABLE `saison` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `serie_id` int(11) DEFAULT NULL,
      `titre` varchar(255) NOT NULL,
      `description` text DEFAULT NULL,
      `saison` int(11) NOT NULL,
      `numbre_episode` int(11) DEFAULT NULL,
      `fileRoot_name` varchar(255) DEFAULT NULL,
      `date_sortie` date DEFAULT NULL,
      `banner_url` varchar(255) DEFAULT NULL,
      `poster_files` varchar(255) DEFAULT NULL,
      `trialer_url` varchar(255) DEFAULT NULL,
      `episode_start_id` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

Voilà à quoi va ressembler votre base de données.

## Images et Vidéos
Vous pouvez la remplir vous-même, mais j'ai déjà ma propre base de données que je vais partager avec vous. 
Elle contient quelques séries telles que "The Walking Dead" et "The 100"...

le fichier :
- [dumpAnwaliflixDataBase.sql](dumpAnwaliflixDataBase.sql)
```bash
mysql -uroot -p Anwaliflix < dumpAnwaliflixDataBase.sql
```
### à préciser
Nous tenons à préciser que les images et vidéos présentes sur ce site ne nous appartiennent pas.

Elles peuvent être soumises à des droits d'auteur détenus par leurs créateurs respectifs ou d'autres tiers.
Nous nous efforçons de respecter pleinement les droits de propriété intellectuelle et de créditer correctement toutes les œuvres utilisées.

Si vous êtes le détenteur des droits d'auteur d'une image ou vidéo présente sur notre site et que vous estimez que son utilisation n'est pas appropriée, 
veuillez nous contacter immédiatement.

Nous prendrons les mesures nécessaires pour corriger toute erreur ou retirer l'œuvre concernée, conformément à vos droits.
Nous apprécions votre compréhension et votre coopération pour maintenir le respect des droits d'auteur et la qualité de notre contenu.

Les images telles que les couvertures des films et des séries, nous les avons trouvées sur des sites comme :
- [alphacoders](alphacoders.com/)
- [fandom](https://fandom.com/) 
- [google image](https://google.com)
