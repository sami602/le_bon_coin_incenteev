le_bon_coin_incenteev
=====================

A Symfony project created on April 13, 2017, 5:26 pm(Heure de paris).
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



**Scénario B1: Un administrateur peut modifier les catégories présentes sur le site.**

**Scénario B2: Un administrateur peut modifier ou supprimer les offres.**

