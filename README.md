
Exercice composer + namespaces + autoloading
--------------------------------------------

•Utilisez composer pour intégrer la librairie fzaninotto\faker à votre projet

•Utilisez la méthode d’autoload de composer pour charger automatiquement les classes de cet exercice.

•Créez une classe \ISL\Entity\Personne comprenant les attributs suivants:

•Nom
•Prenom
•Adresse
•Code postal
•Pays
•Societe

•Créez les mutateurs et les accesseurs pour chacun d’eux

•Créez une classe \ISL\Manager\PersonneManager qui utilise faker pour générer des fausses Personnes à la demande 
(methode PersonneManager::create($nombre)

•Affichez les différentes personnes générées dans une table html (index.php)

•publiez cet exercice sur votre compte github

___________________________
BONUS

•Créez une table avec les colonnes correspondant aux attributs de Personne dans une DB de test

•adaptez la classe PersonneManager pour gérer le CRUD
