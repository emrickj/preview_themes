<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];
   
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);

   if ($name!="") {
      // echo $subject." ".$message." ".$name." ".$email;
      
   }
   if(isset($_GET['u']) && $_GET['u']!="") $b = "_".$_GET['u'];
      else $b="";
   // echo "--".$b."--";

   if(isset($_GET['p'])) $p = $_GET['p'];
      else $p="1";
   
   $xml=simplexml_load_file("data/website".$b.".xml") or die("Error: Cannot create object");
   $xml2=simplexml_load_file("data/website2.xml") or die("Error: Cannot create object");
   //print_r($xml);
   //echo $xml->image[1];

   require 'dspmenu_nb.php';
   require 'dspcnt.php';
?>
	<title><?php echo strip_tags($xml->title) ?></title>
<style>
t1 { white-space: pre-wrap;}
<?php 
   echo $xml->style;
   echo "</style>\n";
   echo "</head>\n";
   echo "<body class='page".$p."' id='demo'>\n";
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#"><?php echo $xml->title ?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php displayMenu($p) ?>
      </ul>
    </div>
  </div>
</nav>
   <div class="container">
      <div class="row">
         <div class="col-sm-2" style="padding: 20px">
         </div>
         <div class="col-sm-8">
            <?php
            if(strlen($xml->page[$p-1]->image)>4)
               echo "<img class='img-responsive' src='http://emrickj.byethost4.com/".$xml->page[$p-1]->image."'>\n";
            ?>
            <br>
         </div>
         <div class="col-sm-2" style="padding: 20px">
         </div>
      </div>
      <div class="row">
         <div class="col-sm-2">
         </div>
         <div class="col-sm-8">
                     <?php
                        dispContents(ltrim($b,"_"),"1",$p);
                        if($xml->page[$p-1]['type']=="form" && $name=="") {
                     ?>
                           <form class="form-horizontal" role="form" method="post">
                              <div class="form-group">
                                 <label class="control-label col-sm-3" for="name">Name:</label>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-sm-3" for="email">Email Address:</label>
                                 <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-sm-3" for="subject">Subject:</label>
                                 <div class="col-sm-6">
                                    <input type="text" class="form-control" name="subject">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-sm-3" for="message">Message:</label>
                                 <div class="col-sm-6">
                                    <textarea class="form-control" rows="5" name="message"></textarea>
                                    <br>
                                    <input type="submit" class="btn btn-default" value="Submit">
                                 </div>
                              </div>
                           </form><?php
                        }
                     ?>          
         </div>
         <div class="col-sm-2" style="padding: 20px">
         </div>
      </div>
   </div>
</body>
</html>
