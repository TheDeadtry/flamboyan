<?php
	// examples
	
	header ("Content-type: text/html; charset=utf-8");
	
	require_once '../PHPWord.php';
	
	$PHPWord = new PHPWord();	
	$document = $PHPWord->loadTemplate('ujicoba.docx');
	
	// data cloning/----------------------------------------------------------
	$data4 = array(
		'val1' => array('blue 1', 'blue 2', 'blue 3'),
		'val2' => array('green 1', 'green 2', 'green 3'),
		'val3' => array('red 1', 'red 2', 'red 3')
	);
	
// dibahawah ini fungsi clonig table ke word

	// clone rows	
	$document->cloneRow('Gugus', $data4);
	
	// save file
	$tmp_file = 'result.docx';
	$document->save($tmp_file);
	
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	print "complete.";
?>