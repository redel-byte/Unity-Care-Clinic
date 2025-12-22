# Unity Care Clinic – CLI Version

## Description

Unity Care Clinic CLI est une version console du système de gestion médicale Unity Care Clinic.
Cette version a été développée en PHP 8 en utilisant une architecture orientée objet afin de proposer
un outil interne rapide, maintenable et extensible.

L’application permet la gestion complète des patients, médecins et départements via une interface
console interactive.

---

## Objectifs du projet

- Refactorisation du projet procédural vers une architecture OOP
- Implémentation de l’héritage, encapsulation et interfaces
- Accès aux données via MySQLi en approche orientée objet
- Création d’un menu CLI interactif
- Génération de statistiques médicales
- Validation stricte des données utilisateur

---

## Architecture du projet
```
/src
 ├── Core
 │    ├── Database.php
 │    ├── Validator.php
 │    └── ConsoleTable.php
 │
 ├── Entities
 │    ├── Personne.php
 │    ├── Patient.php
 │    ├── Doctor.php
 │    └── Department.php
 │
 ├── Menus
 │    ├── MainMenu.php
 │    ├── PatientMenu.php
 │    ├── DoctorMenu.php
 │    └── DepartmentMenu.php
 │
 └── index.php
---

## Fonctionnalités

### Gestion des Patients
- Création
- Liste
- Recherche
- Modification
- Suppression

### Gestion des Médecins
- CRUD complet
- Gestion de l’ancienneté

### Gestion des Départements
- CRUD complet
- Analyse de population

### Statistiques
- Âge moyen des patients
- Ancienneté moyenne des médecins
- Département le plus peuplé
- Répartition des patients par département

---

## Validation des données

Toutes les entrées utilisateur sont validées via la classe `Validator` :
- Email
- Téléphone
- Dates
- Champs obligatoires
- Nettoyage des entrées

---

## Affichage

Les données sont affichées sous forme de tableaux ASCII via la classe `ConsoleTable`.

---

## Exécution

```bash
php index.php
```
## Auteur
**El habib Ridouane**
alhabibridouane@gmail.com  [LinkedIn](https://linkedin.com/in/RED EL) • GitHub

---
Projet réalisé dans un cadre pédagogique – Travail individuel
Durée : 5 jours

