The Yii2 Rest extension for the Yii framework
=============================================
The Yii2 Rest extension for the Yii framework

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist leegoway/yii2-rest "*"
```

or add

```
"leegoway/yii2-rest": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your controller as base controller by  :

```php
<?php 
namespace app\controllers;

use Yii;
use leegoway\rest\RestActiveController;

class MyController extends RestActiveController
{
    public $modelClass = 'app\models\User';
}

?>
```
then you can get formatted output like :
{"code":200, "msg":"", "data":{...}}
