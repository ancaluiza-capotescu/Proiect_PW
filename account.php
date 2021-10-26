<?php
include "login.php";
include "password.php";
$mysqli = new mysqli($servername, $username, $password, $dbname,"3360");
session_start();

if ( isset($_POST['submit_register']) ) {
  $name = $_POST['nume'] . $_POST['prenume'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $mysqli->query("INSERT INTO CASEM_User (name, email, password) VALUES ('$name', '$email', '$password');");
}

if ( isset($_POST['submit_login']) ) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userResult = $mysqli->query("SELECT * FROM CASEM_User WHERE email='$email';");
  if ($userResult->num_rows > 0) {
    $user = $userResult->fetch_assoc();
    if(password_verify($password, $user['password'])) {
      $_SESSION['email'] = $email;
    }
  }
}

if ( isset($_GET['logout']) ) {
  unset($_SESSION['email']);
}

if ( isset($_POST['submit_addjob']) ) {
  $titlu = $_POST['titlu'];
  $mod = $_POST['mod'];
  $cerinte = $_POST['cerinte'];
  $mysqli->query("INSERT INTO CASEM_Job (denumire, modlucru, cerinte) VALUES ('$titlu', '$mod', '$cerinte');");
}

if ( isset($_GET['deletejobid']) ) {
  $jobid = $_GET['deletejobid'];
  $mysqli->query("DELETE FROM CASEM_Job WHERE id='$jobid';");
}

if ( isset($_GET['deleteAplicantId']) ) {
  $deleteAplicantId = $_GET['deleteAplicantId'];
  $mysqli->query("DELETE FROM CASEM_Aplicant WHERE id='$deleteAplicantId';");
}

$joburi = $mysqli->query("SELECT * FROM CASEM_Job;");
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
		  <p class="animated-element text-white" style="font-size:250%;" >Contul Meu</p>

        </header>

        <section class="section background-white">
          <div style="width: 50%; margin-right: 25%; margin-left: 25%;">
          <? if ($logat === false ) { ?>
            <div style="width: 100%; text-align: center;">
              <h1><b>Inregistrare</b></h1>
            </div>
            <form class="customform text-dark" action="account.php" method="post" enctype="multipart/form-data">
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
                      <input type="email"   name="email" placeholder="Email" required/>
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input type="password" name="password" placeholder="Parola"  required/>
                    </div>
                  </div>
              </div>

          <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="submit" name="submit_register">Inregistrare</button>
                    </div>
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="reset" name="reset">Anulează</button>
                    </div>
                  </div>
              </div>
          </form>
          <div style="width: 100%; text-align: center;">
              <h1><b>Login</b></h1>
            </div>
          <form class="customform text-dark" action="account.php" method="post" enctype="multipart/form-data">
              <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input type="emaill"   name="email" placeholder="Email" required/>
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input type="password" name="password" placeholder="Parola"  required/>
                    </div>
                  </div>
              </div>

          <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="submit" name="submit_login">Login</button>
                    </div>
                    <div class="s-12 m-12 l-6">
            <button class="button border-radius text-white background-primary" type="reset" name="reset">Anulează</button>
                    </div>
                  </div>
              </div>
          </form>

          
            <?php } else {
              $userResult = $mysqli->query("SELECT * FROM CASEM_User WHERE email='".$_SESSION['email']."';");
              $user = $userResult->fetch_assoc();
              ?>
              <div style="width: 100%; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem;  padding: .5em 1em .5em 1em; margin-bottom: 15px;">
                <h3>Logat ca <?php echo $user['email'];?></h3>
                <a href="account.php?logout=1" class="button border-radius background-error text-size-20 text-white">Delogare</a>
              </div>

              <?php if ( $user['admin'] === "1" ) { ?>

                <div style="width: 100%; text-align: center;">
                  <h1><b>Adauga Job</b></h1>
                </div>
              <form class="customform text-dark" action="account.php" method="post" enctype="multipart/form-data">
                  <div class="line">
                      <div class="margin">
                        <div class="s-12 m-12 l-6">
                          <input type="text"   name="titlu" placeholder="Titlu" required/>
                        </div>
                        <div class="s-12 m-12 l-6">
                          <input type="text" name="mod" placeholder="Mod de lucru"  required/>
                        </div>
                      </div>
                  </div>
                  <div class="line">
                      <div class="margin">
                        <div class="s-12 m-12 l-12">
                          <input type="text"   name="cerinte" placeholder="Cerinte" required/>
                        </div>
                      </div>
                  </div>

              <div class="line">
                      <div class="margin">
                        <div class="s-12 m-12 l-6">
                <button class="button border-radius text-white background-primary" type="submit" name="submit_addjob">Adauga job</button>
                        </div>
                        <div class="s-12 m-12 l-6">
                <button class="button border-radius text-white background-primary" type="reset" name="reset">Anulează</button>
                        </div>
                      </div>
                  </div>
              </form>

              <div style="width: 100%; text-align: center;">
                  <h1><b>Joburi Existente</b></h1>
                </div>

            <?php while($job = $joburi->fetch_assoc()) { ?> 
                <div style="width: 100%; border: 1px solid rgba(0,0,0,.125); border-radius: .25rem;  padding: .5em 1em .5em 1em; margin-bottom: 15px;">
                  <h2><?php echo $job['denumire'];?></h2>
                  Mod de lucru: <?php echo $job['modlucru'];?> <br>
                  Cerințe: <?php echo $job['cerinte'];?> <br><br>
                  <a href="account.php?deletejobid=<?php echo $job['id'];?>" class="button border-radius background-error text-size-20 text-white">Sterge job</a><br><br>
                  Au aplicat deja <?php echo $job['aplicanti'];?> persoane pentru acest post.
                  <table>
                  <?php 
                  $idJob = $job['id'];
                  $aplicantiResult=$mysqli->query("SELECT * FROM CASEM_Aplicant WHERE idJob=$idJob;");
                  while($aplicant = $aplicantiResult->fetch_assoc()) { 
                    ?>
                  <tr>
                    <td><?php echo $aplicant['nume'];?></td>
                    <td><?php echo $aplicant['prenume'];?></td>
                    <td><a href="uploads/<?php echo $aplicant['cv'];?>">Download CV</a></td>
                    <td><a href="uploads/<?php echo $aplicant['scrisoare'];?>">Download Scrisoare</a></td>
                    <td><a href="account.php?deleteAplicantId=<?php echo $aplicant['id'];?>">Sterge Aplicant</a></td>
                  </tr>
                  <?php } ?>
                  </table>
                </div>
              <?php } ?>


                <?php } ?>


            <?php } ?>
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
