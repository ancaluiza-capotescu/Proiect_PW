<?php
include "login.php";
$mysqli = new mysqli($servername, $username, $password, $dbname,"3360");
$joburi = $mysqli->query("SELECT * FROM CASEM_Job;");

if(isset($_GET["id"])) $id = $_GET['id'];
else $id = 0;

if($_SERVER["REQUEST_METHOD"]=="POST") {
  $prenume = $_POST['prenume'];
  $nume = $_POST['nume'];
  $idJob = $_POST['job'];

  $cvName = $_FILES['cv']['name'];
  $cvTmpName = $_FILES['cv']['tmp_name'];
  $cvExtension = strtolower(end(explode('.',$cvName)));
  $cvSaveName = $nume. "_cv" . "." . $cvExtension;
  $cvUploadPath = "/home/ACapotescu/public_html/html/atestat/uploads/" . basename($cvSaveName);
  move_uploaded_file($cvTmpName, $cvUploadPath);

  $scrisoareName = $_FILES['scrisoare']['name'];
  $scrisoareTmpName = $_FILES['scrisoare']['tmp_name'];
  $scrisoareExtension = strtolower(end(explode('.',$scrisoareName)));
  $scrisoareSaveName = $nume. "_scrisoare" . "." . $scrisoareExtension;
  $scrisoareUploadPath = "/home/ACapotescu/public_html/html/atestat/uploads/" . basename($scrisoareSaveName);
  move_uploaded_file($scrisoareTmpName, $scrisoareUploadPath);

  $mysqli->query("INSERT INTO CASEM_Aplicant (prenume, nume, idJob, cv, scrisoare) VALUES ('$prenume', '$nume', $idJob, '$cvSaveName', '$scrisoareSaveName');");
  $mysqli->query("UPDATE CASEM_Job SET aplicanti = aplicanti + 1 WHERE id = $idJob");
  $trimis = 1;
}
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
              <h1><b>Aplică pentru post</b></h1>
              <?php if(isset($trimis)) { ?><h2>Aplicația ta a fost trimisă cu succes.</h2><?php } ?>
            </div>
          <form class="customform text-dark" action="" method="post" enctype="multipart/form-data">
              <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-12">
                      <select name="job" placeholder="Post"  value="Post pt care aplicati" required/>
                        <option value="" selected disabled hidden>Post pentru care aplicați</option>
                        <?php if($joburi->num_rows > 0) {
                          while($job = $joburi->fetch_assoc()) { ?>
                            <option value="<?php echo $job['id'];?>"<?php if($id==$job['id']) echo " selected"?>><?php echo $job['denumire'];?></option>
                      <?php }
                        } ?>
                    </select>
                    </div>
                  </div>
              </div>
              <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input type="text"   name="prenume" placeholder="Prenume" required/>
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input type="text" name="nume" placeholder="Nume"  required/>
                    </div>
                  </div>
              </div>
              <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      Curriculum Vitae <br>
                      <input type="file"  name="cv" required/>
                    </div>
                    <div class="s-12 m-12 l-6">
                      Scrisoare de intentie <br>
                      <input type="file" name="scrisoare" required/>
                    </div>
                  </div>
              </div>

          <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="submit" name="submit">Trimite</button>
                    </div>
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="reset" name="reset">Anulează</button>
                    </div>
                  </div>
              </div>
          </form>
        </section>
      </article>


            <!--a href="contact.html" class="s-12 button border-radius background-primary text-size-20 text-white">aici</a-->
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
