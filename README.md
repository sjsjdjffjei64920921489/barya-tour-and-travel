# Barya Tours & Travel

A Laravel 12 travel website for exploring Uganda's standout attractions, submitting booking inquiries, and managing tours through a private admin area.

## Requirements

- PHP 8.2 or newer with the Laravel-required extensions
- Composer
- MySQL 8+ or MariaDB (SQLite is also configured for local development)

## Local setup

From this directory:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
```

For quick local development, configure SQLite in `.env`:

```dotenv
DB_CONNECTION=sqlite
```

Create the database file if it does not exist, then migrate and load the sample tour listings:

```powershell
New-Item -ItemType File -Force database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Open the URL printed by `php artisan serve` (normally `http://127.0.0.1:8000`).

To use MySQL instead, set `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`, then run `php artisan migrate --seed`.

## Admin access

Create a normal account using the website registration page. Then promote that account to administrator from a trusted database connection:

```sql
UPDATE users SET is_admin = 1 WHERE email = 'your-admin-email@example.com';
```

Sign in again and open `/admin`. Do not expose admin promotion as a public form or share database credentials.

## Included functionality

- Responsive home, tours, tour details, about, and contact pages
- Search and category filtering for published journeys
- Customer registration, login, and trip-inquiry history
- Booking inquiry form with date and traveler validation
- Private admin dashboard, tour create/edit/delete, and inquiry status management
- Sample Uganda tours seeded for local preview, including Bwindi, Murchison Falls, Queen Elizabeth National Park, Kibale, Jinja, and the Rwenzori foothills

Sample tour photography links to attraction-specific Wikimedia Commons images, with creator and license credits shown alongside the photos. Keep those credits and follow the image licenses if the photos are reused. Sample tour prices are examples only and should be confirmed before publishing.

## InfinityFree deployment notes

This app targets Laravel 12 and PHP 8.2+. Before deploying, confirm the current InfinityFree PHP version, MySQL version, available extensions, SSH/Composer availability, and whether its shared-hosting rules permit Laravel's `public` document root and writable `storage` and `bootstrap/cache` directories. Shared-hosting limitations may prevent a supported Laravel deployment. If so, use a host that supports the required PHP version and Laravel filesystem/runtime requirements rather than exposing the project root or weakening permissions.

For production, configure a strong `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, secure database credentials, HTTPS, and writable storage/cache directories. Never upload a development `.env` file to a public web root.
