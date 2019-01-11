![compatible](https://img.shields.io/badge/PHP%207-Compatible-brightgreen.svg)[![License](https://poser.pugx.org/juanmicl/gmaps-facade/license)]
# GMaps Facade
This is Google Maps private API. I'm trying to get all the features of google maps for devs.
## Installation
### Using Composer
```sh
composer require juanmicl/gmaps-facade
```
```php
include __DIR__ . "/../vendor/autoload.php";
$gmaps = new \GmapsFacade\Gmaps();
```
If you want to test new and possibly unstable code that is in the master branch, and which hasn't yet been released, then you can use master instead (at your own risk):
```sh
composer require juanmicl/gmaps-facade dev-master
```
### I don't have Composer
You can download it [here](https://getcomposer.org/download/).
#### _Warning about moving data to a different server_
_Composer checks your system's capabilities and selects libraries based on your **current** machine (where you are running the `composer` command). So if you run Composer on machine `A` to install this library, it will check machine `A`'s capabilities and will install libraries appropriate for that machine (such as installing the PHP 7+ versions of various libraries). If you then move your whole installation to machine `B` instead, it **will not work** unless machine `B` has the **exact** same capabilities (same or higher PHP version and PHP extensions)! Therefore, you should **always** run the Composer-command on your intended target machine instead of your local machine._
## Examples
All examples can be found [here](https://github.com/juanmicl/gmaps-facade/tree/master/examples).
You can just copy this folder inside your project and test the scripts.
## Legal
This code is in no way affiliated with, authorized, maintained, sponsored or endorsed by Google or any of its affiliates or subsidiaries. This is an independent and unofficial API. Use at your own risk.
