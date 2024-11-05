<?php


 include_once "inc/header.php";
 require_once "database.php";

 $asiakasID = null;

 if(!empty($_POST)){



    $asiakasID = $_POST['asiakasID'];

    $sql = "DELETE FROM asiakas
    WHERE asiakasID = :asiakasID";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':asiakasID', $asiakasID);
  $stmt->execute();

  header("location: asiakas.php");
  exit;

  } else {
    //var_dump($_POST);
    $asiakasID = $_GET["asiakasID"];

    $sql = "SELECT CONCAT(etunimi, ' ', sukunimi) AS nimi
    FROM asiakas
    WHERE asiakasID = :asiakasID";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':asiakasID', $asiakasID);
    $stmt->execute();

    $asiakas = $stmt->fetch();

   }

?>
  <div class="container">
    <h3>Asiakastietojen poistaminen</h3>
    <p>Haluatko varmasti poistaa, <?php echo $asiakas["nimi"];?>, tiedot?</p>

    <form action="poista_asiakas.php" method= "POST">
      <input type="hidden" name="asiakasID" value="<?php echo $_GET["asiakasID"]; ?>">
        <button class="btn btn-danger" type="submit">Poista</button>
    </form>
  </div>

<?php
  include_once "inc/footer.php";
