# ACT CMS
## Installation
Require this package in your `composer.json` and update composer. This will download the package and CMS of ACT.
```
"act/cms": "dev-master"
```
Now, let's make our package "visible" to main Laravel structure, and assign alias to it, we do that by adding this line to main `composer.json` section called **"psr-4"**:
```
"autoload": {
      "classmap": [
          "database"
      ],
      "psr-4": {
          "App\\": "app/",
          "ACT\\CMS\\": "vendor/act/cms/src"
      }
},
````
And then we run this command from main folder:
```
composer dump-autoload
```
Then add the following lines to the `config/app.php`:
```
'providers' => [
    // ...

    /*
     * ACT Application Providers
     */
    ACT\CMS\CMSServiceProvider::class,

    // ...
],
```
And then, to perform actual copying, user should **publish** our views, with **Artisan** command:
```
php artisan vendor:publish
```
Adding `helpers.php` to main `composer.json` section called **"files"**:
```
"autoload": {
      "classmap": [
          "database"
      ],
      "psr-4": {
          "App\\": "app/",
          "ACT\\CMS\\": "vendor/act/cms/src"
      },
      "files": [
  		  "helpers.php"
  	  ]
},
````
And run this command from main folder:
```
composer dump-autoload
```
Then add the following lines to the `routes.php`:
```
Route::group(['middleware' => ['web']], function () {
    Route::group([ 'prefix' => 'admin' ], function(){
        Route::any('{paths?}', "\ACT\CMS\CMSController@route")->where('paths', '([A-Za-z0-9\-\/]+)');
    });

    Route::get('/', function () {
        echo 'Frontend template not found - <a href="admin">Backend</a>';
    });
});
```
Finally, install database for cms with `vendor\act\cms\src\db\install.sql`.

## Configuration
*(To be continued)*
