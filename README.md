# Custom Gutenberg Blocks Plugin

It is a plugin used to create custom gutenberg blocks via Advanced Custom Fields

## Requirements

Make sure all dependencies have been installed before moving on:

- WordPress
- PHP >= 5.6
- Advanced Custom Field Pro (if you don't have it we will install it automatically, however, we doesn't offer you a license, so it's up to you to activate it)

## Structure

```
plugins/your-awesome-plugin/        # → Root of your plugin.
├── assets/                         # → Assets directory.
│   ├── build/                      # → Assets build directory.
│   └── src/                        # → Assets source directory.
├── node_modules/                   # → JS packages (never edit).
├── src/                            # → PHP directory. 
├── templates/                      # → Templates for plugin views.
├── vendor/                         # → Composer packages (never edit).
├── .gitignore                      # → Git ignore file.
├── .stylelintrc                    # → Config for the style linter.
├── .webpack.mix.js                 # → Laravel Mix configuration file.
├── CHANGELOG.md                    # → Changelog file for GH.
├── composer.json                   # → Composer dependencies and scripts.
├── composer.lock                   # → Composer lock file (never edit).
├── LICENSE                         # → License file.
├── package.json                    # → JS dependencies and scripts.
├── package-lock.json               # → Package lock file (never edit).
├── custom-gutenberg.php            # → Bootstrap plugin file.
├── README.md                       # → Readme MD for GitHub repository.
~~├── readme.txt                      # → Readme TXT for the wp.org repository.~~
└── uninstall.php                   # → Uninstall file.
```

### SCSS Coding Standard (SCSSCS)

We use a default standards for SCSS, but you can modify it in the `.stylelintrc` file.

You can check SCSSCS using a CLI:

```
npm run cs:scss
```

## Frontend

All assets are located in `assets/src/*`.

All builds are located in `assets/build/*`.

CSS preprocessor is SCSS. 

We use [Laravel Mix](https://laravel-mix.com/) for the assets build. You can modify it in `.webpack.mix.js` file.

For run Laravel mix you can use the next commands depend on situation:
```
npm run build
npm run build:production
npm run start
```