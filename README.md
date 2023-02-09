# PokéTCG Card Manager
A website that displays information about Pokémon cards and giving users the option to catalog their cards, create decks and collections, and other features.

## To Run Locally
1. Make sure you have PHP 8.0.2 or newer
2. Make sure extension=pdo_mysql and extension=openssl are uncommented in php.ini
3. Download [cacert.pem](https://curl.se/ca/cacert.pem), put it somewhere, and copy the path
4. Put the path from Step 3 in the curl section of php.ini (curl.cainfo) and openssl section of php.ini (openssl.cafile)
5. Run php artisan serve