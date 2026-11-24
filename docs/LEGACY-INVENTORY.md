# Legacy inventory — ACS Panel

Audited source: private repository FerdanaRizky/acspanel, branch main, 24 Nov 2026.

## Files present
- docker-compose.yml: container genieacs-panel-api, image genieacs-panel-api:V2.3.0, port 1997, /data volume.
- backup/image/genieacs-panel-api-V2.3.0.tar.gz: Docker image archive (~89.6 MB).
- backup/data.tar.gz: application data archive; README identifies database.sqlite.
- backup/container-inspect.json: runtime details; npm start, workdir /app, nodeuser, persistent /data mount.
- backup/container-env.txt: environment variable names.
- frontend/custom-responsive.css: responsive CSS override only.
- install/backup/restore scripts: Docker disaster recovery tooling.

## Not in the tracked tree
- Original frontend source (React screens, routes, components/build output).
- Original API source, endpoint definitions, validation, business rules and authorization.
- SQLite schema and business meaning of every table.
- Full GenieACS task catalogue and vendor-specific workflows.
- User roles and permissions, integrations and feature flags.

## Evidence needed for full parity
1. Original source archive/repository for API and frontend, or complete endpoint/screen/permission inventory.
2. SQLite schema and anonymized representative records; do not upload production secrets or personal data.
3. Mapping of every screen/action/API to Laravel route, service, policy, migration and regression test.
4. Acceptance test against a staging GenieACS instance before switching production.
