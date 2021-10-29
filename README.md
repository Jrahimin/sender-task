# Instructions
<li>Copy .env.example data to .env</li>
<li>Run: php artisan key:generate</li>
<li>Run: php artisan config:cache</li>
<li>Run: composer install</li>
<li>Run: php artisan migrate</li>
<li>Import test_data.csv to sender_users table</li>
<li>Set CACHE_DRIVER=redis in ENV File</li>
