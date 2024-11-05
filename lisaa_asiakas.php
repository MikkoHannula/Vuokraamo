<?php
    include_once 'inc/header.php';
    include_once 'inc/funktiot.php';

    require_once 'database.php';

    //lomakkeen kentät
    $etunimi = '';
    $sukunimi = '';
    $lahiosoite = '';
    $postinumero = '';
    $postitoimipaikka = '';
    $puhelin = '';
    $sahkoposti = '';

    //Virhetekstit
    $etunimiError = '';
    $sukunimiError = '';
    $lahiosoiteError = '';
    $postinumeroError = '';
    $postitoimipaikkaError = '';
    $puhelinError = '';
    $sahkopostiError = '';

    if(!empty($_POST))
    {

        $etunimi = $_POST['etunimi'];
        $sukunimi = $_POST['sukunimi'];
        $lahiosoite = $_POST['lahiosoite'];
        $postinumero = $_POST['postinumero'];
        $postitoimipaikka = $_POST['postitoimipaikka'];
        $puhelin = $_POST['puhelin'];
        $sahkoposti = $_POST['sahkoposti'];


        //oletetaan että käyttäjä on syöttänyt kaikki tiedot
        $valid = true;

        if(empty($etunimi)){
        $valid = false;
        $etunimiError = "Syötä etunimi";

        }

        if(empty($sukunimi)){
            $valid = false;
            $sukunimiError = "Syötä sukunimi";

        }

        if(empty($lahiosoite)){
            $valid = false;
            $lahiosoiteError = "Syötä lähiosoite";

        }
        if(empty($postinumero)){
            $valid = false;
            $postinumeroError = "Syötä postinumero";

        }
        if(empty($postitoimipaikka)){
            $valid = false;
            $postitoimipaikkaError = "Syötä postitoimipaikka";

        }
        if(empty($puhelin)){
            $valid = false;
            $puhelinError = "Syötä puhelin";

        }

        if(empty($sahkoposti)){
            $valid = false;
            $sahkopostiError = "Syötä sähköposti";

        }

        if($valid){
            //tallennetaan tiedot kantaan

        $sql = "INSERT INTO asiakas (etunimi, sukunimi, lahiosoite, postinumero, postitoimipaikka, puhelin, sahkoposti)
        VALUES
        (:etunimi, :sukunimi, :lahiosoite, :postinumero, :postitoimipaikka, :puhelin, :sahkoposti)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':etunimi', $etunimi);
        $stmt->bindParam(':sukunimi', $sukunimi);
        $stmt->bindParam(':lahiosoite', $lahiosoite);
        $stmt->bindParam(':postinumero', $postinumero);
        $stmt->bindParam(':postitoimipaikka', $postitoimipaikka);
        $stmt->bindParam(':puhelin', $puhelin);
        $stmt->bindParam(':sahkoposti', $sahkoposti);
        $stmt->execute();

        header("Location: asiakas.php");
        exit;

        }

    }

?>

<div class="row">
    <div class="col-8 mx_auto">
            <div class="card card-body bg-light">
                <h3 class="mb-3">Asiakastietojen lisääminen</h3>
                <form action="" method="POST"> 
                
                <div class="row mb-3">
                    <label for="etunimi" class="col-sm-3 col-form-label">Etunimi</label>
                    <div class="col sm-9">
                        <input value="<?php echo $etunimi; ?>"type="text" name="etunimi" 
                        class="form-control <?= (!empty($etunimiError))?'is-invalid':''; ?>">
                        <?php if(!empty($etunimiError)):?>
                        <div class="invalid-feedback">
                            <small><?=$etunimiError; ?> </small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sukunimi" class="col-sm-3 col-form-label">Sukunimi</label>
                    <div class="col sm-9">
                        <input value="<?= $sukunimi; ?>"type="text" name="sukunimi" 
                        class="form-control <?= (!empty($sukunimiError))?'is-invalid':'';?>">
                        <?php if(!empty($sukunimiError)):?>
                        <div class="invalid-feedback">
                            <small><?=$sukunimiError; ?> </small>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?= luoInputKentta('Lähiosoite','lahiosoite', $lahiosoite, $lahiosoiteError  );?>
                <?= luoInputKentta('Postinumero','postinumero', $postinumero, $postinumeroError  );?>
                <?= luoInputKentta('Postitoimipaikka','postitoimipaikka', $postitoimipaikka, $postitoimipaikkaError  );?>
                <?= luoInputKentta('Puhelin','puhelin', $puhelin, $puhelinError  );?>
                <?= luoInputKentta('Sähköposti','sahkoposti', $sahkoposti, $sahkopostiError  );?>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Tallenna</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php    
include_once "inc/footer.php";
