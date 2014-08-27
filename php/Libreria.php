<?php
function StringsInString($strings, $searchstring)
{
	$existe = false;
	
	$searchstring = strtolower($searchstring);
	
	foreach($strings as $str)
	{
		if(strpos($searchstring, $str) !== false)
		{
			$existe = true;
			break;
		}
	}
	
	return $existe;
}