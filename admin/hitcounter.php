<?php $handle = fopen("hitCounter.txt", "r");
if(!$handle){
 echo "could not open the file" ;
}
else {
	$counter = ( int ) fread ($handle,20) ;
	fclose ($handle) ;
	$counter++ ;
	echo" <strong>  Refresh count:".  $counter. " </strong>  " ;
$handle =  fopen("hitCounter.txt", "w" ) ;
fwrite($handle,$counter) ;
fclose ($handle) ;
	}
?>
