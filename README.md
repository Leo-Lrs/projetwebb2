VERSION 0. 4 MISE A JOUR LE 01 /0 7 /19 BORDEAUX YNOV CAMPUS

# E-SHOP

#### Type :  PROJET

#### Formations : Ynov Informatique

#### Promotions : Bachelor 2

#### UF : Technologies WEB & Base de données
<br>

### 1. CADRE DU PROJET

Ce projet permet l’évaluation des compétences acquises grâce aux modules des UF
« Technologies Web » et « Base de données ». Pour ce faire, ce projet devra être réalisé en
groupe de 2.

Vous pouvez soumettre un projet personnel dont le contenu et les fonctionnalités devront
respecter des conditions décrites dans la partie « Projet personnel ». Ce projet devra être
validé par l’établissement.

Si vous n’avez pas d’idée de projet, vous avez le choix parmi une liste de projets proposés dans
la partie « Projets au choix ».

Un bonus sera apporté aux projets personnels et aux groupes qui se challengent en proposant
des fonctionnalités plus poussées.

Les ressources qui vous sont proposées pour réaliser ce projet sont sur le Framework Laravel
et la base de données MySQL. Si vous prenez le choix d’utiliser d’autres technologies pour
réaliser votre projet, il vous appartient d’effectuer les recherches par vous-même.

Date de début : .........................................

Date de rendu : .........................................

### 2. OBJECTIFS DE FORMATION VISÉS

Vous serez évalué sur les compétences suivantes : _UF Technologie web et base de données._

##### FRAMEWORK WEB

- maîtriser les outils du Framework
- mettre en place la persistance de données via un ORM
- organiser son projet en respectant l’arborescence des fichiers du Framework
- traiter des formulaires web (CRUD)
- gérer le système d’authentification

## CRÉER UN SITE WEB ERGONOMIQUE

- structurer visuellement le contenu d’un site avec une démarche centrée utilisateur

## CRÉER UN SITE WEB RESPONSIVE

- mettre en œuvre les techniques du web adaptatif

## POO (Programmation Orientée Objet)

- programmer en orienté objet pour manipuler les données du site

## CRÉER DES ANIMATIONS SUR LE SITE

- animer l’aspect graphique d’une page web en manipulant son contenu

##### BASE DE DONNÉES

- créer une base de données et des tables pour stocker les données du site
- créer des requêtes SQL pour manipuler les données de votre base de données

## ALGORITHME

- mettre en place des fonctionnalités mettant en avant vos compétences en algorithmie

##### SERVEUR WEB

- mettre en place un environnement de développement
- mettre en place un environnement de production

## VERSIONNER SON CODE

- utiliser un outil de versionning de code

### 3. PREREQUIS

- FRAMEWORK WEB
- Base de données (MySQL, MongoDB...)
- POO (Programmation Orientée Objet)
- Serveur WEB (Apache, Nginx)
- HTML/CSS
- JavaScript
- Langage web (PHP, NodeJS, Python, Ruby...)
- GIT
- UML
- Gestionnaire de dépendances (composer, npm, pip...)
- ORM

### 4. LIVRABLES

- dépôt GIT de votre site à jour
- votre site web en ligne (Serveurs d’Ynov)
- un document de présentation de votre projet (architecture du site,
    technologies utilisées, structure de la base de données, fonctionnalités
    majeures, captures d’écran...)

### 5. MODALITÉS D’ÉVALUATION DU PROJET

Vous serez évalué sur l’ensemble des productions. L’évaluation prendra aussi la forme d’une
présentation orale de synthèse d’environ 1 5 minutes accompagnée d’un support de
présentation et d’une démonstration des fonctionnalités du site mises en place.

Le jury sera composé d’une partie des intervenants des cours de l’UF « Technologies Web » et
« Base de données ».

Un temps de questions-réponses d’une durée de 5 minutes sera prévu à l’issue des 1 5
minutes.

Des évaluations intermédiaires auront également lieu au cours du déroulement du Projet.

##### RÉCAPITULATIF DE LA GRILLE DE NOTATION

Le projet personnel décrit ci-dessous comporte 14 points de difficulté. A vous d’y ajouter des
fonctionnalités pour atteindre les 16 points minimums requis. Vous pouvez vous référer aux
projets proposés pour vous faire une idée des fonctionnalités et des points qui leurs sont
attribuées. Les fonctionnalités devront être validées par l’établissement.

Un point bonus sera ajoutés à la note finale si vous choisissez de réaliser un projet personnel.

Selon le nombre de points de difficulté total mis en place sur votre projet, des points bonus
seront accordés selon les paliers suivants :
_Points de difficulté : Entre 30 et 35 0 point bonus
Points de difficulté : Entre 35 et 40 1 point bonus
Points de difficulté : Plus de 40 2 points bonus_

Les projets proposés devront être réalisés dans leurs intégralité pour obtenir la totalité des
points.

### 6. DESCRIPTIF DU PROJET

Vous êtes totalement libre quant à l’apparence de vos interfaces. L’utilisation de librairies
(bootstrap, tailwind, materialize...) est autorisée et encouragée afin de gagner en rapidité de
développement.

Vous avez la possibilité de choisir entre un projet personnel ou un projet proposé.

### BONUS POUR TOUS LES PROJETS :

Vous pouvez implémenter une architecture de type API REST. Celle-ci constitue un bonus et n’est donc pas obligatoire.

### PROJET : ECOMMERCE

**Présentation**

Il s’agit d’un site e-Commerce de vente de jeux vidéo. Les utilisateurs peuvent acheter des jeux
vidéo. Lorsqu’un utilisateur en achète un, il recevra un email avec le code pour activer son jeu
sur sa plateforme (PC, Xbox, PlayStation, ...) ainsi qu’une facture en PDF. Cette facture se
retrouvera également dans son espace membre sur le site. Un membre ne peut acheter un
jeu que s’il dispose d’un solde suffisant. Également, les jeux ont une quantité définie, il faudra
vérifier le stock avant d’autoriser un achat.

Un espace administration permet de gérer les jeux en vente et les informations des membres.

**Pages**

Le site se composera obligatoirement des pages suivantes :

- page d'accueil (catalogue des jeux vidéo)
- page produit (description et avis)
- page du panier d’achat
- page d’espace membre
- page d’inscription / connexion

L'administration se composera obligatoirement des pages suivantes :

- page tableau de bord
- page des membres
- page des jeux
- page de connexion

**Fonctionnalités**

```
Partie membres
```
- la page d’accueil :
    - liste de tous les jeux disponibles avec un système de pagination _difficulté :_ 3
    - un système de recherche par le nom du jeu _difficulté :_ 2
- les utilisateurs peuvent se créer un compte et se connecter. Ils pourront compléter et
    modifier leur profil _difficulté :_ 5
       - chaque profil utilisateur possède :
          - un prénom
          - un nom
          - une adresse email
          - une date de naissance
          - un solde (factice)

- la page produit contient : _difficulté :_ 7
    - l'image du jeu
    - le nom du jeu
    - le prix du jeu
    - la note moyenne
    - les avis des acheteurs
    - un bouton d’achat
    - un formulaire pour ajouter/modifier son avis (si le membre a déjà acheté le
       jeu)
- un email automatique est envoyé à l’acheteur après la vente avec : _difficulté :_ 5
    - le code d’activation
    - la facture en PDF

```
Partie administrateur
```
- un espace administrateur est mis en place avec une authentification _difficulté :_ 3
- un tableau de bord est présent dans l’espace administrateur avec des informations
    tels que : _difficulté :_ 2
       - nombre de membres
       - nombre de ventes
       - nombre de nouvelles ventes sur les 7 derniers jours
       - les revenus du site totaux
       - les revenus du site sur les 7 derniers jours
- les administrateurs peuvent gérer les jeux avec un CRUD : _difficulté :_ 5
    - le CRUD permet d'ajouter/modifier/supprimer un jeu avec :
       - un nom
       - une description
       - une photo
       - une quantité
       - un prix
       - un code d’activation
    - les administrateurs peuvent consulter :
       - la note moyenne des notes
       - les avis laissés par les acheteurs
- les administrateurs peuvent gérer les membres avec un CRUD : _difficulté :_ 4
    - le CRUD permet de modifier :
       - un prénom
       - un nom
       - une adresse email
       - une date de naissance
    - les administrateurs peuvent consulter :
       - les achats de jeux
       - les factures en PDF

_Degré de difficulté total : 36 points_


VERSION 0.4 MISE A JOUR LE 01/07/19 BORDEAUX YNOV CAMPUS

### 7. RESSOURCES COMPLEMENTAIRES

Environnement de dev : https://laravel.com/docs/5.8/homestead

GIT : https://www.grafikart.fr/formations/git

Composer : https://getcomposer.org

Documentation Laravel 5.8 : https://laravel.com

Commande Laravel : https://laravel.com/docs/5.8/artisan#writing-commands

ORM : https://laravel.com/docs/5.8/eloquent

MAILING : https://laravel.com/docs/5.8/mail

Integrer du CSS & JS : https://laravel.com/docs/5.8/mix#working-with-scripts

REACT : https://reactjs.org

VueJS : https://vuejs.org

SELECT2 JS: https://select2.org

Date Picker: https://bootstrap-datepicker.readthedocs.io/en/latest/

Outil de débug laravel : https://laravel.com/docs/5.8/telescope

Tuto Laravel : https://morioh.com/p/9b8c8ef67bd5/laravel- 5 - 8 - tutorial-from-scratch-for-beginners

### 8. BESOINS MATERIELS ET LOGICIELS

- un IDE (environnement de développement)
- un serveur web local (WAMP, MAMP, LAMP...)
- un serveur de production (Serveur Ynov)
- un langage de développement web
- GIT