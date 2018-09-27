# time_sheet

#how-to-install
1. Clone into web server accessible dir
2. Make sure all CakePHP deps (php extensions) are met like ext-intl and mbstring
3. Ensure that the dir is writable by the web server
4. Create and import the schema (also create another database for tests)
5. Rename app.default.php to app.php under /config
6. Adjust the database configurations under 'default' in app.php accordingly
7. Adjust the test database configurations under 'test' in app.php accordingly
8. Test by navigating to the application in the browser

#how-to-test
1. Go to application dir
2. Run vendor/bin/phpunit --verbose
