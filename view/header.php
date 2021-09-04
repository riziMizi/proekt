<?php $pateka=url() ;  
      $patekaPom=explode("/",$pateka);
      $pateka=$patekaPom[0]."/".$patekaPom[1]."/".$patekaPom[2]."/".$patekaPom[3]."/";     
?>
<!DOCTYPE html>
<head>
<title>Ocenuvanje Igri</title>
<link rel="stylesheet" type="text/css"
              href="../main.css" />
<link rel="stylesheet" type="text/css"
              href="main.css" />
</head>

<body>
<div id="div_pocetna_lista">
<br>
    <ul id="pocetna_lista">
<?php if(isset($_SESSION['username'])) :  ?>
    <?php if($_SESSION['role']=="admin") :  ?>
        <li id="hover">
    <a  href="<?php echo $pateka  ?>igri/index.php?action=novi_igri">Нови игри</a>
    </li>
    <?php endif ;  ?>
    <li id="hover">
<a  href="<?php echo $pateka  ?>igri/index.php?action=show_add_igra">Предложи игра</a>
    </li>
<?php endif ;  ?>
    <li id="hover">
        <a  href="<?php echo $pateka ;   ?>">Топ 10</a>
    </li>
<li id="hover">
<a  href="<?php echo $pateka  ?>tipovi_igri/index.php">Прикажи жанрови на игри</a>
    </li>
    <div id="glavna_lista_desno">   
    <li>
<form action="<?php echo $pateka  ?>igri/index.php?action=igri_search" method="post">
<input id="text_search" type="input" name="ime" placeholder="Внесете име на играта" required />
<input id="button_search" type="submit" value="Пребарај" />
    </li>
</form>
<?php if(isset($_SESSION['username'])) :  ?>
    <li id="hover">
    <a href="<?php echo $pateka  ?>avtentikacija/index.php?action=log_out">Одјави се</a> 
        </li>
        <li id="ime_user">
            <strong><?php  echo $_SESSION['username'] ;  ?></strong>
        </li>
<?php else :  ?>
    <li id="hover">
    <a href="<?php echo $pateka  ?>avtentikacija/index.php">Најави се</a>
    </li>
    <li id="hover">
    <a href="<?php echo $pateka  ?>avtentikacija/index.php?action=otvori_sign_up">Регистрирај се</a> 
    </li>
</div>

<?php endif ;  ?>
    </ul>
    <br>
</div>

<?php

function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }
  
?>

    