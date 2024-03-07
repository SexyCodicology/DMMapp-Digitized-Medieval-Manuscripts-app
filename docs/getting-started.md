# Getting Started

## Installation

This section explains how to get the DMMapp up and running on your local machine or on a server.

### Requirements

The DMMapp requires the following software to be installed on your machine / server:

- [PHP](https://www.php.net/) v.^8.1
- [Composer](https://getcomposer.org/) v.^2.* [^1]
- [MySQL](https://www.mysql.com/) v.^8.0
- [NPM](https://www.npmjs.com/) v.^7.* [^2]

Furthermore we use [git-ftp](https://github.com/git-ftp/git-ftp) to deploy.

### Local installation

1. Clone the repository to your local machine or server.
2. Create a MySQL database and user for the DMMapp.
3. Run `composer install` to install the PHP dependencies.
4. Run `npm install` to install the NPM dependencies.
5. Copy the `.env.example` file to `.env` and fill in the required information.
6. Copy the `.env.cypress.example` file to `.env.cypress` and fill in the required information.
7. `php artisan key:generate` to generate an application key in the `.env` file.
8. `php artisan migrate` to migrate the database and generate the required tables.
9. Optional: `php artisan db:seed` to "seed" the database with some template data.
10. `npm run dev` to compile the assets (the required CSS, JS, etc.)
11. `php artisan serve` to start the development server.
12. Open `http://localhost:8000` in your browser.

### Server deployment

There are many ways to deploy the DMMapp on a server. The following is just one example. We are describing the way we deploy the official DMMapp using `git-ftp` for reference when committing to this repository.
`git-ftp` is a cheap way to make sure that the server only contains the files that are actually in the repository. It is not the fastest - or best - way to deploy, but it is very easy to set up and use.

!!! Important

    While `git-ftp` is a great tool for small projects, it is not recommended for larger projects as it does not execute any build steps. This means that you have to compile the assets locally and upload them to the server. Also, you will have to execute `composer install` or `composer update` on the server to install the PHP dependencies. In other words, `git-ftp` is not a replacement for a proper deployment tool like [Deployer](https://deployer.org/), [Envoy](https://laravel.com/docs/8.x/envoy) or GitHub Actions.

#### Staging environment

```bash
# setup git-ftp for the staging environment on your machine
git config git-ftp.staging.user UserExample
git config git-ftp.staging.url live.example.com
git config git-ftp.staging.password passwordExample

# deploy to the staging server
git ftp push -s staging
```

#### Production environment

```bash	
# setup git-ftp for the production environment on your machine
git config git-ftp.production.user UserExample
git config git-ftp.production.url live.example.com
git config git-ftp.production.password passwordExample

# deploy to the production server
git ftp push -s production
```

## Documentation

The DMMapp documentation is written in Markdown and compiled to HTML using [MkDocs](https://www.mkdocs.org/).
This documentation is hosted on GitHub Pages and can be found [here](https://dmmapp.github.io/docs/).
We use the official Material for MkDocs Docker image as it comes with all the required dependencies pre-installed and is the easiest way to get started.



[^1]: You can also upload `composer.phar` to the server and run it from there. See [here](https://getcomposer.org/doc/00-intro.md#downloading-the-composer-executable) for more information.
[^2]: For the official DMMapp we do not run NPM on the server as it would bring additional costs. Instead, we compile the assets locally and upload them to the server.
