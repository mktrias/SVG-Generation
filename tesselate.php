<?php
header('Content-Type: image/svg+xml');
?>
<?xml version="1.0" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.0//EN"
       "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg width="544" height="900"  version="1.1"
     xmlns="http://www.w3.org/2000/svg" 
     xmlns:xlink="http://www.w3.org/1999/xlink">

<defs>

<g id="triangle1" 
style="fill: rgb(229,90,90); stroke: rgb(200,155,155); stroke-width: 2; opacity: 1.0;">
<path d="M30 45,50 65,70 45Z" />
</g>

<g id="triangle2" 
style="fill: rgb(240,150,150); stroke: rgb(200,155,155); stroke-width: 2; opacity: 1.0;">
<path d="M30 45,50 65,70 45Z" />
</g>

<g id="diamond1" 
style="fill: rgb(240,200,90); stroke: rgb(200,155,155); stroke-width: 2; opacity: 1.0;">
<path d="M50 65,90 65,110 45,70 45Z" />
</g>

<g id="diamond2" 
style="fill: rgb(293,229,229); stroke: rgb(200,155,155); stroke-width: 2; opacity: 1.0;">
<path d="M50 65,90 65,110 45,70 45Z" />
</g>


</defs>

<?php

$columns = 10;
$rows = 14;

for ($i=0; $i<$columns; $i++) {
		$triangle1_use = "<use xlink:href=\"#triangle1\" transform=\"translate(";
		$triangle2_use = "<use xlink:href=\"#triangle2\" transform=\"translate(";
		
		
		
		for($j=0; $j<$rows; $j++) {
				if ($j % 2 == 0) {
						$xt = (-50 + 63*$i);
				} else {
						$xt = (-6 + 63*$i);
				}
				
				$shift = 40;
				$yt_11 = -45 + $shift*$j;
				$yt_12 = 85 + $shift*$j;
				$yt_21 = -25 + $shift*$j;
				$yt_22 = 65 + $shift*$j;
		
				if ($i % 2 == 0) {
						echo $triangle1_use . $xt  . "," . $yt_11 . ")\" />\n";
						echo $triangle2_use . $xt  . "," . $yt_12 . ") scale(1,-1)\" />\n";
				} else {
						echo $triangle1_use . $xt  . "," . $yt_21 . ")\" />\n";
						echo $triangle2_use . $xt  . "," . $yt_22 . ") scale(1,-1)\" />\n";
				}
		}
}

echo "\n\n";

for ($i=0; $i<$columns; $i++) {
		
		$diamond1_use = "<use xlink:href=\"#diamond1\" transform=\"translate(";
		$diamond2_use = "<use xlink:href=\"#diamond2\" transform=\"translate(";
		
		for($j=0; $j<$rows; $j++) {
				if ($j % 2 == 0) {
						$xt_even = (-48 + 63*$i);
						$xt_odd = (-14 + 63*$i);
						
				} else {
						$xt_even = (-5 + 63*$i);
						$xt_odd = (29 + 63*$i);
						
				}
				
				if (($i % 2 == 0) && ($j % 2 == 0)) {
						$diamond = $diamond1_use;
				} else if (($i % 2 == 1) && ($j % 2 == 0)) {
						$diamond = $diamond2_use;
				} else if (($i % 2 == 0) && ($j % 2 == 1)) {
						$diamond = $diamond2_use;
				} else {
						$diamond = $diamond1_use;
				}
				
				$yt_top = -45 + 40*$j;
				$yt_bottom = 85 + 40*$j;
				if ($i % 2 == 0 ) {
						echo $diamond . $xt_even  . "," . $yt_top . ")\" />\n";
						echo $diamond . $xt_even  . "," . $yt_bottom . ") scale(1,-1)\" />\n";
				} else {
						echo $diamond . $xt_odd . "," . $yt_top . ") scale(-1,1)\"/>\n";
						echo $diamond . $xt_odd . "," . $yt_bottom . ") scale(-1,-1)\"/>\n";
				}
		}
}


?>

</svg>

