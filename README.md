![YouCook](https://media.discordapp.net/attachments/1139998900468592740/1173342915825778768/output-onlinepngtools.png?ex=65639bbe&is=655126be&hm=66bb8ec9aa7d7c3973f31736b9dae541cf87b5d0284eb6ddfe54cfaa171a7267&=)

# SAé 3.01 - YouCook

![Symfony](https://img.shields.io/badge/Symfony-000000?style=for-the-badge&logo=Symfony&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![GitLab](https://img.shields.io/badge/gitlab-%23181717.svg?style=for-the-badge&logo=gitlab&logoColor=white)

YouCook est un site web de partage et de gestion de recette conçu pour tout type d'utilisateur.

## Auteur(s) : [Thibault MINNEBOO](mailto://thibault.minneboo@etudiant.univ-reims.fr), [Dylan Huckel](mailto://dylan.huckel@etudiant.univ-reims.fr), [Nassim Mekhaldi](mailto://nassim.mekhaldi@etudiant.univ-reims.fr) et [Dylan Bonnevie](mailto://dylan.bonnevie@etudiant.univ-reims.fr)

## Pré-requis

- Symfony CLI
- Composer
- PHP >= 8.1

## Installation / Configuration

1. Clonez le dépôt distant sur votre ordinateur&nbsp;:

```shell
git clone https://iut-info.univ-reims.fr/gitlab/minn0004/sae3-01.git
```

2. Rendez-vous dans le répertoire du projet&nbsp;:

```shell
cd sae3-01/
```

3. Installez les différentes dépendances du projet&nbsp;:

```shell
composer install
```

4. Configurez votre base de donnée en copiant collant le fichier `.env` et en le renommant `.env.local`.

## Serveur web local

Afin de lancer le serveur web local de Symfony veuillez taper la commande&nbsp;:

```shell
composer start
```

## Style de codage

Nous suivons les bonnes pratiques de `Symfony`, afin de vérifier la conformité du code veuillez taper la commande suivante&nbsp;:

```shell
composer test:cs
```

Afin de corriger votre code selon les standards de Symfony, veuillez taper&nbsp;:

```shell
composer fix:cs
```

## Données factices

Afin de générer les données factices de l'application, veuillez taper la commande suivante&nbsp;:

```shell
composer db
```

## Tests

Afin de lancer les tests de l'application, veuillez taper la commande&nbsp;:

```shell
composer test
```