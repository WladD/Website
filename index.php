<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>eXtremeLab.pl</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="background">
			<div class="box-menu">
				<h1><a href="index.php">eXtremeLab</a></h1>
				<h2 class="start"><a href='index.php?category=Główna'>Strona główna</a></h2>
				<h2 class="onas"><a  href='index.php?category=Onas'>O nas</a></h2>
				<h2 class="galeria"><a href='index.php?category=Galeria'>Galeria</a></h2>
				<h2 class="newsy"><a href='index.php?category=Newsy'>Newsy</a></h2>
				<h2 class="kontakt"><a href='index.php?category=Kontakt'>Kontakt</a></h2>
				
			</div>
		
			
			<div id="bottom"></div>
			<div id="email"><input type="email" name="mail" placeholder="Podaj swoj email" size="55"/></div>
			<div id="Zobaczwicej0"><img src="images/Zobaczwicej.png"></div>
			<div id="Zobaczwicej1"><img src="images/Zobaczwicej.png"></div>
			<div id="Zobaczwicej2"><img src="images/Zobaczwicej.png"></div>
			<div id="Wylijwiadomo"><input type="image" src="images/Wylijwiadomo.png" value="WYŚLIJ&nbsp;&gt;" class="go"/></div>
			<div id="Onas">O nas</div>
			<div id="News">News</div>
			<div id="Kontakt">Kontakt</div>
			<div id="Galeria">Galeria</div>
			<div id="Napisz"><textarea name="komentarz" rows="5" cols="41" placeholder="Napisz do nas"></textarea></div>
			
			
			
			
			<div id="line0"><img src="images/line.png"></div>
			<div id="line1"><img src="images/line.png"></div>
			<div id="line2"><img src="images/line.png"></div>
			<div id="line3"><img src="images/line.png"></div>
			
		

<?php
$conn = mysql_connect('localhost','mysql','1') or trigger_error("SQL", E_USER_ERROR);
$db = mysql_select_db('loremipsum',$conn) or trigger_error("SQL", E_USER_ERROR);

if (isset($_GET['category'])) {
   
   $category = $_GET['category'];
} else {
   
   $category = "Główna";
}
echo '<div id="Newsy_0">'.$category.'</div>';
switch ($category)
{
	case "Kontakt":
echo '<div class="Kontaktt">';
echo '<h2>SKONTAKTUJ SIĘ Z NAMI</h2>';
echo '<h2>Agencja Interaktywna eXtremeLab.pl</h2>';
echo '<h2>MOBILE:    + 48 606 369 862</h2>';
echo '<h2>E-MAIL:    biuro@extremelab.pl</h2>';
echo '<h2>NIP:    678-276-37-83</h2>';
echo '<h2>GODZINY PRACY:    9.00 - 17.00</h2>';
echo '<h2>KONTAKT PRZEZ: </h2>';
echo '<h2>GG: 990533</h2>';
echo '</div>';
break;
	case "Główna":
		echo '<div class="Kontaktt">';
		echo '<h1><b>WITAMY</b></h1>';
		echo '</div>';
		break;
default:



echo '<div id="Shape4"><img src="images/Shape4.png"></div>';
$sql = "SELECT COUNT(*) FROM aticles WHERE category = '".$category."'";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

$rowsperpage = 4;

$totalpages = ceil($numrows / $rowsperpage);

if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   
   $currentpage = (int) $_GET['currentpage'];
} else {
   
   $currentpage = 1;
}


if ($currentpage > $totalpages) {
 
   $currentpage = $totalpages;
}

if ($currentpage < 1) {
   
   $currentpage = 1;
}


$offset = ($currentpage - 1) * $rowsperpage;

$sql = "SELECT title, texr, picture FROM aticles WHERE category='".$category."' LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
$r=0;
while ($list = mysql_fetch_array($result)) {
   echo '<div id="article'.$r.'">';
   echo "<img src=".$list['picture']."><br/>";
   echo "<h3>".$list['title']."</h3>";
   echo $list['texr']. "<br /><br /><br />";
   echo '<a href="">czytaj więcej</a>';
   echo "</div>";  
   $r=$r+1;
} 



		
		
		$range = 2;

echo '<div id="links" class="links">';
if ($currentpage > 1) {
   
   $prevpage = $currentpage - 1;
   
   echo "<a href='{$_SERVER['PHP_SELF']}?category=$category&currentpage=$prevpage'>poprzednia</a> ";
}  

for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
      if (($x > 0) && ($x <= $totalpages)) {
      
      if ($x == $currentpage) {
         
         echo " <b>$x</b> ";
      
      } else {
        
         echo " <a href='{$_SERVER['PHP_SELF']}?category=$category&currentpage=$x'>$x</a> ";
      } 
   } 
} 


if ($currentpage != $totalpages) {

   $nextpage = $currentpage + 1;
 
   echo " <a href='{$_SERVER['PHP_SELF']}?category=$category&currentpage=$nextpage'>następna</a> ";
} 

echo '</div>';
}
$cat=array("Onas", "Galeria", "Newsy");
for($i=0; $i<3; $i++)
{
	$sql="SELECT title FROM aticles WHERE category='".$cat[$i]."' LIMIT 0, 3";
	$result = mysql_query($sql, $conn) or trigger_error("SQL", E_USER_ERROR);
	echo '<div id="Lorem'.$i.'"><ul>';
	while ($list = mysql_fetch_array($result))
	{
		echo '<li>'.$list['title'].'</li><br/>';
	}
	echo '</ul></div>';
}


?>

		</div>
		</body>
 </html>