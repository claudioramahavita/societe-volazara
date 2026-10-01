# Société Volazara

Site web de Société Volazara, développé avec **CodeIgniter 3** (architecture modulaire HMVC).

## Structure

- `application/modules/` : modules (`Societevolazara`, `Media`, `Task`, `Templates`, `contact`)
- `application/config/` : configuration de l'application
- `assets/` : CSS, JS, images
- `uploads/` : fichiers téléversés (non versionnés)
- `system/` : noyau CodeIgniter

## Installation

1. Cloner le dépôt dans le dossier web (ex. `D:\wwwroot\societevolazara`) :
   ```bash
   git clone https://github.com/claudioramahavita/societe-volazara.git
   ```
2. Créer `application/config/database.php` (ignoré par Git) avec les identifiants de votre base MySQL.
3. Vérifier `base_url` dans `application/config/config.php` (par défaut `http://localhost/societevolazara/`).
4. Créer les dossiers `uploads/image`, `uploads/photo`, `uploads/video` et rendre `application/logs` et `application/cache` accessibles en écriture.
5. Lancer Apache/PHP (WAMP, XAMPP...) et ouvrir le site dans le navigateur.

## Prérequis

- PHP >= 5.3.7
- MySQL
- Apache avec `mod_rewrite` (voir `.htaccess`)
