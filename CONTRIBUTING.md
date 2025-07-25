# Contributing to BOTK-amlo #

Contributions are always welcome. You make our lives easier by
sending us your contributions through pull requests.

Pull requests for bug fixes must be based on the current stable branch whereas
pull requests for new features must be based on `master`.

Due to time constraints, we are not always able to respond as quickly as we
would like. Please do not take delays personal and feel free to remind us here,
on IRC, or on Gitter if you feel that we forgot to respond.

Please see http://help.github.com/pull-requests/.

We kindly ask you to add following sentence to your pull request:

"I hereby assign copyright in this code to the project, to be licensed under the same terms as the rest of the code."

## Set-up of a local development workstation

The platform is shipped with a [Docker](https://docker.com) setup that makes it easy to get a containerized environment up and running. 
If you do not already have Docker on your computer, 
[it's the right time to install it](https://docs.docker.com/install/). 


## Developing code and unit tests

Retrieve BOTK-core's dependencies using [Composer](http://getcomposer.org/):

	docker run --rm -ti -v ${PWD}:/app composer:2 install
	docker run --rm -ti -v ${PWD}:/app composer:2 update


Unit tests are performed through PHPUnit. To launch unit tests:

	docker run --rm -v ${PWD}:/app -w /app --entrypoint vendor/bin/phpunit php:8




## Pull Request Process

1. Ensure any install or build dependencies are removed before the end of the layer when doing a 
   build.
2. Update the README.md with details of changes to the interface, this includes new environment 
   variables, exposed ports, useful file locations and container parameters.
3. Edit [unreleased] tag in CHANGELOG.md and save your changes, additions, fix and delete to what this version that this
   Pull Request would represent. The versioning scheme we use is [SemVer](http://semver.org/).
4. You may merge the Pull Request in once you have the sign-off of two other developers, or if you 
   do not have permission to do that, you may request the second reviewer to merge it for you.

We are trying to follow the [PHP-FIG](http://www.php-fig.org)'s standards, so
when you send us a pull request, be sure you are following them.

Please see http://help.github.com/pull-requests/.

