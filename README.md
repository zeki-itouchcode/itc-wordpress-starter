# ITC WordPress Starter

A Composer-managed WordPress project with npm workspaces, Turbo and a lightweight block theme. It follows the `public/` and `packages/` layout used in ITC projects and is based on [Roots Bedrock](https://roots.io/bedrock/).

## Requirements

PHP 8.3 or later with the extensions required by WordPress and Composer; Composer 2; Node.js 22.12 or later and npm 10 or later; a MySQL-compatible database; and a web server. Use HTTPS for production.

## Getting started

1. Use this GitHub template to create a project, then clone it.
2. Run `composer install`, `npm ci` and `npm run build`.
3. Copy `.env.example` to `.env`. Set the database credentials, `WP_HOME`, `WP_SITEURL` and eight unique WordPress keys and salts. Never commit `.env` or Composer credentials.
4. Point your web server's document root at `public/` and make `public/content/uploads/` writable. Visit `WP_HOME` to complete the WordPress installation and activate **ITC Starter Theme**.
5. In the Site Editor, edit the header, footer and page templates. Customize `packages/themes/itc-starter-theme/theme.json` and its templates for your project.

The page template renders the page title as its H1. If you use a full-page hero with its own H1, use a template without a separate post-title block or choose a suitable heading level to avoid duplicate titles.

## Project structure

- `packages/themes/` — theme source, including the starter block theme.
- `packages/plugins/` and `packages/mu-plugins/` — optional local plugin packages.
- `public/wp/` — Composer-installed WordPress core.
- `public/content/` — installed themes, plugins, must-use plugins and uploads.
- `config/` — environment-based WordPress configuration.

Composer installs local WordPress packages from `packages/` into `public/content/`. It uses symlinks for local development, so deployment artifacts must include the package source or install in a way that resolves those links. Commit `composer.json` and `composer.lock` together. Turbo coordinates `npm run build`, `npm run start` and `npm run lint` across npm workspaces. The starter theme and optional example plugin use `@wordpress/scripts`: edit their `src/` files and run `npm run build` to generate CSS, JavaScript and WordPress dependency manifests in each package’s `build/` directory. Run `npm run start` to watch both packages during development. Generated build directories are ignored by Git, so build them when installing or deploying.

For deployment, install dependencies in the release environment using `composer install --no-dev` and build the frontend assets, then verify that the theme and plugins are present and readable. Keep the database, uploads and environment configuration persistent and backed up independently. See the [Bedrock documentation](https://roots.io/bedrock/docs/) for server configuration.

## Building your own packages

The starter theme has frontend and editor entry points in `src/index.js` and `src/editor.js`, each importing its SCSS. The frontend stylesheet is also loaded in the editor so content looks consistent; `src/editor.scss` adds editor-only styling. The root `style.css` contains the WordPress theme header.

`packages/plugins/itc-starter-example` demonstrates the same `src` → `build` workflow for a plugin. It is not installed or activated by default. To try it, run `composer require itouchcode/starter-example-plugin:^1.0`, build the assets and activate it in WordPress. Replace or remove the example when starting a real project. New themes and plugins must have a `package.json` workspace with `build` and `start` scripts; Turbo then discovers and runs those scripts. Plugin PHP must enqueue its own generated assets, as the example does.

## ITC plugins

ITC Block Library and ITC Forms are premium products and are **not included** in this public repository. Install licensed copies through the delivery method supplied with your license. Composer-based private package delivery is being prepared; do not commit a license key, access token, private package archive or `auth.json`. This starter does not assume a package endpoint that is not yet available.

## AI-assisted development

Use AI to explore requirements, propose accessible designs and create WordPress blocks and patterns. Review generated code and test responsive layouts, keyboard use and editor behavior. Prefer editable blocks over a single opaque HTML block. `AGENTS.md` provides a starting set of project instructions; adapt it for each site.

## Existing sites

This is a starting point, not an in-place migration script. Moving an existing site requires a tested migration of configuration, URLs, plugins, theme, database and persistent uploads, plus a rollback plan. Do not run the WordPress installer against an existing production database.

## Attribution and license

Based on Roots Bedrock. The original copyright notice and MIT license are in [LICENSE.md](LICENSE.md).
