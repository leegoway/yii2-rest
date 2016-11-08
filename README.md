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

#### 格式化的ActiveController输出

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

#### 主动使用格式化类进行格式化输出

Besides, use the formatter class anywhere you need like this :
```php
use leegoway\rest\Formatter;

...
Formatter::success($data);//返回业务数据
Formatter::error($errors);//返回校验失败的数据
Formatter::fail($msg);//业务逻辑问题导致的失败
```
then you can get formatted output.

#### 捕获业务异常

Last，you can use following method to catch your defined exception and output formatted response.

###### a、modify your config file

```php
'errorHandler' => [
    'class' => 'leegoway\rest\RestErrorHandler',
    'errorAction' => 'site/error',
    'restErrorAction' => 'error/error'
],
```
###### b、modify your `error/error` controller
```php
<?php
namespace app\controllers;

class MyController extends leegoway\rest\RestErrorController
{
}
```

###### c、throw exception which based on `leegoway\rest\RestException`

```php
throw new leegoway\rest\RestException('msg', code);
```


#### 对actions进行权限控制

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

