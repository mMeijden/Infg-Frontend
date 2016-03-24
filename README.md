# Infg-Frontend
G Blok Frontend. Projectgroep 4

Installation:

NodeJS required.

change directory to src/main/webapp

change git:// url's to https:// for retrieving npm-packages
> git  config  --global  url."https://".insteadOf  git://

# Installation commands 
> npm install
 
> npm install yo grunt bower protractor generator generator-webapp generator-angular generator-protractor 

> npm install angular-ui-router
 
> bower install angular-ui-router


# Running

Run from command line:
> cd src/main/webapp

> grunt serve

# TypeScript note

All .js files in scripts/, test/spec and test/e2e folders will be gitignored. Develop only in .ts (TypeScript) files in these folders. Running grunt or grunt test commands or using intelliJ's TypeScript compiler will generate the .js files for all .ts files automaticly. Any changes inside .js files will be lost since they are generated.
# 42

Much Frontend
