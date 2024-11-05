
<?php
include_once "inc/header.php";
?>

  <div class="container">
    <div class="row">
        <h3>Asiakastiedot</h3>
    </div>
    <table class="table table-striped">
        <thread>
            <tr>
                <th>#</th>
                <th>Etunimi</th>
                <th>Sukunimi</th>
                <th>Sähköposti</th>
                <th>Toiminnot</th>
            </tr>
        </thread>
        <tbody>
            <?php
            // luodaan yhteys tietokantaan -->
            // haetaan kaikki asiakastiedot -->
        require_once "database.php";
        $sql = "SELECT * FROM asiakas";
        $result = $pdo->query($sql);

        while($row = $result ->fetch()):
        ?>

        <tr>
            <td><?= $row["asiakasID"] ?></td>
            <td><?= $row["etunimi"] ?></td>
            <td><?= $row["sukunimi"] ?></td>
            <td><?= $row["sahkoposti"] ?></td>
            <td>
                <a class="btn btn-danger" 
                href="poista_asiakas.php?asiakasID=<?= $row["asiakasID"]; ?>">Poista</a>

                <a class="btn btn-success" 
                href="paivita_asiakas.php?asiakasID=<?= $row["asiakasID"]; ?>">Päivitä</a>

                <a class="btn" 
                href="katso_asiakas.php?asiakasID=<?= $row["asiakasID"]; ?>">Katso</a>

            </td>
        </tr>

        <?php endwhile; ?>


        </tbody>
    </table>
  
</div>

<?php
include_once "inc/footer.php";

?>