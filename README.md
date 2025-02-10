PRYKHODKO Yehor

Symfony 7  

Listes des points attendu:

 ✅Créer au moins une entité avec les commandes
    docker compose run --rm php bin/console make:entity Person
    docker compose run --rm php bin/console make:entity Building


 ✅Créer le fichier de migration avec la commande symfony
    docker compose run --rm php bin/console make:migration
    docker compose run --rm php bin/console doctrine:migrations:migrate


 ✅Créer au moins un controller avec sa vue twig
    docker compose run --rm php bin/console make:controller PersonController
    docker compose run --rm php bin/console make:controller BuildingController


 ✅Créer une commande qui ajoute des données en BDD
    docker compose run --rm php bin/console make:command App\Command\GenerateTestDataCommand

 ✅script bash qui execute tout les test - ./run-tests.sh

Listes des points bonus
 ✅un dossier Githook, avec un precommit et prepush qui execute tout les tests


