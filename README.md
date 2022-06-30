# apiConsumer

## Table of contents
* [General info](#general-info)
* [Requirements](#requirements)
* [Setup](#setup)

## General Info
GithubAPI consumer

## Requirements
* PHP 8.1.6
* Symfony 5.4.9 with all its requirements
* Apache server

## Setup
```
$ git clone git@github.com:MJankoo/apiConsumer.git
$ cd apiConsumer
$ composer install
```
You also have to set your GitHub's user data.
```
$ php bin/console secrets:set GITHUB_USERNAME
$ php bin/console secrets:set GITHUB_PERSONAL_TOKEN
```

After that application is ready to use.
