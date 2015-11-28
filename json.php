<?php
	$myfile = fopen("data.txt", "r") or die("Unable to open file!");
	// Output one line until end-of-file
	$src = array();
	$src['cols'][] = array('type' => 'date');
    $src['cols'][] = array('type' => 'number');
	while(!feof($myfile)) 
	{
		//$srcTemp = array();
		$str = fgets($myfile);
		if ($str != '') {
			$pieces = explode(" ", $str);
			$date = explode("/", $pieces[0]);
		//echo $pieces['1']."<br>";
			$src['rows'][]['c'] = array(
        array('v' => "Date(".$date[2].",".$date[1].",".$date[0].")"),
        array('v' => $pieces[1])
    );
		}
		
	}
	//var_dump($src);
	echo json_encode($src);
	$fp = fopen('srcdata.json', 'w');
	fwrite($fp, json_encode($src));
	fclose($fp);
	fclose($myfile);

?>