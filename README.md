# Custom Gutenberg Blocks Plugin

It is a plugin used to create custom gutenberg blocks via Advanced Custom Fields

## Requirements

Make sure all dependencies have been installed before moving on:

- WordPress
- PHP >= 5.6
- Advanced Custom Field Pro (if you don't have it we will install it automatically, however, we doesn't offer you a license, so it's up to you to activate it)

## Structure

```
plugins/custom-gutenberg-plugin/    # → Root of your plugin.
├── assets/                         # → Assets directory.
│   ├── build/                      # → Assets build directory.
│   └── src/                        # → Assets source directory.
├── node_modules/                   # → JS packages (never edit).
├── src/                            # → PHP directory. 
├── blocks/                         # → Blocks directory. 
├── templates/                      # → Templates for plugin views.
├── vendor/                         # → Composer packages (never edit).
├── .gitignore                      # → Git ignore file.
├── CHANGELOG.md                    # → Changelog file for GH.
├── LICENSE                         # → License file.
├── custom-gutenberg.php            # → Bootstrap plugin file.
├── README.md                       # → Readme MD for GitHub repository.
└── uninstall.php                   # → Uninstall file.
```

### How to create new block

Go to plugin directory -> blocks, make a copy of the directory and name it as you want. For instance name it demo2. 
Inside demo2 rename a class to Demo2, and be sure to change namespace as well.

After you changed namespace, go to functions/gutenberg_register_blocks.php and find on line 50 array $classes
```php
$classes = [
    new Demo\Demo(),
];
```

And add to this array your class, for instance it will look like this
```php
$classes = [
    new Demo\Demo(),
    new demo2\Demo2(),
];
```

In class you can add fields, just return them as array of acf fields.
