<!-- **Favicon** -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
<!-- **CSS - stylesheets** -->
<link rel="stylesheet" type="text/css" href="theme/alpha/css/menu.css" />
<link rel="stylesheet" type="text/css" href="theme/alpha/css/component.css" />
 <link id="default-css"  href="theme/alpha/style.css" rel="stylesheet"  />

<link  href="theme/alpha/css/portfolio.css" rel="stylesheet" type="text/css"/>
 <link href="theme/alpha/skin.css" rel="stylesheet" type="text/css"/>
 <link id="responsive-css" href="theme/alpha/responsive.css" rel="stylesheet"  type="text/css"/>
 <style>
 section,header{

 }

 </style>
 	<script type="text/javascript">
    var n = jQuery.noConflict();
		n(window).load(function() {
			n("#loading").fadeOut("1000", function() {
			// Animation complete
				n('#loading img').css("visibility","hidden");
				n('#loading').css("visibility","hidden");
				n('#loading').css("background","none");
				n('#loading').css("width","0");
				n('#loading').css("height","0");

		  	});
		});
	</script>

</head>
 <?php
 echo '
	<div id="loading"';  if ($vary == 'bow'||$vary == 'dark') {echo' class="load2"';}echo'><span>
    <img src="'.$logo.'" alt="" style="margin-bottom:20px;"> <br>
    	<img src="theme/alpha/images/loader.gif" alt="Website Loader"/> </span>
    </div>
<body >

<header';  if ($vary == 'bow'||$vary == 'dark') { echo' class="sec"';} echo'>
<article class="container">
<div class="row" ><center>
        <div class="span12" id="main-nav"><center>
            <!-- Nav Start -->
               <ul class="menu" rel="sam1" style="margin-left:30px;"><li class="current"><a href="#home">Home</a></li>';
 if ($vary == 'bow'||$vary == 'dark') {
     $count1 = 0;
 }
 else {
     $count1 = 1;
 }
 $query1 = "SELECT mode, ref FROM menu ORDER by arrange ASC";
 $result1 = mysqli_query($con,$query1);
 while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)) {
     $mode1 = $row1['mode'];
     $ref1 = $row1['ref'];
     if ($mode1 == 'page') {
         $query2 = "SELECT enable, title, urlable, url, target FROM general WHERE id='".$ref1."'";
         $result2 = mysqli_query($con,$query2);
         $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
         $enable2 = $row2['enable'];
         $title2 = $row2['title'];
         $urlable2 = $row2['urlable'];
         $url2 = $row2['url'];
         if ($enable2 == 1) {
             if ($urlable2 == 1) {
                 $file2 = $url2;
                 $target2 = $row2['target'];
             }
             else {
                 $file2 = '#page-'.$count1;
             }
             echo '<li><a href="'.$file2.'" target="'.$target2.'">'.$title2.'</a></li>';
             $count1++;
         }
     }
     elseif ($mode1 == 'module') {
         $query2 = "SELECT enable, name FROM module WHERE id='".$ref1."'";
         $result2 = mysqli_query($con,$query2);
         $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
         $enable2 = $row2['enable'];
         $title2 = $row2['name'];
         $file2 = '#page-'.$count1;
         if ($enable2 == 1) {
             echo '<li><a href="'.$file2.'" target="'.$target2.'">'.$title2.'</a></li>';
             $count1++;
         }
     }
 }
 echo '<li><a href="#contact">Contact Us</a></li>'
 ?>
            </ul> </center>
<!-- Nav End -->
    </div> </center>
    </div>
</article>
</header>
<!-- **Header - End** -->
<!-- Home Start -->
          <?php
          echo '<section class="page';
          if ($vary == 'bow'||$vary == 'dark') {
              echo ' odd';
          }
          echo '">
          <div id="home">
          <article class="container">
              <div class="row">
                  <div class="span12">
                    <h2><img src="'.$logo.'" alt="'.$company.'" title="'.$company.'"  class="logo"/></h2>
                    <img src="theme/alpha/images/sepa.png"   height="2" border="0">
                    <div class="sub_header">
                        <h5> '.$title.' </h5>
                    </div>
                  </div>';
          //slider starts-----------------------------------------------------
          $query3 = "SELECT enable FROM module WHERE id='1'";
          $result3 = mysqli_query($con,$query3);
          $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
          $enable3 = $row3['enable'];
          if ($enable3 == 1) {
              $num = 1;
              $query4 = "SELECT banner, caps FROM banner WHERE enable=1 ORDER BY arrange ASC";
              $result4 = mysqli_query($con,$query4);
              $count4 = mysqli_num_rows($result4);
              echo '<div class="span12">
                    	    <div class="portfolio-single-image">
                               <div id="myCarousel" class="carousel slide">
                                    <ol class="carousel-indicators">';
              for ($x = 0; $x < $count4; $x++) {
                  echo '<li data-target="#myCarousel" data-slide-to="'.$x.'" ';
                  if ($x == 0) {
                      echo 'class="active"';
                  }
                  echo '></li>';
              }
              echo '</ol>
                                                  	    <div class="carousel-inner">';
              while ($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC)) {
                  $banner4 = $row4['banner'];
                  $caps4 = $row4['caps'];
                  echo '<div class="';
                  if ($num == 1) {
                      echo 'active';
                  }
                  echo ' item"><img src="'.$banner4.'" title="" style="width:100%;"/>
                                        <div class="carousel-caption">
                                            '.$caps4.'
                                        </div>
                                     </div>';
                  $num++;
              }
              echo '</div>
                             <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                             <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                        </div>
                        </div>
                        </div><div class="span12">&nbsp;</div> ';
          }
          //slider ends-------------------------------------------------------
          //social link start-------------------------------------------------
          $query5 = "SELECT enable FROM module WHERE id='3'";
          $result5 = mysqli_query($con,$query5);
          $count5 = mysqli_num_rows($result5);
          $row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC);
          $enable5 = $row5['enable'];
          if ($enable5 == 1) {
              echo '<div class="span12"><div class="social-share">';
              $query6 = "SELECT name, url, target FROM social WHERE enable=1 ORDER BY arrange ASC";
              $result6 = mysqli_query($con,$query6);
              $count6 = mysqli_num_rows($result6);
              while ($row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC)) {
                  $name6 = $row6['name'];
                  $url6 = $row6['url'];
                  $target6 = $row6['target'];
                  echo '<a href="'.$url6.'" target="'.$target6.'" class="'.$name6.'"> </a>';
              }
              echo '</div></div>';
          }
          //social link ends------------------------------------------------------------
          echo '</div>
</article> </div>
</section>';
          //Home End--------------------------------------------------------------------------------
          if ($vary == 'bow'||$vary == 'dark') {
              $counter7 = 0;
          }
          else {
              $counter7 = 1;
          }
          $query7 = "SELECT * FROM menu ORDER by arrange ASC";
          $result7 = mysqli_query($con,$query7);
          while ($row7 = mysqli_fetch_array($result7,MYSQLI_ASSOC)) {
              $mode7 = $row7['mode'];
              $ref7 = $row7['ref'];
              if ($mode7 == 'page') {
                  $query8 = "SELECT enable, title, content FROM general WHERE urlable=0 AND id='".$ref7."'";
                  $result8 = mysqli_query($con,$query8);
                  $row8 = mysqli_fetch_array($result8,MYSQLI_ASSOC);
                  $enable8 = $row8['enable'];
                  $title8 = $row8['title'];
                  $content8 = $row8['content'];
                  if ($enable8 == 1) {
                      echo '<section id="page-'.$counter7.'" class="page ';
                      if ($vary == "dark") {
                          echo "odd";
                      }
                      elseif ($vary == "light") {
                          echo "";
                      }
                      else {
                          if ($counter7 % 2) {
                              echo "odd";
                          }
                      }
                      echo '"><div class="border"></div>
                        <article  class="container" >
                            <div class="row">
                                <div class="span12">
                                    <div class="sub_header"><h2> '.$title8.' </h2>
                                        <h5> '.$title.' </h5>
                                   </div>
                                </div>
                            </div>
                        '.$content8.'</article>
                    </section>';
                      $counter7++;
                  }
              }
              elseif ($mode7 == 'module') {
                  $query8 = "SELECT name, enable FROM module WHERE id='".$ref7."'";
                  $result8 = mysqli_query($con,$query8);
                  $row8 = mysqli_fetch_array($result8,MYSQLI_ASSOC);
                  $title8 = $row8['name'];
                  $enable8 = $row8['enable'];
                  if ($enable8 == 1) {
                      echo '<section id="page-'.$counter7.'" class="page ';
                      if ($vary == "dark") {
                          echo "odd";
                      }
                      elseif ($vary == "light") {
                          echo "";
                      }
                      else {
                          if ($counter7 % 2) {
                              echo "odd";
                          }
                      }
                      echo '"><div class="border"></div>
                            <article  class="container" >
                                <div class="row">
                                    <div class="span12">
                                        <div class="sub_header"><h2> '.$title8.' </h2>
                                            <h5> '.$title.' </h5>
                                       </div>
                                    </div>
                                </div>';
          //gallery filters start-----------------------------------
                      echo '<div class="row">
                                    <div class="span12">
                                        <section id="options">
                                        <ul class="breadcrumb">
                                            <li>
                                    		    <button data-filter="all" class="filter">All</button>
                                    		</li>';
                      $query9 = "SELECT name FROM filter WHERE enable=1 ORDER by arrange ASC";
                      $result9 = mysqli_query($con,$query9);
                      while ($row9 = mysqli_fetch_array($result9,MYSQLI_ASSOC)) {
                          $filter9 = $row9['name'];
                          echo '<li>
                                                    <button data-filter=".'.$filter9.'" class="filter">'.$filter9.'</button>
                                                </li>';
                      }
                      echo '<li><button id="three"><img src="images/large.png" width="24px" alt=""></button><button id="four"><img src="images/small.png" width="24px" alt=""></button></li>
                                        </ul> </section>
                                    </div>
                                </div>';
          //gallery filters end-------------------------------------
          //gallery content start-----------------------------------
                      echo '<div class="row">
	                                <div id="filter">';
                      $query_x = "SELECT id, filter, type, content, title, descr FROM gallery WHERE enable=1 ORDER by arrange ASC";
                      $result_x = mysqli_query($con,$query_x);
                      while ($row_x = mysqli_fetch_array($result_x,MYSQLI_ASSOC)) {
                          $id_x = $row_x['id'];
                          $filter_x = $row_x['filter'];
                          $type_x = $row_x['type'];
                          $content_x = $row_x['content'];
                          $title_x = $row_x['title'];
                          $description_x = $row_x['descr'];
                          echo '<div class="element '.$filter_x.' span4">
                                			<div class="portfolio_img">';
                          if ($type_x == 'image') {
                              echo '<img src="'.$content_x.'"  />
                                                <article class="portfolio_link">
                                                    <a href="'.$content_x.'" class="popup zoom" title="'.$title_x.'"><img src="images/zoom.png" width="20" height="20" alt="" /> </a>
                                                </article>';
                          }
                          else {
                              echo '<img src="admin/images/'.$type_x.'.gif"  alt="" />
                                                <article class="portfolio_link">
                                                    <a href="'.$content_x.'" class="youtube zoom" title="'.$title_x.'"><img src="images/zoom.png" width="20" height="20" alt="" /> </a>
                                                </article>';
                          }
                          echo '
                                			</div>
                                            <article class="content">
                                            <span class="strip"></span>
                                            <h5>'.$title_x.'</h5>
                                			<p>'.$description_x.'</p>
                                            </article>
                                		</div>';
                      }
                      echo '</div>
                                </div>';
          //gallery content end-------------------------------------
                      echo '</article>
                        </section>';
                      $counter7++;
                  }
              }
          }
          echo '<section id="contact" class="page ';
          if ($vary == "dark") {
              echo "odd";
          }
          elseif ($vary == "light") {
              echo "";
          }
          else {
              if ($counter7 % 2) {
                  echo "odd";
              }
          }
          echo '"><div class="border"></div>
<article class="container">';
          ?>
    	<div class="row">
            <div class="span12">
               <div class="sub_header">
                    <h2>Contact Us</h2>
                    <h5> Our Clients, Our Priority </h5>
                </div>
               </div>
                <div class="span6">
                      <?php
                      $query4 = "SELECT * FROM contact WHERE id='1'";
                      $result4 = mysqli_query($con,$query4);
                      $row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
                      $content4 = $row4['content'];
                      echo $content4;
                      ?>
                      </div>
                    <div class="span6">
                     <div class="dark-box">              <h3 class="title"> Enquiry Form
                        <div class="resultEnq" style="float:right;"><img src="images/default/ok.png" width="32" height="32" border="0"></div></h3>
                        <div class="message"></div>
                    		<form action="mail.php" method="post" class="enquiry-form">
                        	<p>
                                <label> Your Name <span> (required) </span> </label>
                                <input name="name" type="text" required>
                            </p>
                            <p>
                                <label> E-mail <span> (required) </span> </label>
                                <input type="email" name="email" autocomplete="off" required>
                            </p>
                            <p>
                                <label> Message <span> (required) </span> </label>
                                <textarea name="message" cols="5" rows="3" required></textarea>
                            </p>
                            <input name="submit" type="submit" value="Send Email" class="btn btn-large">
                        </form>
                       </div>
                      </div>
        </div>
    </article>
 </section>
   <?php
   echo'<footer id="footer" ';
          if ($vary == 'bow'||$vary == 'dark') {
              echo 'class="odd"';
          }
   echo'>';
   ?>
    	<div class="container">	<div class="row">
        	<div class="span12">
        <center>     Copyright &copy; 2009 - <?php echo date('Y');?> by <b><a href="http://www.sylverweb.com.my" target="_blank"><?php echo $company;?></a></b> | All rights reserved | Powered by <b><a href="https://github.com/ace-draconis/SylverHyve" target="_blank"><font color="#444">Sylver</font> <font color="#888">Scales</font> <font color="#666">CMS</font></a></b></center>
        </div>
        </div>
        </div>
    </footer>

<!--<script src="theme/alpha/js/jquery.cookie.js"></script>    -->

<script type="text/javascript" src="theme/alpha/js/jquery.nav.js"></script>
<script type="text/javascript">
var slider = jQuery.noConflict();
slider(document).ready(function () {
    slider('.carousel').carousel({
        interval: 3000
    });
    slider('.carousel').carousel('cycle');
});
var m = jQuery.noConflict();
m(document).ready(function() {

		   m('#main-nav').onePageNav({
		        currentClass: 'current',
				changeHash: true,
                scrollSpeed: 1050 ,
                easing: 'swing',
                scrollThreshold: 0.5
			});
		});

</script>
</body>
</html>