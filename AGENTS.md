# Repository Guidelines

## Project Structure & Module Organization
- `src/` hosts the package core; Filament `Resources`, `Pages`, and `Widgets` map directly to panel features—mirror this layout when adding new UI elements.
- `database/migrations/` ships publishable schema updates; keep them idempotent and versioned. Share test doubles in `database/factories/`.
- `resources/views/` contains Blade overrides, while `lang/` stores translatable strings that surface in Filament panels.
- `tests/` is Pest-based with `Tests\TestCase` bootstrapping Orchestra Testbench; CI saves artifacts to `build/report.junit.xml`.

## Build, Test, and Development Commands
- `composer install` aligns dependencies; rerun after pulling or updating the lock file.
- `composer format` executes Laravel Pint with the repo preset; run before commits.
- `composer analyse` launches PHPStan using `phpstan.neon.dist` and the baseline.
- `composer test` runs the Pest suite; add flags like `--testsuite=unit` if you segment suites.
- `composer test-coverage` collects coverage data into `build/` for CI ingestion.

## Coding Style & Naming Conventions
- Adhere to PSR-12: 4-space indentation, single quotes unless interpolation, ordered imports via Pint.
- Name Filament artefacts with the `*Resource`, `*Page`, and `*Widget` suffixes; register via the service provider or plugin class.
- Service bindings belong in `LaravelLicensingFilamentManagerServiceProvider`; prefer static constructors for configuration-heavy classes.

## Testing Guidelines
- Write Pest `it()` blocks with behaviour-focused descriptions and place architectural rules in `tests/ArchTest.php`.
- Extend `Tests\TestCase` for integration scenarios to leverage the Orchestra Testbench harness.
- Seed licensing data with factories to cover renewals, expirations, and quota usage.
- Fail the build on regressions: ensure `composer analyse` and `composer test` are clean before publishing a branch.

## Commit & Pull Request Guidelines
- Use imperative, concise commit titles (e.g., `Add license usage widget feed`); wrap bodies at ~72 characters.
- Reference issues with closing keywords in the commit body or PR description when applicable.
- Pull requests should summarize the change, list manual/automated checks, and attach screenshots for Filament UI updates.
- Confirm `composer format`, `composer analyse`, and `composer test-coverage` pass locally prior to requesting review.

## Environment Tips
- Use the Laravel workbench (`workbench/app/`) to spin up a demo panel; publish assets and migrations with `php artisan vendor:publish --provider="LucaLongo\\LaravelLicensingFilamentManager\\LaravelLicensingFilamentManagerServiceProvider"` during manual QA.
