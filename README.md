# DMS Lara — Laravel ACS Management

Laravel-native web application for migrating Pesona ACS Panel.

> Migration status: foundation scaffold. The source repository currently contains a Docker disaster-recovery bundle, not the original API/frontend source. Full feature parity cannot be certified until original source code or a complete feature inventory is made available.

## Requirements
- PHP 8.2+
- Composer 2
- Laravel 12
- MySQL 8 (recommended) or SQLite for development

## Quick start
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Configure GenieACS NBI in .env. See docs/MIGRATION-MATRIX.md and docs/LEGACY-INVENTORY.md.
