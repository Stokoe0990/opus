# Opus is a Laravel-powered Wiki originally written by [ziishaned](https://github.com/ziishaned/opus)

## This fork has had the Slack notifications pulled out, has been upgraded to Laravel 5.8 and has a few further modifications to make the overall experience smoother and more stable.

Installation:

```bash
git clone https://github.com/stokoe0990/opus
cd opus
cp .env.dist .env
composer install
php artisan key:generate
php artisan migrate:fresh --force --seed
```

## Known issues
Sometimes the log channel and session driver are set incorrectly.
I've found in my own setups it's way easier to run your session through the database and use a custom log channel.
The logging issues tend to be a permissions issue, so make sure whichever user on your server has the correct permissions for the application's files.
