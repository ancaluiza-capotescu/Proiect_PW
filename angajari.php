<?php
include "login.php";
$mysqli = new mysqli($servername, $username, $password, $dbname,"3360");
$joburi = $mysqli->query("SELECT * FROM CASEM_Job;");
session_start();
$logat = isset($_SESSION['email'])
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CASEM srl</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/template-style.css">
  </head>

  <body class="size-2000">
    <div style="position:absolute; left:0; top:0; z-index:15; color:#ffffff;">
      <a href="account.php"><img src="img/user1.png" style="height: 40px;"/></a>
    </div>
    <header role="banner" class="position-absolute">
      <nav class="background-transparent background-primary-dott full-width sticky">
        <div class="top-nav">
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="index.html" class="logo">
              <img class="logo-white" src="img/logocasem2.png" alt="" style="width:75px;height:75px;">
              <img class="logo-dark" src="img/logocasem.png" alt="" style="width:100px;height: 50px;">
            </a>
          </div>
          <p class="nav-text"></p>

          <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="index.html" style="font-size:150%;">Acasă</a></li>
                <li><a href="about-us.html" style="font-size:150%;">Despre noi</a></li>
				        <li><a href="gallery.html" style="font-size:150%;">Galerie</a></li>
             </ul>
          </div>

          <ul class="logo-menu">
            <a href="index.html" class="logo">
              <img class="logo-white" src="img/logocasem2.png" alt="" style="width:75px;height:75px;">
              <img class="logo-dark" src="img/logocasem.png" alt="" style="width:100px;height:50px;">
            </a>
          </ul>

          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
                <li><a href="services.html" style="font-size:150%;" >Servicii</a></li>
                <li><a href="contact.html" style="font-size:150%;" >Contact</a></li>
                <li><a href="angajari.php" style="font-size:150%;" >Angajări</a></li>
             </ul>
          </div>
        </div>
      </nav>
    </header>

    <main role="main">
      <article>
        <header class="section background-image text-center" style="background-image:url(img/banner.jpg)">
		  <br><br><br><br>
		  <p class="animated-element text-white" style="font-size:250%;" >Angajează-te la CASEM srl!</p>

        </header>

        <section class="section background-white">
          <div style="width: 50%; margin-right: 25%; margin-left: 25%;">
            <div style="width: 100%; text-align: center;">
              <h1><b>Posturi disponibile</b></h1>
            </div>
            <?php
            if($joburi->num_rows == 0) { ?>
              <div style="width: 100%; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem;  padding: .5em 1em .5em 1em; margin-bottom: 15px;">
                <h2>Nu există posturi disponibile momentan.</h2>
              </div>
            <?php }
            else {
              while($job = $joburi->fetch_assoc()) { ?> 
                <div style="width: 100%; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem;  padding: .5em 1em .5em 1em; margin-bottom: 15px;">
                  <h2><?php echo $job['denumire'];?></h2>
                  Mod de lucru: <?php echo $job['modlucru'];?> <br>
                  Cerințe: <?php echo $job['cerinte'];?> <br><br>
                  <?php if ($logat === true) { ?>
                  <a href="aplica.php?id=<?php echo $job['id'];?>" class="button border-radius background-primary text-size-20 text-white">Aplică pentru acest post</a><br><br>
                  <?php } else { ?>
                  <a href="account.php" class="button border-radius background-primary text-size-20 text-white disabled" disabled>Logheaza-te pentru a aplica.</a><br><br>
                  <?php } ?>
                  Au aplicat deja <?php echo $job['aplicanti'];?> persoane pentru acest post.
                </div>
              <?php }
            }
            ?>
        </section>
      </article>
	  <section class="section-small-padding background-grey">
        <div class="margin2x">
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (1).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (2).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (3).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (4).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (5).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (6).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (7).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (8).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (9).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (10).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (11).png"/>
           </div>
           <div class="m-6 l-1">
              <img class="margin-bottom" src="img/frig (12).png"/>
           </div>
        </div>
      </section>
    </main>

    <footer>
      <section class="section background-dark">
        <div class="line">
          <div class="margin2x">

            <div class="s-12 m-6 l-3 xl-2">
               <h4 class="text-white text-strong margin-m-top-30">Link-uri utile</h4>
               <a class="text-primary-hover" href="contact.html">Contact</a><br>
            </div>

            <div class="s-12 m-6 l-3 xl-3">
               <h4 class="text-white text-strong margin-m-top-30">Contactează-ne!</h4>
                <p><i class="icon-sli-screen-smartphone text-primary"></i> 0040 722 595 582</p>
                <a><i class="icon-sli-mouse text-primary"></i> casem.serv@gmail.com</a><br>
                <a><i class="icon-sli-mouse text-primary"></i> mcapotescu@gmail.com</a>
            </div>
          </div>
        </div>
      </section>
      <div class="background-dark">
         <div class="line">
            <hr class="break margin-top-bottom-0" style="border-color: #777;">
         </div>
      </div>
    </footer>
	<p>&#169; Copyright 2018 CASEM SRL &nbsp;</p>
  </body>
</html>
