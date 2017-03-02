<?php

function dispContents($u,$pn) {
   $x = $GLOBALS['xml'];
   $n = $GLOBALS['name'];
   $e = $GLOBALS['email'];
   $s = $GLOBALS['subject'];
   $m = $GLOBALS['message'];      
   if ($n=="") echo str_replace("?p=","?u=".$u."&amp;p=",trim($x->page[$pn-1]->contents));
      else {
         mail("emrickj248@comcast.net",$s,$m,"From: ".$n." <".$e.">");
         echo "Contact Information Submitted.  Thank you.";
      }
   echo "\n";
}

?>