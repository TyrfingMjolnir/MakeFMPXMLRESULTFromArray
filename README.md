# FMPXMLRESULT.php
Convert PHP array to FMPXMLRESULT

Example use
singular record
```php
$tmp = array(
	'fieldname1' => 'fieldname1Content',
	'fieldname2' => 'fieldname2Content'
);

MakeFMPXMLRESULTFromArray( $tmp );

```
plural records
```php
$tmp = array(
	'fieldname1' => 'fieldname1Content',
	'fieldname2' => 'fieldname2Content'
);
$array = array(
	$tmp, $tmp, $tmp, $tmp, $tmp
);

MakeFMPXMLRESULTFromArray( $array );
```
```
/*
========================================================================================
Copyright (c) 2005 - Gjermund Gusland Thorsen, released under the MIT License.
All rights deserved.
This piece of code comes with ABSOLUTELY NO WARRANTY, to the extent permitted by applicable law.
========================================================================================
*/
```
