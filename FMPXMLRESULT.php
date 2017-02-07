<?php
/*
$tmp = array(
	'fieldname1' => 'fieldname1Content',
	'fieldname2' => 'fieldname2Content'
);

$array = array(
	$tmp, $tmp, $tmp, $tmp, $tmp
);
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
	$w->writeAttribute( 'LAYOUT', 'tablename' );
	$w->writeAttribute( 'NAME', 'databasename' );
	$w->writeAttribute( 'RECORDS', count( $tmp ) );
	$w->writeAttribute( 'TIMEFORMAT', 'h:mm:ss a' );
	$w->endElement();
	$w->startElement( 'METADATA' );
	foreach( $tmp[0] as $k => $v ) {
		$w->startElement( 'FIELD' );
		$w->writeAttribute( 'EMPTYOK', 'YES' );
		$w->writeAttribute( 'MAXREPEAT', '1' );
		$w->writeAttribute( 'NAME', $k );
		$w->writeAttribute( 'TYPE', 'TEXT' );
		$w->endElement();
	}
	$w->endElement();

	$w->startElement( 'RESULTSET' );
	$w->writeAttribute( 'FOUND', count( $tmp ) );
	$i = 1;
	foreach( $tmp as $k => $v ) {
		$w->startElement( 'ROW' );
		$w->writeAttribute( 'MODID', '9' ); // For the MODID I recommend giving each your datasource an individual number so that you can track errors more easily.
		$w->writeAttribute( 'RECORDID', $i );
		foreach( $v as $c ) {
			$w->startElement( 'COL' );
				$w->startElement( 'DATA' );
					$w->text( $c );
				$w->endElement();
			$w->endElement();
		}
		$w->endElement();
	$i++;
	}
	$w->endElement();
	$w->endElement();
}
/*
MakeFMPXMLRESULTFromArray( $array );
*/
?>
