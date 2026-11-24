# aaPanel deployment

1. Create PHP 8.2+ site. Point document root to Laravel public/.
2. Enable PHP extensions: ctype, curl, dom, fileinfo, filter, hash, mbstring, openssl, pcre, PDO, pdo_mysql (or pdo_sqlite), session, tokenizer, xml, zip.
3. Configure .env with production APP_KEY, APP_DEBUG=false, DB connection and GenieACS NBI URL.
4. Run composer install --no-dev --optimize-autoloader, php artisan migrate --force, php artisan config:cache, route:cache and view:cache.
5. Set writable owner for storage/ and bootstrap/cache/.
6. Route all site requests to public/index.php and deny web access to .env, vendor, storage and .git.
7. Verify /up, login, dashboard and GenieACS connectivity before production cutover.

Do not use legacy environment dumps as Laravel configuration. Preserve the old Docker deployment until parity acceptance tests pass.
