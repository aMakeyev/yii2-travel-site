<?php
function dbg($array, $stop = true) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}
?>