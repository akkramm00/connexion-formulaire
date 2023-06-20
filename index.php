<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Connexio de l'utilisateur</title>
  </head>
  <body>
    <pre>
      <form method="POST" action="<?php echo $_SERVER['PHPH_SELF']?>">
        <label for="username">Nom de l'utilisateur  :</label>
        <input type="text" name="username" id="username" placeholder="username">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit" name="submit" value="Se connecter">
      </form>
    </pre>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] === "POST") {
  $username  = $_POST['username'];
  $_password = $_POST['password'];
  if($username === 'admin' AND $password = 'admin') {
    // Initialisation de notre session en tant qu'administrateur
    $_SESSION['role'] = 'admin';
    $_SESSION['username'] =$username;
    // Création de cookie admin 
    setcookie('user', 'admin', time() + 3600, '/');
    //redirection
    header("location:home_exo.php"); }
  if($username === 'Sadmin' AND $password = 'Sadmin') {
    // Initialisation de notre session en tant que super admin
    $_SESSION['role'] = 'super' ;
    $_SESSION['username'] = $username ;
    // Création de cookie admin
    setcookie('user', 'super', time() =3600, '/');
    // Redirection
    header("location:home_exo.php");
    
  };/
 }
  ?>
  
 
<h2> ACCUEIL INTRANET </h2>
<?php if (isset($_SESSION['role']) AND $_SESSION['role'] == 'admin') {  ?>
  <nav>
    <ul>
      <a href="#"><li>Accueil</li></a>
      <a href="#"><li>Gestion des utilisateurs</li></a>
      <a href="#"><li>Déconnexion</li></a>
      <p> Vous êtes connecté en tant qu'<?php echo $_SESSION['role']?> </p>
    </ul>
  </nav>
<?php }?> <?php if (isset($_SESSION['role']) AND $_SESSION['role'] == 'super') {  ?>
<nav>
<ul>
 <a href="#"><li>Accueil</li></a>
  <a href="#"><li>Gestion des utilisateurs</li></a>
  <a href="exo_serv.php"><li>Données serveur</li></a>
  <a href="#"><li>Déconnexion</li></a>
  <p> Vous êtes connecté en tant qu'<?php echo $_SESSION['role']?></p>
</ul>
</nav>
<?php }
?>

