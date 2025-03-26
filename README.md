# Evently - Advanced Event Management Platform
``` Project Context
Evently est une plateforme complète permettant aux organisateurs de créer, gérer et promouvoir des événements en ligne et en présentiel. Intégrée avec Stripe, elle offre une expérience d'achat de billets fluide et sécurisée pour les participants.  

Ce projet vise à développer un clone avancé d’Eventbrite en suivant les bonnes pratiques en PHP MVC avec PostgreSQL et en intégrant AJAX pour des interactions dynamiques.  

# Objectifs :  
✅ Les organisateurs peuvent publier et gérer des événements.  
✅ Les participants peuvent réserver des billets en ligne.  
✅ Un back-office admin permet la gestion des utilisateurs et des événements.  
✅ Des statistiques avancées fournissent des analyses détaillées sur les événements et les ventes.  

# Fonctionnalités Clés  

- **Gestion des Utilisateurs**  
✔ Inscription et connexion sécurisées (email, mot de passe haché avec bcrypt).  
✔ Gestion des rôles : Organisateur, Participant, Administrateur.  
✔ Profil utilisateur (avatar, nom, historique des événements).  
✔ Système de notifications (email, alertes sur le site).  

- **Gestion des Événements**  
✔ Création et modification des événements (titre, description, date, lieu, prix, capacité).  
✔ Gestion des catégories et tags (Conférence, Concert, Sport, etc.).  
✔ Ajout d’images et vidéos promotionnelles.  
✔ Validation des événements par un administrateur.  
✔ Système d’événements mis en avant (événements sponsorisés).  

- **Réservation & Paiement**  
✔ Achat de billets avec différentes options (gratuit, payant, VIP, early bird).  
✔ Paiement sécurisé via Stripe ou PayPal (mode sandbox).  
✔ Génération de QR codes pour la validation des billets à l’entrée.  
✔ Système de remboursement et d’annulation des billets.  
✔ Téléchargement des billets au format PDF après l'achat.  

- **Tableau de Bord de l’Organisateur**  
✔ Liste des événements créés avec statut (actif, en attente, terminé).  
✔ Statistiques en temps réel sur les ventes et réservations.  
✔ Exportation de la liste des participants en format CSV/PDF.  
✔ Gestion des promotions et réductions (codes promo, offres early bird).  

- **Back-Office Administrateur**  
✔ Gestion des utilisateurs (bannir, supprimer, modifier).  
✔ Gestion des événements (valider, supprimer, modifier).  
✔ Statistiques globales (utilisateurs, billets vendus, revenus).  
✔ Modération du contenu (commentaires, signalements).  

- **Interactions Dynamiques avec AJAX**  
✔ Chargement dynamique des événements (pagination sans rechargement).  
✔ Recherche et filtres avancés (catégorie, prix, date, lieu).  
✔ Autocomplétion des recherches avec suggestions.  
✔ Validation des formulaires en temps réel (disponibilité email, sécurité mot de passe).  

# User Stories  

👥 **En tant que Participant, je veux :**  
✅ Créer un compte et me connecter avec email ou Google/Facebook.  
✅ Parcourir et filtrer la liste des événements par catégorie.  
✅ Réserver un billet en ligne et recevoir un QR code.  
✅ Annuler ma réservation et demander un remboursement.  
✅ Recevoir des notifications pour les événements à venir.  

👤 **En tant qu’Organisateur, je veux :**  
✅ Publier un événement et définir les prix des billets.  
✅ Gérer mes ventes et consulter les statistiques d’inscription.  
✅ Proposer des codes promo et gérer les réductions.  
✅ Exporter la liste des participants en CSV ou PDF.  

🛡️ **En tant qu’Administrateur, je veux :**  
✅ Gérer les utilisateurs (bannir, modifier les rôles).  
✅ Approuver ou rejeter les événements soumis.  
✅ Suivre les statistiques globales et modérer le contenu.  

# Logique Métier  

📌 **Gestion des Rôles & Permissions**  
- Un Participant peut uniquement réserver des événements publics.  
- Un Organisateur peut uniquement gérer ses propres événements.  
- Un Administrateur a un accès complet (validation, modération, gestion).  

📌 **Système de Réservation**  
- Vérifie la disponibilité des billets avant confirmation.  
- Envoie un email avec le billet en pièce jointe après l’achat.  
- Permet l’annulation sous certaines conditions (remboursement partiel ou total).  

📌 **Sécurité Avancée**  
- Protection contre les attaques CSRF et injections SQL.  
- Hachage des mots de passe avec bcrypt.  
- Gestion sécurisée des sessions.  
