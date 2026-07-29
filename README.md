# jeroendn-website

Personal website of Jeroen den Nijs, live at [jeroendn.nl](https://jeroendn.nl).

Public pages (home, projects, contact) plus a small admin area for managing
which projects are visible.

## Tech stack

- [Laravel 13](https://laravel.com) on PHP 8.5, MySQL
- [Bootstrap 5](https://getbootstrap.com) + Sass + jQuery, bundled with [Vite 8](https://vite.dev)
- Runs in Docker; only Docker is needed on the host

## Development environment

First-time setup:

```bash
cp .env.example .env        # then fill in the database credentials
./develop up -d --build
./develop artisan key:generate
./develop checkout
```

On Windows, run the same commands as `.\develop ...` from PowerShell or cmd
(requires Git for Windows).

### The `./develop` script

All dev commands run inside the app container, so nothing besides Docker needs
to be installed on the host:

| Command                              | What it does                                                        |
|--------------------------------------|---------------------------------------------------------------------|
| `./develop checkout` (or `c`)        | composer/npm install + database migrate + asset build               |
| `./develop code-quality-assurance` (or `cqa`) | Full quality gate, see below                                 |
| `./develop composer ...`             | Any composer command in the container                               |
| `./develop npm ...` / `npx ...`      | Any npm/npx command in the container                                |
| `./develop artisan ...`              | Any artisan command in the container                                |
| `./develop <anything else>`          | Passed through to `docker compose` (e.g. `up -d --build`, `logs -f`) |

## Code quality

`./develop cqa` runs the same checks as CI:

- `composer normalize` + `composer validate --strict`
- [Rector](https://getrector.com) (`composer rector-fix`)
- [PHP-CS-Fixer](https://cs.symfony.com) (`composer cs-fix`)
- [PHPStan](https://phpstan.org) with Larastan + Bladestan (`composer phpstan`)
- [PHPUnit](https://phpunit.de) (`composer phpunit`)
- Vite production build (`npm run build`)

CI ([.github/workflows/ci.yml](.github/workflows/ci.yml)) runs the check
variants (`rector-check`, `cs-check`) on every pull request to `master`.

## Deployment

1. Run `./deploy` on the server.
