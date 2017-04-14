# Le Bon Coin - Clone - Test technique pour Incenteev.
Afin de réaliser ce test technique, j’ai sélectionné les scénarios à implémenter de sorte à pouvoir réaliser un MVP (Minimum Viable Product) du Bon coin. Vous trouverez en gras les scénarios prioritaires à implémenter. Le reste des scénarios sera implémenté si je réussi à trouver le temps nécéssaire.

Je développerais donc les scénarios F1,F2,F3,F4 en priorité, puis B1, B2 , puis en fonction du temps qu'il me restera je considérerais les scénarios F5,F6,F7,F8,F9

**Scénario F1: Un utilisateur peut afficher toutes les annonces actives d’une catégorie spécifique ou d'une ville spécifique** 

**Scénario F2 : Un utilisateur clique sur une publication pour obtenir des informations plus détaillées**

**Scénario F3: Un utilisateur publie une annonce.** (les attributs entre parenthèse ne seront rajoutés que si les scénarios facultatifs sont implémentés)
Chaque annonce sera valide pendant 30 jours de sorte à ce que les utilisateurs ne soient par harcelés par de potentiels clients toutes leurs vies (La validité des 30 jours n'a pas été implémentée car elle n'est pas prioritaire mais le modéle est prêt.)

	Une annonce est composée de :
	 Catégorie de la publication*
	 Type d’annonce* (Offre ou Demande)
	(- Particulier ou Professionel ?)
	 Titre*
	 Texte de l’annonce*
	 Prix (en euros)*
	 ( Photos)
     Ville*
 	 Email*
	 Téléphone
     IsPhoneVisible?
	
(J’ai décidé de ne pas implémenter la distinction entre « Particuliers » et « Professionnels » , car même si elle est très intéréssante pour l’utilisateur qui souhaite éviter les frais d’agences dans le cas d’annonces immobilières, elle n’apporte rien dans le cadre d’un test technique qui viserait à évaluer uniquement ma manière de coder même si je conçois bien qu’en réalité il vaudrait mieux garder cette attribut dès le début car rajouter cette attribut dans une V2 obligerait l’administrateur du site à classer toutes les annonces déjà existantes dans le cas où il souhaiterait reproduire l’interface existante du Bon coin d’aujourd’hui ou à toute les classer en tant que « Particulier » et d’envoyer un email aux utilisateurs afin qu’ils aient la possibilité de mettre à jour leurs annonces… )

**Scénario F4: un utilisateur peut répondre** à l’annonce directement sur le site 
(Ce scénario n’est qu’à moitié en gras car il n’est pas essentiel au développement du MVP , en effet si ce scénario n’est pas implémentée l’utilisateur pourra avoir accès à l’adresse email du propriétaire de l’annonce, ce qui n’est pas pratique car le propriétaire de l’annonce risque de se faire spammer … ) 

Scénario F5: un utilisateur peut créer un compte

Scénario F6: un utilisateur authentifié sur la plateforme peut avoir accès à la liste de ses annonces publiés, les modifier ou les supprimer. (fort pratique pour l’utilisateur , mais en attendant que la fonctionnalité soit développé, l’utilisateur pourra contacter directement l’administrateur si il souhaite supprimer une annonce. Normalement entre le lancement de la MVP et le développement de cette fonctionnalité et le nombre de modifications manuelles d’annonces devraient encore être gérable pour une quantité de temps négligeable )

Scénario F7: Un utilisateur peut affiner la liste avec quelques mots-clés

Scénario F8: un utilisateur authentifié peut réactiver son annonce pour une durée supplémentaire de 30 jours après son expiration (pas prioritaires car il peut tout simplement republier une nouvelle annonce)

Scénario F9: un utilisateur peut créer un compte à la volée en créant son annonce ou créer un compte directement en cliquant sur « S’inscrire. » (pas prioritaire pour une MVP, l’adresse email suffit)



**Scénario B1: Un administrateur peut rajouter ou modifier les catégories et les villes présentes sur le site.**

**Scénario B2: Un administrateur peut modifier ou supprimer des annonces.**

# Petite remarques sur le déroulement du test technique 

**Scénarios implémentés:**
Les scénarios F1,F2,F3,F4,B1 et B2 ont été implémenté et tésté à travers le navigateur. Je n'ai malhereusement pas eu le temps d'écrire les tests unitaires et fonctionelles ni d'implémenter les scénarios non-prioritaires (mais essentiel quand même pour que la V1 soit complete)F5,F6,F7,F8 et F9 qui m'auraient demandé beaucoup trop de temps pour un projet factice.

**Erreur de débutant sur les commits de F1 à F4 :( (Désolé !!)**

J'ai fait une grave erreur lors de mes commits, plutot que de faire comme j'avais l'habitude : "git add ." puis "git commit -m message"
Je ne faisais que des "git commit -a -m message" en pensant que le -a permettait de rajouter toutes les modifications (y compris celles des nouveaux fichiers créés), j'ai eu le malheur de découvrir après avoir fini d'implémenter F4 qu'en fait le -a ne prenait en compte que les modifications des fichiers déjà existants dans le dépot git... Désolé pour cette erreur de débutant, cela ne se reproduira plus. A partir de B1 les commits sont réguliers.
 
 **Pause diner après l'implémentation de F4**"

Afin de me consoler suite à l'énorme erreur que j'ai commise par rapport aux commits, je me suis accordé une pause diner après l'implémentation de F4, le temps d'implémentation de B1 et B2 a été fait assez rapidement (20-30 minutes) grace au bundle EasyAdminBundle que j'ai découvert grace à ce test.

**DataFixtures**

Des données initiales ont été préparés dans les data-fixtures pour le chargement de quelques annonces factices, villes et catégories:
<code>
php app/console doctrine:fixtures:load
</code>

**Back-end admin**
L'interface d'administration est accesssible à l'adresse : 
<code>
localhost:8000/admin, 
nom d'utilisateur: admin 
mot-de-passe: admin.
</code>

**Base de donnée en PostGreSQL**
La base de donnée étant en postgreSql assurez vous donc d'avoir le driver "pdo_pgsql" installé sur votre machine pour le test de l'App ou de changer la configuration de la base de donnée (config.yml et parameters.yml).
(Le choix de PostGreSQL n'a pas été fait au hazard mais a été basé sur le site original du bon coin qui avait fait migré sa base de donnée de MySql vers Postgresql http://www.postgresqlfr.org/temoignages/le_bon_coin , même si , au final , pour la taille du projet et comme j'utilise doctrine, je suis conscient que cela ne change rien dans le cadre de ce test technique),


**Explication des variables non-utilisées dans le modele de l'entité "Publication"**

Dans le modele de l'entité "Publication" vous pourrez trouver :

- la variable token(string) , qui est généré à partir de l'adresse email de l'utilisateur et qui aurait servi à générer des liens d'edition et de supression d'annonces que l'utilisateur aurait pu recevoir par email afin qu'il puisse modifier ou supprimer ses annonces sans qu'il ait besoin d'avoir un compte sur la plateforme.(Ce qui est pratique quand on a pas encore de base de donnée d'utilisateur déjà prête sur la plateforme) Cette fonctionnalité n'a pas été implémentée mais aurait pu l'être très simplement et rapidement en remplaçant "id" par "token" dans les routes de publication_edit et publication_delete et en modifiant legerement les methodes edit et delete dans le controlleur de Publication.
- les variables created_at, updated_at qui nous permettent de garder une trace de l'action de l'utilisateur sur ses annonces et la variable expires_at , qui nous permet de ne garder active une annonce que pendant 30 jours, la variable est bien définie mais la fonctionnalité de désactiver les annonces après 30 jours n'a pas été implémentée car elle n'était pas prioritaire.
- la variable is_public(boolean) qui aurait pu permettre à l'utilisateur de creer une prévisualisation de l'annonce avant de la rendre public
- la variable is_active(boolean) qui aurait pu permettre à l'administrateur de vérifier les annonces postés par les utilisateurs et de les activer avant leur publication sur la plateforme.

Toutes ces variables représentent donc des fonctionnalités qui existent dans le reel site du bon coin, mais qui n'était pas prioritaires à implémenter. J'ai toutefois décider de les intégrer dès le début dans le modéle afin que le développement de ces fonctionnalités soit facilité dans l'hypothétique futur.

# How to install

**Requirements** : pdo_pgsql  and PostgreSQL 

(If it's the first time you use postgresql, you may want to create a super user first: https://chartio.com/resources/tutorials/how-to-change-a-user-to-superuser-in-postgresql/)

(Otherwhise you could modify the file config.yml file replacing "pdo_pgsql" by "pdo_mysql")

1. Run <code> Composer install </code>
2. For a pgsql config enter for the variables of the file "parameter.yml" the following:
  -  database_host:     localhost
  -  database_name:     leboncoin_incenteev
  -  database_user:      (the username of your superuser of postgresql  )
  -  database_password: (password of the superuser)
  -  database_port: 5432 (default port of postgresql)
  
  
  3. Configure the mailer with the following:
  - mailer_transport: gmail
  - mailer_user: leboncoinclone@gmail.com
  - mailer_password: leboncoin602
  - mailer_host: 127.0.0.1 (this variable is not used in the config)

(at this point you may have encountered this error : " [Doctrine\DBAL\Driver\PDOException] SQLSTATE[08006] [7] FATAL:  database "leboncoin_incenteev" does not exist" but don't worry it's going to be fixed after the next step if you have entered the good database parameters and have pdo_pgsql et PostgreSQL working)
  
4. Run <code> php app/console doctrine:database:create </code>
5. Run <code> php app/console doctrine:schema:update --force </code>
6. Run <code>php app/console doctrine:fixtures:load</code>
7. Run <code> php app/console assets:install --symlink </code>
8. Run <code> php app/console server:run </code>

You're good to go! You can access the user interface at http://localhost:8000/ and the admin interface at http://localhost:8000/admin (user: admin, password: admin) If you encounter any problem or bug, don't hesitate to contact me 
(Email : saminsa602@gmail.com or Skype: sami6023 )
  
  
    


