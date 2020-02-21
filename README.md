![logo](http://linkeddata.center/resources/v4/logo/Logo-colori-trasp_oriz-640x220.png)
# BOTK\AMLO
[![Build Status](https://img.shields.io/travis/linkeddatacenter/BOTK-amlo.svg?style=flat-square)](http://travis-ci.org/linkeddatacenter/BOTK-amlo)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/linkeddatacenter/BOTK-amlo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/linkeddatacenter/BOTK-amlo/?branch=master)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/linkeddatacenter/BOTK-amlo.svg?style=flat-square)](https://scrutinizer-ci.com/g/linkeddatacenter/BOTK-amlo)
[![Latest Version](https://img.shields.io/packagist/v/botk/amlo.svg?style=flat-square)](https://packagist.org/packages/botk/amlo)
[![Total Downloads](https://img.shields.io/packagist/dt/botk/amlo.svg?style=flat-square)](https://packagist.org/packages/botk/amlo)
[![License](https://img.shields.io/packagist/l/botk/amlo.svg?style=flat-square)](https://packagist.org/packages/botk/amlo)

Super lightweight classes for developing gateways for [AMLO core ontology](https://gitlab.com/mopso/amlo/-/tree/master/core).


## Installation

The package is available on [Packagist](https://packagist.org/packages/botk/amlo).
You can install it using [Composer](http://getcomposer.org):

```
composer require botk/amlo
```

## Overview

This package provides some php classes to transform raw data into AMLO linked data.

The goal of the libraries is to simplify the conversion of raw data (e.g. .csv or  xml file) about *unexpected activities*, *transfer*, and *risk ratings* according AMLO core ontology.

This package extends the [BOTK core library](https://github.com/linkeddatacenter/BOTK-core) and it is compatible with [LinkedData.Center SDaaS plans](http://linkeddata.center/home/sdaas)

See here [a usage example](tests/system/gateways/example1.php)

## Contributing to this project

See [Contributing guidelines](CONTRIBUTING.md)

## License

(c) Copyright 2020 By LinkedData.Center
 
See [MIT LICENSE file](LICENSE)