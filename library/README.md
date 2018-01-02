## File Structure

A pre-made gulp file will be included in CMS’s theme files along with some SASS files, located in the Gulp folder. By using a dedicated gulp file, this allows us to use SASS no matter what CMS we use. Variables, global classes, and the core site structure’s styles will be in the main styles.scss file, and additional .scss files will be included at the bottom of the styles.scss file. Additional pages on the website will have their styles separated into individual .scss files to help with organization and maintenance; include an underscore at the front of additional .scss files in the main styles folder. Using SCSS allows us to easily remove styles as the site grows and changes, helping avoid orphaned styles.


The SASS file will call bootstrap’s CSS. Bootstrap can be customized through the _bootstrapVariables.scss file.

* What the gulp file does
* Debugs CSS for various errors
* Consolidates imported .scss files
* Compresses the .scss files
* Adds appropriate browser prefixes
* Outputs errors if applicable

## Usage Instructions

First Time Setup

* Install SASS onto your computer: http://sass-lang.com/install
* Install Node onto your computer: https://nodejs.org/en/download/

## Initial Project Setup

* In command line, navigate to the theme’s CSS folder
* Run the npm install via the included package.json. This installs gulp, sass, gulp-watcher, and gulp-autoprefixer
```
npm install
```
* Run the Gulp build (gulp commands are case sensitive)
```
gulp sass
```

### Check readme in the gulp folder for additional instructions

## License

Licensed under the Open Source MIT License
