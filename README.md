# Projet PHP S3

## Prérequis

Installer docker et docker-compose, [voir ici](https://github.com/Limit-Breker/Nuit-Info-2024-G2/wiki/Docker-windows)

## Utilisation

Pour lancer le projet, il suffit de lancer la commande suivante :

```bash
docker-compose up --build -d
```

`-d` permet de lancer le projet en arrière plan.
`--build` permet de reconstruire les images docker.

Pour arrêter le projet, il suffit de lancer la commande suivante :

```bash
docker-compose down
```

L'option `-v` permet de supprimer les volumes.

## Accès

Le projet est accessible à l'adresse suivante :
- Le site web : [localhost](http://localhost)
- Le PostgeAdmin : [localhost:8080](http://localhost:8080)

## Utilisation PostgeAdmin

Ajout d'un serveur

![ajout server](https://imgur.com/9QXfILa.png)

Configuration générale

![conf generale](https://imgur.com/lnwRehu.png)

Configuration connection

![conf connection](https://imgur.com/sXdTaLF.png)

