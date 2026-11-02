# ITC WordPress Starter

A Composer-managed starting point for custom WordPress sites, based on [Roots Bedrock](https://roots.io/bedrock/). It keeps application configuration in environment variables and WordPress core and dependencies in the lock file, while the editor remains the place to manage page content.

## Requirements

PHP 8.3 or later with the extensions required by WordPress and Composer, Composer 2, a MySQL-compatible database, and a web server configured to serve the `web/` directory. HTTPS is required for a production deployment.

## Start a project

1. Copy this repository for your project and run `composer install`.
2. Copy `.env.example` to `.env`. Set database credentials, `WP_HOME`, `WP_SITEURL` and eight unique WordPress keys and salts. Never commit `.env` or Composer credentials.
3. Point the web server document root at `web/`, make `web/app/uploads/` writable and visit `WP_HOME` to complete the WordPress installation.
4. Commit `composer.json` and `composer.lock` together. Deploy with `composer install --no-dev` on a compatible PHP runtime; back up the database and uploads independently of the application files.

The default theme is included to make a new install usable. Add your project theme and plugins as needed. Bedrock stores WordPress at `web/wp` and content at `web/app`; follow the [Bedrock documentation](https://roots.io/bedrock/docs/) when configuring your server.

## ITC plugins

ITC Block Library and ITC Forms are premium products and are **not included** in this public repository. Install licensed copies through the delivery method supplied with your license. Composer-based private package delivery is being prepared; do not put a license key, access token, private package archive or `auth.json` in this repository. This starter does not assume a package endpoint that is not yet available.

## AI-assisted development

Use AI to explore requirements, propose accessible designs and create WordPress blocks and patterns. Review generated code and test responsive layouts, keyboard use and editor behavior. Page content should use editable blocks instead of a single opaque HTML block where practical. `AGENTS.md` provides a starting set of project instructions; adapt it for each site.

## Existing sites

This is a starting point, not an in-place migration script. Moving an existing site requires a tested migration of configuration, URLs, plugins, theme, database and persistent uploads, plus a rollback plan. Do not run the WordPress installer against an existing production database.

## Attribution and license

Based on Roots Bedrock. The original copyright notice and MIT license are in [LICENSE.md](LICENSE.md).
