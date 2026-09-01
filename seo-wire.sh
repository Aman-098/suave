#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"
echo "==> Wiring routes/web.php"
if ! grep -q "seo.php" routes/web.php; then
  printf "\n\n// SEO landing pages (services, areas, wedding areas, transfers, directions)\nrequire __DIR__.'/seo.php';\n" >> routes/web.php
  echo "    appended"
else
  echo "    already wired"
fi
echo "==> robots.txt"
if [ -f public/robots.txt ] && ! grep -q "sitemap-seo.xml" public/robots.txt; then
  printf "Sitemap: https://suaveexecutivetravel.co.uk/sitemap-seo.xml\n" >> public/robots.txt
  echo "    added"
else
  echo "    already there"
fi
echo "==> Migrating"
php artisan migrate --force
echo "==> Clearing caches"
php artisan route:clear; php artisan view:clear; php artisan config:clear
echo
echo "DONE. Now run:  php artisan route:list | grep -E 'services|chauffeur-hire|transfers|directions'"
