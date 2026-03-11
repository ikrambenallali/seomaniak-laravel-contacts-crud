# seomaniak-laravel-contacts-crud

## Description

Une application Laravel simple pour la gestion des contacts avec des opérations CRUD (Créer, Lire, Mettre à jour, Supprimer). Cette application permet de gérer une liste de contacts avec leurs informations de base.

## Fonctionnalités

-  Afficher la liste des contacts
-  Créer un nouveau contact
-  Afficher les détails d'un contact
-  Modifier un contact existant
-  Supprimer un contact

## Prérequis

- PHP >= 8.1
- Composer
- MySQL ou autre base de données supportée par Laravel

## Installation

1. **Cloner le repository**
   ```bash
   git clone <url-du-repository>
   cd seomaniak-laravel-contacts-crud
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configuration de l'environnement**
   ```bash
   cp .env.example .env
   ```
   Modifier le fichier `.env` avec vos paramètres de base de données.

5. **Générer la clé d'application**
   ```bash
   php artisan key:generate
   ```

6. **Exécuter les migrations**
   ```bash
   php artisan migrate
   ```

7. **Compiler les assets**
   ```bash
   npm run build
   # ou pour le développement
   npm run dev
   ```

## Utilisation

1. **Démarrer le serveur de développement**
   ```bash
   php artisan serve
   ```

2. **Accéder à l'application**
   Ouvrir votre navigateur à l'adresse : `http://localhost:8000`

## Routes

| Méthode | Route | Description |
|---------|-------|-------------|
| GET | `/contacts` | Afficher la liste des contacts |
| GET | `/contacts/create` | Formulaire de création d'un contact |
| POST | `/contacts` | Enregistrer un nouveau contact |
| GET | `/contacts/{id}` | Afficher les détails d'un contact |
| GET | `/contacts/{id}/edit` | Formulaire de modification d'un contact |
| PUT/PATCH | `/contacts/{id}` | Mettre à jour un contact |
| DELETE | `/contacts/{id}` | Supprimer un contact |

## Structure de la base de données

### Table `contacts`

| Colonne | Type | Description |
|---------|------|-------------|
| id | BIGINT UNSIGNED | Clé primaire auto-incrémentée |
| name | VARCHAR(255) | Nom du contact |
| email | VARCHAR(255) | Adresse email |
| phone | VARCHAR(20) | Numéro de téléphone |
| created_at | TIMESTAMP | Date de création |
| updated_at | TIMESTAMP | Date de mise à jour |

## Technologies utilisées

- **Laravel** - Framework PHP
- **Blade** - Moteur de templates
- **Vite** - Outil de build frontend
- **MySQL** - Base de données




