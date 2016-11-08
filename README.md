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

Besides, use the formatter class anywhere you need like this :
```php
use leegoway\rest\Formatter;

...
Formatter::success($data);//返回业务数据
Formatter::error($errors);//返回校验失败的数据
Formatter::fail($msg);//业务逻辑问题导致的失败
```
then you can get formatted output.

Third, if you need check permission of action level, you cound write code like following:
###### a、and you should reuqire leegoway\yii2-uic 
```php
composer require leegoway\yii2-uic
```
###### b、modify your config
```php
return [
    'components' => [
        'uicAuther' => [
            'class' => 'leegoway\uic\Auther',
            'domain' => 'autops.corp.elong.com',//cookie的domain属性
            'path' => '/',//cookie的路径
            'expire' => 7200 //超时时间
        ]
    ],
];
```
###### c、check your action permission
```php
class MyController extends RestActiveController
{
	public $uicRules = [
		'index' => [
			'orgainzationId' => '...',
			'permissionId' => '...'
		],
		'view' =>  [
			'orgainzationId' => '...',
			'permissionId' => '...'
		],
		...
	];

}
```
