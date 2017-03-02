<?php

function displayMenu($pn) {
   $x = $GLOBALS['xml'];
   $u = $GLOBALS['b'];
   $n = $GLOBALS['name'];
   for($i=1;$i<=6;$i++) {
      if($i==$pn && $n=="") $bs=" class='active'"; else $bs="";
      if(strlen($x->page[$i-1]->name)>2) 
         echo "<li".$bs."><a href='?u=".ltrim($u,"_")."&p=".$i."'>" 
              . $x->page[$i-1]->name . "</a></li>";
   }
}

?>