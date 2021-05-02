## Changelog V1.1.3 ##
Date published: 2 May 2021

### New features & changes ###
- Updated composer and npm
- Added project files for: snoepwinkel, cloudstorage, socialmedia, garageochten. (Note that these projects don't load properly on local env. & DB password isn't set)

### Bug fixes ###
- Fixed url's towards projects to keep https

## Version update procedure ##
1. Check README + config contents and version/date
2. Upload to webserver
3. Commit to Git
4. Clear README + config contents and version/date

## New development environment ##
1. Run command: composer install
2. Run command: npm install
3. Use the command 'npm run watch' to compile SCSS and JS
