<!-- May 12 2018 made by hunter Null for acorn Search engine. updated in 2022 for vsearch for vangard ciss project 



This search engine we are going to build doesn't require MySQL in conjunction with PHP. It just requires PHP alone

This search engine simply gives the URL of the pages that are found based on the search.

It lists every page on my website that matches all of the words in the search query or either can search one directory or multiple directories on your website.

A user enters a search query.

If the search query matches anything in the files of the directory (or directories) being searched, we can output the hyperlink. As many pages that match the query get outputted.

So it's very simple.

The only thing is that your files must have appropriate names. For example, if you have a file on dandelion flowers. It will have that in the file name, for example, how-to-feed-dandelion-flowers.html or how-to-grow-dandelion-flowers.php or just dandelion-flowers.html. It has to have the name in the filename. If you have an article on dandelion flowers and it's named 123wxp.html, this search engine won't work. It's based on the fact that it looks at the file name. The file name should have the keywords that the user is searching for. -->






<?php

$search= $_POST['search_entered'];

$searchoriginal= $search;

$search= strtolower($search);

$search= trim($search);



$search= explode(" ", $search);

$countsearchterms= count($search);



$submitbutton= $_POST['submit'];



?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vsearch</title>
    <link rel="stylesheet" href="/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/alt.css"/>
  </head>
  
  
  
  <extra>
<nav role="navigation">
  <div id="menuToggle">
  
    <input type="checkbox" />
   
    <span></span>
    <span></span>
    <span></span>
    
    
    <ul id="menu">
      <a id='switch' onclick="switchTheme()"><li>light/dark mode</li></a>
      <a href="http://192.168.1.4/webpages/about.html"><li>About</li></a>
      <a href="http://192.168.1.4/webpages/vdocs.html"><li>VDocs</li></a>
      
      <a href="#"><li>V-account  -  coming soon</li></a>
    </ul>
  </div>
</nav>
</extra>


<style>
      /* css variables for darkmode */
      .dark {
         --bg: #18191b;
         --fg: white;
      }

      .white {
         --bg: white;
         --fg: #18191b;
      }

      body {
         /* use the variable */
         background-color: var(--bg);
         color: var(--fg);
      }


         
      }
   </style>
    

   <script>
      // setting theme when contents are loaded
      window.addEventListener('load', function () {
         var theme = localStorage.getItem('theme');
         // when first load, choose an initial theme
         if (theme === null || theme === undefined) {
            theme = 'light';
            localStorage.setItem('theme', theme);
         }
         // set theme
         var html = document.querySelector("html");
         // apply the variable
         html.classList.add(theme);
      })

      function switchTheme() {
         var theme = localStorage.getItem('theme');
         var html = document.querySelector('html');
         // choose new theme
         if (theme === 'dark') {
            new_theme = 'light';
         } else {
            new_theme = 'dark';
         }
         // remove previous class
         html.classList.remove(theme);
         // add new class
         html.classList.add(new_theme);
         // store theme
         localStorage.setItem('theme', new_theme);
      }
   </script>
  
  
  
  <body>
 
    <div class="wrapper">
        <div>&nbsp;</div> 
        <div>&nbsp;</div> 
       <center><img src="logo.png" alt="192.168.1.4 logo" width="350" height="120"></center>
       <div>&nbsp;</div> 
      <div class="search-input">
       <form action="" method="POST">
 <input type="text" name="search_entered" placeholder="Type to search.." value='<?php echo $searchoriginal;?>'/>


        <div class="icon"><input type="submit" name="submit" ></div>

      <div class="autocom-box">
          <!-- here list are inserted from javascript -->
        </div>

    </div>
    </form>


    <script src="suggestions.js"></script>
    <script src="script.js"></script>

  </body>
</html>






<div class="resalts">
<?php
 /* put your derectory here for your webpages if needed you may need the ip address if not put in root derectory on linux.*/
$directory = "/webpages/";


if ($submitbutton){
if (!empty($searchoriginal))
{
if (is_dir($directory)){

  if ($open = opendir($directory)){
if ($countsearchterms == 1)
{
    while (($file = readdir($open)) !== false){
	$filecom= $file;
	$file= str_replace("-", " ", $file);
	$file= str_replace("_", " ", $file);
    

	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);

      if (strpos("$file",  "$search[0]") !== false)
	{        

	
	 echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
      
      $St1 = file_get_contents("file://$directory" . "$filecom");
      $S1 = substr($St1, 0, 250);
     echo "<span class='disc'>" . strip_tags($S1, '<p><!--') . "</span>";
     echo "<br>";
}


    }
}
else if ($countsearchterms == 2) {
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St2 = file_get_contents("file://$directory" . "$filecom");
$S2 = substr($St2, 0, 250);
       echo "<span class='disc'>" . strip_tags($S2, '<p><!--') . "</span>";
       echo "<br>";


    }


}

else if ($countsearchterms == 3) {http://192.168.1.4/webpages/vdocs.html
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St3 = file_get_contents("file://$directory" . "$filecom");
$S3 = substr($St3, 0, 250);
       echo "<span class='disc'>" . strip_tags($S3, '<p><!--') . "</span>";
       echo "<br>";

    }


}

else if ($countsearchterms == 4) {
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St4 = file_get_contents("file://$directory" . "$filecom");
$S4 = substr($St4, 0, 250);
       echo "<span class='disc'>" . strip_tags($S4, '<p><!--') . "</span>";
       echo "<br>";

    }


}

else if ($countsearchterms == 5) {
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St5 = file_get_contents("file://$directory" . "$filecom");
$S5 = substr($St5, 0, 250);
      echo "<span class='disc'>" . strip_tags($S5, '<p><!-->') . "</span>";
      echo "<br>";
}
}
else if ($countsearchterms == 6) {
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false) && (strpos("$file",  "$search[5]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St6 = file_get_contents("file://$directory" . "$filecom");
$S6 = substr($St6, 0, 250);
     echo "<span class='disc'>" . strip_tags($S6, '<p><!--') . "</span>";
     echo "<br>";
}
}
else if ($countsearchterms == 7) {
while (($file = readdir($open)) !== false){
$filecom= $file;
	
	$file= str_replace("-", " ", $file);
	$position= strpos("$file", ".");
	$file= substr($file, 0, $position);
      if ((strpos("$file",  "$search[0]") !== false) && (strpos("$file",  "$search[1]") !== false) && (strpos("$file",  "$search[2]") !== false)&& (strpos("$file",  "$search[3]") !== false)
&& (strpos("$file",  "$search[4]") !== false) && (strpos("$file",  "$search[5]") !== false) && (strpos("$file",  "$search[6]") !== false))
	{

	$array[] += "$file";
	  echo "<a href='http://192.168.1.4$directory" . "$filecom'>$file</a>"."<br>";
}
$St7 = file_get_contents("file://$directory" . "$filecom");
$S7 = substr($St7, 0, 250);
       echo "<span class='disc'>" . strip_tags($S7, '<p><!--') . "</span>";
       echo "<br>";
}
}
closedir($open);
    }

  }//while loop

$arraycount= count($array);

if ($arraycount == 0)
{
echo "No results for this search entered. please try again with diffrent search qurry.";
}
}
}
?>
</div>




