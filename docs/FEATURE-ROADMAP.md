# Feature delivery roadmap

## Stage 1 — Framework/runtime foundation
- [x] Laravel bootstrap, entrypoint, Composer manifest and CI workflow
- [x] Session authentication baseline and protected web routes
- [x] GenieACS NBI adapter and initial device list/detail/task screens
- [x] aaPanel deployment notes
- [ ] Run Composer install and automated tests in a PHP 8.2+ environment

## Stage 2 — ACS core screens
- [x] NBI adapter methods for devices, faults, presets and provisions
- [ ] Device search, filtering, pagination and status indicators
- [ ] Parameter tree browser with read/write validation
- [ ] Task queue, task detail and retry/cancel controls
- [ ] Fault/event history with filters and export

## Stage 3 — Provisioning and operations
- [ ] Preset CRUD with safe JSON validation and preview
- [ ] Provision CRUD, version history and dry-run
- [ ] Virtual parameter workflows
- [ ] Firmware/file upload and transfer status
- [ ] WAN profile management matching the original product behavior

## Stage 4 — Product administration
- [ ] Admin/operator roles and per-action policies
- [ ] User management and audit log
- [ ] Encrypted integration settings
- [ ] Backup/restore and SQLite legacy importer after schema review

## Acceptance gate
No module is considered migrated until the original ACS Panel behavior is documented, implemented, permission-checked, covered by tests, and verified against a staging GenieACS instance.
