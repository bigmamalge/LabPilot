<div align="center">

# 🧪 LabPilot

**Gestion des expérimentations des laboratoires de recherche — Le Mans Université**

SAE S3.A.01 · Groupe 3 · Malone Daulny, Evan Heriault, Nathan Mareau

</div>

---

## 📚 Sommaire

1. [Ce qu'il y a dans le projet](#-ce-quil-y-a-dans-le-projet)
2. [Lancer le site](#-lancer-le-site)
3. [Installer la base de données](#-installer-la-base-de-données)
4. [Comptes de test](#-comptes-de-test)
5. [Comment se connecter](#-comment-se-connecter)
6. [Vérifier un compte en SQL](#-vérifier-un-compte-en-sql)
7. [Bon à savoir](#-bon-à-savoir)

---

## 🗂️ Ce qu'il y a dans le projet

| Dossier / fichier | Contenu |
|---|---|
| `index.html` | Page d'accueil : choix de l'espace selon le rôle |
| `connexion/` | Page de connexion (`index.php`) et connexion SSO Le Mans Université (`sso.php`) |
| `enseignant/` · `gestionnaire/` · `participant/` · `responsable/` · `directeur/` · `administrateur/` | Un espace par rôle, chacun avec son `index.php` |
| `commons/` | Images partagées entre toutes les pages (logo, icônes…) |
| `sql/mysql/` | Scripts de la base de données en **MySQL / MariaDB** (XAMPP) |
| `sql/mysql_serveur_univ/` | Les mêmes scripts, **sans** `CREATE DATABASE` ni `USE`, pour le serveur de l'université |
| `sql/sqlserver/` | Version **SQL Server** des compléments (non testée) |

---

## 🚀 Lancer le site

Il faut PHP. Avec **XAMPP** :

**Option 1 — dans Apache**

1. Copie le dossier du projet dans `C:\xampp\htdocs\LabPilot`.
2. Démarre **Apache** dans le panneau XAMPP.
3. Ouvre <http://localhost/LabPilot/>.

**Option 2 — serveur PHP intégré**

```powershell
C:\xampp\php\php.exe -S localhost:8000 -t C:\Users\evanr\Documents\LabPilot
```

Puis ouvre <http://localhost:8000/>.

---

## 🗄️ Installer la base de données

Dans phpMyAdmin, onglet **Importer**, un fichier à la fois, **dans cet ordre** :

| # | Fichier | Rôle |
|:-:|---|---|
| 1 | `GRP3_Livrable_3_Creation_Insertion_BDD_MySQL.sql` | Tables et données de base |
| 2 | `GRP3_Livrable_3_Complement_1_Creation_BDD_MySQL.sql` | Nouvelles tables et colonnes |
| 3 | `GRP3_Livrable_3_Complement_2_Insertion_BDD_MySQL.sql` | Les 3 rôles manquants et leurs données |
| 4 | `GRP3_Livrable_3_Exploitation_BDD_MySQL.sql` | Vues et procédures de base |
| 5 | `GRP3_Livrable_3_Complement_3a_Exploitation_BDD_MySQL.sql` | Enseignant, participant |
| 6 | `GRP3_Livrable_3_Complement_3b_Exploitation_BDD_MySQL.sql` | Gestionnaire, responsable d'équipe |
| 7 | `GRP3_Livrable_3_Complement_3c_Exploitation_BDD_MySQL.sql` | Directeur, administrateur |
| 8 | `GRP3_Livrable_3_Complement_4_Mots_de_passe_test_BDD_MySQL.sql` | *(optionnel)* mot de passe de test pour tous les comptes |

> 🏫 **Serveur de l'université** : ton compte n'a pas le droit de créer une base. Ouvre d'abord la base `sae`
> dans le panneau de gauche, puis importe les fichiers du dossier **`sql/mysql_serveur_univ/`** (même ordre).
>
> 🔁 **Pour tout recréer** : importe d'abord `GRP3_Livrable_3_Complement_0_Suppression_BDD_MySQL.sql`,
> puis refais les étapes 1 à 8.

---

## 👥 Comptes de test

### 🔑 Mot de passe

| Cas | Mot de passe |
|---|---|
| Comptes **22 à 26** (créés par le complément 2) | `Test2026!` |
| Tous les comptes, **après le script n°8** | `Test2026!` |
| Comptes **1 à 21** sans le script n°8 | ❓ **inconnu** : le script de base ne stocke que des hash (SHA-256) dont le texte d'origine n'est pas connu |

> Pour pouvoir te connecter avec tous les comptes, lance le script n°8.
> C'est un mot de passe de **test** : ne l'utilise jamais ailleurs.

### 🪪 Identifiants

Chaque compte a deux identifiants possibles :

- le **mail** universitaire, par exemple `claire.dubois@univ-lemans.fr` ;
- l'**identifiant SSO**, de la forme `i25` + numéro du compte sur 5 chiffres. Le compte 1 est `i2500001`, le compte 22 est `i2500022`.

### 🛠️ Administrateurs

| ID | Nom | Mail | Identifiant SSO |
|:-:|---|---|---|
| 25 | Yanis Costa | `yanis.costa@univ-lemans.fr` | `i2500025` |
| 26 | Anna Lise | `anna.lise@univ-lemans.fr` | `i2500026` |

### 🏛️ Directeur de laboratoire

| ID | Nom | Mail | Identifiant SSO |
|:-:|---|---|---|
| 24 | Marc Fontaine | `marc.fontaine@univ-lemans.fr` | `i2500024` |

### 👔 Responsables d'équipe de recherche

| ID | Nom | Mail | Identifiant SSO | Équipe |
|:-:|---|---|---|---|
| 22 | Isabelle Renard | `isabelle.renard@univ-lemans.fr` | `i2500022` | Perception et Cognition |
| 23 | Olivier Perrin | `olivier.perrin@univ-lemans.fr` | `i2500023` | Interactions Humain-Machine |

### 🎓 Enseignants-chercheurs

| ID | Nom | Mail | Identifiant SSO |
|:-:|---|---|---|
| 1 | Claire Dubois | `claire.dubois@univ-lemans.fr` | `i2500001` |
| 2 | Antoine Lefevre | `antoine.lefevre@univ-lemans.fr` | `i2500002` |
| 3 | Sophie Martin | `sophie.martin@univ-lemans.fr` | `i2500003` |
| 4 | Julien Moreau | `julien.moreau@univ-lemans.fr` | `i2500004` |
| 7 | Elodie Faure ¹ | `elodie.faure@univ-lemans.fr` | `i2500007` |
| 27 | Alice Morel ² | `alice.morel@univ-lemans.fr` | `i2500027` |

### 🧰 Gestionnaires / ingénieurs de laboratoire

| ID | Nom | Mail | Identifiant SSO |
|:-:|---|---|---|
| 5 | Nadia Benali | `nadia.benali@univ-lemans.fr` | `i2500005` |
| 6 | Thomas Garnier | `thomas.garnier@univ-lemans.fr` | `i2500006` |

### 🙋 Participants

| ID | Nom | Mail | Identifiant SSO |
|:-:|---|---|---|
| 8 | Lucas Bernard | `lucas.bernard@etu.univ-lemans.fr` | `i2500008` |
| 9 | Emma Petit | `emma.petit@etu.univ-lemans.fr` | `i2500009` |
| 10 | Hugo Robert | `hugo.robert@etu.univ-lemans.fr` | `i2500010` |
| 11 | Lea Richard | `lea.richard@etu.univ-lemans.fr` | `i2500011` |
| 12 | Louis Durand | `louis.durand@etu.univ-lemans.fr` | `i2500012` |
| 13 | Chloe Leroy | `chloe.leroy@etu.univ-lemans.fr` | `i2500013` |
| 14 | Nathan Simon | `nathan.simon@etu.univ-lemans.fr` | `i2500014` |
| 15 | Manon Laurent | `manon.laurent@etu.univ-lemans.fr` | `i2500015` |
| 16 | Theo Michel | `theo.michel@etu.univ-lemans.fr` | `i2500016` |
| 17 | Camille Girard | `camille.girard@etu.univ-lemans.fr` | `i2500017` |
| 18 | Maxime Roux | `maxime.roux@etu.univ-lemans.fr` | `i2500018` |
| 19 | Ines Fournier ³ | `ines.fournier@etu.univ-lemans.fr` | `i2500019` |
| 20 | Paul Lambert | `paul.lambert@etu.univ-lemans.fr` | `i2500020` |
| 21 | Jade Bonnet ⁴ | `jade.bonnet@etu.univ-lemans.fr` | `i2500021` |

<sub>
¹ Gestionnaire dans les données de départ. L'exemple <code>ChangerRoleUtilisateur(7, 1)</code> du script d'exploitation de base la passe <b>enseignant-chercheur</b>.<br>
² Compte créé par l'exemple <code>CreerUtilisateur</code> du complément 3c, avec le rôle enseignant-chercheur.<br>
³ L'exemple <code>AnonymiserUtilisateur(19)</code> du complément 3c anonymise ce compte (nom « Anonyme », plus de connexion possible).<br>
⁴ L'exemple <code>SupprimerUtilisateur(21)</code> du script d'exploitation de base supprime ce compte.
</sub>

---

## 🔐 Comment se connecter

### État actuel

> ⚠️ **La page de connexion n'est pas encore reliée à la base de données.**
> Le formulaire de `connexion/index.php` n'envoie rien et ne vérifie aucun mot de passe.

Aujourd'hui, on accède aux espaces **sans mot de passe** :

1. Ouvre `index.html`.
2. Clique sur le rôle voulu : **Enseignant-chercheur**, **Participant**, **Gestionnaire**, **Responsable**, **Directeur** ou **Administrateur**.
3. Tu arrives sur l'`index.php` de cet espace. Les noms affichés (par exemple « Anna Lise ») sont écrits en dur dans les pages.

Les pages de connexion se consultent directement :

| Page | Adresse |
|---|---|
| Connexion LabPilot | `connexion/index.php` |
| Connexion SSO Le Mans Université | `connexion/sso.php` (accessible via le bouton « Se connecter via Le Mans Université ») |

### Quand la connexion sera branchée à la base

Le principe sera le suivant :

1. L'utilisateur saisit son **mail** (ou son **identifiant SSO** sur la page SSO) et son **mot de passe**.
2. Le site calcule le SHA-256 du mot de passe et le compare à `MDP_USER`.
3. Le rôle (`ID_ROLE`) décide de l'espace à ouvrir.

| Rôle (`ID_ROLE`) | Espace ouvert |
|:-:|---|
| 1 · Enseignant-chercheur | `enseignant/` |
| 2 · Gestionnaire de laboratoire | `gestionnaire/` |
| 3 · Participant | `participant/` |
| 4 · Responsable d'équipe de recherche | `responsable/` |
| 5 · Directeur de laboratoire | `directeur/` |
| 6 · Administrateur | `administrateur/` |

---

## 🔎 Vérifier un compte en SQL

Pour contrôler qu'un couple identifiant / mot de passe est valide, dans l'onglet **SQL** de phpMyAdmin
(après avoir lancé le script n°8) :

```sql
SELECT ID_USER, NOM_USER, PRENOM_USER, LIB_ROLE
FROM UTILISATEUR
INNER JOIN ROLE ON ROLE.ID_ROLE = UTILISATEUR.ID_ROLE
WHERE MAIL_USER = 'yanis.costa@univ-lemans.fr'
  AND MDP_USER = SHA2('Test2026!', 256);
```

Une ligne s'affiche si le compte et le mot de passe sont corrects, sinon rien.

Pour voir tous les comptes avec leur rôle :

```sql
SELECT * FROM RoleUtilisateur ORDER BY ID_ROLE, ID_USER;
```

---

## 💡 Bon à savoir

- Toutes les données sont **fictives** et servent aux tests.
- Plusieurs exemples d'appel des scripts SQL dépendent de la **date du jour**. Par exemple, l'inscription au créneau 20 du 09/12/2026 échouera une fois cette date passée. Les vues et les procédures restent correctes.
- Si phpMyAdmin affiche « Commands out of sync » à l'import, importe les fichiers **un par un** et utilise les fichiers `3a`, `3b` et `3c` plutôt qu'un fichier unique.
- Le projet doit pouvoir être entièrement paramétré (nom de l'application, adresse de la base…). Ces valeurs sont stockées dans la table `PARAMETRE`.
