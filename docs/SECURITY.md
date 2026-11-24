# Security baseline

- Production requires HTTPS, APP_DEBUG=false and a unique APP_KEY.
- Never commit .env, production database, SQLite/WAL files, JWT secrets, or Docker image archives.
- Restrict GenieACS NBI network access to the app host and use least-privilege credentials.
- Keep destructive tasks behind role/policy checks and confirmation. The scaffold only exposes limited tasks.
- Add login throttling, password reset, user provisioning and audit logs before production.
- Encrypt persisted integration secrets using Laravel encrypted casts or Crypt.
- Never expose the raw GenieACS NBI to public browsers.
