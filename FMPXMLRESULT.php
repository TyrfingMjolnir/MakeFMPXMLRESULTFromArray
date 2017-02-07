<?php
/*
Example use

$tmp = array(
	'fieldname1' => 'fieldname1Content',
	'fieldname2' => 'fieldname2Content'
);

MakeFMPXMLRESULTFromArray( $tmp );
*/
function MakeFMPXMLRESULTFromArray( $tmp ) {
	$w = new XmlWriter();
	$w->openURI( 'php://output' );
	$w->startDocument( '1.0', 'UTF-8' );
	$w->startElement( 'FMPXMLRESULT' );
	$w->writeAttribute( 'xmlns', 'http://www.filemaker.com/fmpxmlresult' );
	$w->startElement( 'ERRORCODE' );
	$w->text( '0' );
	$w->endElement();
	$w->startElement( 'PRODUCT' );
	$w->writeAttribute( 'BUILD', '07-18-2011' );
	$w->writeAttribute( 'NAME', 'FileMaker' );
	$w->writeAttribute( 'VERSION', 'ProAdvanced 11.0v4' );
	$w->endElement();
	$w->startElement( 'DATABASE' );
	$w->writeAttribute( 'DATEFORMAT', 'D/m/yyyy' );
	$w->writeAttribute( 'LAYOUT', '' );
	$w->writeAttribute( 'NAME', 'CRR' );
	$w->writeAttribute( 'RECORDS', 1 );
	$w->writeAttribute( 'TIMEFORMAT', 'h:mm:ss a' );
	$w->endElement();
	$w->startElement( 'METADATA' );
	foreach( $tmp as $k => $v ) {
		$w->startElement( 'FIELD' );
		$w->writeAttribute( 'EMPTYOK', 'YES' );
		$w->writeAttribute( 'MAXREPEAT', '1' );
		$w->writeAttribute( 'NAME', $k );
		$w->writeAttribute( 'TYPE', 'TEXT' );
		$w->endElement();
	}
	$w->endElement();
	$w->startElement( 'RESULTSET' );
	$w->writeAttribute( 'FOUND', 1 );
	$w->startElement( 'ROW' );
	$w->writeAttribute( 'MODID', '0' );
	$w->writeAttribute( 'RECORDID', 1 );
	foreach( $tmp as $v ) {
		$w->startElement( 'COL' );
		$w->startElement( 'DATA' );
		$w->text( $v );
		$w->endElement();
		$w->endElement();
	}
	$w->endElement();
	$w->endElement();
	$w->endElement();
}
/*
========================================================================================
Copyright (c) 2005 - Gjermund Gusland Thorsen, released under the MIT License.
All rights deserved.
This piece of code comes with ABSOLUTELY NO WARRANTY, to the extent permitted by applicable law.
This piece of text is put at the bottom for you not to be bothered by it.
========================================================================================
*/
?>
