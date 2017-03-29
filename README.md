### DOCUMENTATION V1.0.0

Vourto it’s a PHP library that allow agility and usability to the code. The best solution currently.

## Installing

You can to download the lib using Composer (recommended) or simplesly downloading directly from GitHub repository.

## Composer

Download composer file (composer.json) from our repository to you local/public server or copy the below code

```
{
    "name": "vourto/vourto",
    "description": "PHPLib for code optimization and clean.",
    "type": "library",
    "keywords": ["Vourto", "lib"],
    "license": "MIT",
    "authors": [
        {
            "name": "Mauro Alexandre",
            "email": "profissionalweb04@gmail.com",
            "role": "Development"
        }
    ],
    "require": {
        "php": "^5.6.2 || ^7.0"
    }
}
```

## Direct download
Download cloning repository
```
git clone https://github.com/developerdevice/Vourto.git
```
or [downloading directly](https://github.com/developerdevice/Vourto/archive/master.zip)


### Integrating

For use the library you must to include autoload.php in your application
```
require_once "Vourto/autoload.php";
```

See below the syntax for better learning

```
$app = Prop::exec(method [POST | GET], data [array], callback [function]);
```

NOTE: if isn’t defined the callback returns true case onsuccess event be acioned.

the first example verifies if `$_GET['id']` exists and returns a notice error.

```
require_once "Vourto/autoload.php";

$app = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array(
		"callback" => "ID cannot be empty"
		)
	))
);
echo $app->getStd();
$app->close();

//output (onfail)
//ID cannot be empty

//output (onsuccess)
//true

```

You can use an callback in the event onsuccess

```
$app = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array(
		"callback" => "ID cannot be empty"
		)
	)),
    function(){
        //code here
});

//output (onfail)
//ID cannot be empty

//output (onsuccess)
//[generated the code]

```

The next examples verifies if id exists and if their length if < 4 or > 11

```
require_once "Vourto/autoload.php";

$app = Prop::exec(
	$_GET,
	array("profile" => array(
		"id" => array(
		"minlegth" => array("value" => 4, "callback" => "ID must be at least 4 characters"),
		"maxlegth" => array("value" => 11, "callback" => "ID must be a maximum of 11 characters"),
		"callback" => "ID cannot be empty"
		)
	)),
    function(){
        header("location: page.php?id=${_GET["id"]}");
});
echo $app->getStd();
$app->close();
```

The code above would be like the below code

```
if(isset($_GET["id"] === false)){
echo "ID cannot be empty";
}elseif(strlen($_GET["id"]) < 4){
echo "ID must be at least 4 characteres";
}elseif(strlen($_GET["id"]) > 11){
echo "ID must be a maximum of 11 characters";
}else{
header("location: page.php?id=${_GET["id"]}");
}
```
Now try verify 2 elements using many if statement and using Vourto LIB.

There are yet another functions:
- type [numeric, double…]
- pattern [regex]

To see more example: search the path named /bin/ and open the examples files.

## Support or Contact

Having trouble with lib ? Contact support and we’ll help you sort it out.
