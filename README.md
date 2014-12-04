# DataTransBundle

## Features

 * Provides a datatrans implementation within symfony

## Requirements

 * PHP 5.3+

## Installation

Through [Composer](http://getcomposer.org)

``` {.json}
{
    "require": {
        "ibrows/datatrans-bundle": "dev-master@dev"
    }
    "repositories": [
        {
          "type": "vcs",
          "url": "git@codebasehq.com:ibrows/ibrowsch/datatransbundle.git"
        }
    ]
}
```

### Advanced Installation

#### Replace Logger

You can use each `psr-3` implementation, create your own service and add its id to the bundle configuration.

``` {.yml}
ibrows_datatrans:
    logger: my_logger_serviceid  # or logger if you like symfony default
```

## Usage

### Authorization

``` {.php}
/** @var Ibrows\DataTrans\Api\Authorization\Add\Authorization $authorization */
$authorization = $container->get('ibrows.datatrans.service.authorization');
```

For details, watch the [datatrans][1] library

[1]: https://ibrows.codebasehq.com/projects/ibrowsch/repositories/datatrans/blob/master/doc/Authorization.md