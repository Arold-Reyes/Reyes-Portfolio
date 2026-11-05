# Reyes-Portfolio

A professional, responsive e-portfolio for **Arold Mina Reyes** — BSIT student, Technical Instructor, and IT Infrastructure enthusiast.

Built with **Laravel 12**, **Tailwind CSS v4**, and **Alpine.js**.

## Features
- Light / dark mode with system preference detection and localStorage persistence
- Animated hero section with particle/constellation canvas background
- Project gallery with category filtering, image lightbox, and modal detail view
- Certificates & webinars with category filtering, always-visible previews, and an embedded PDF viewer
- Working contact form with validation, rate limiting, and email delivery
- SEO metadata: canonical URL, Open Graph, Twitter cards, and `Person` structured data
- Generated `sitemap.xml` and `robots.txt` (served through Laravel)
- Fully responsive layout with accessible mobile navigation, skip link, focus rings, and reduced-motion support

## Tech Stack
- Laravel 12 (PHP 8.2+)
- Tailwind CSS v4
- Alpine.js
- Vite

## Running locally
```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan serve
```

The contact form uses the `MAIL_*` settings in `.env`. With the default `MAIL_MAILER=log`, messages are written to `storage/logs/laravel.log` instead of being sent — configure SMTP before deploying.

## Testing
```bash
php artisan test
```

## Deploying
1. Set `APP_ENV=production`, `APP_DEBUG=false`, and the real `APP_URL` (used for canonical links, Open Graph tags, and the sitemap).
2. Run `composer install --no-dev --optimize-autoloader` and `npm ci && npm run build`.
3. Run `php artisan config:cache`, `route:cache`, and `view:cache`.
4. Make sure `storage/` and `bootstrap/cache/` are writable, and configure a real mailer.

## License
This project is for personal/portfolio use only.
