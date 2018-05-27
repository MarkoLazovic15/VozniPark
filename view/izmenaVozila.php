<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../control/IzmeniVoziloConn.php" method="post">

<?php
require_once ('../modeli/VozilaModel.php');
require_once ('../modeli/VozaciModel.php');
require_once ('../DatabaseConn.php');

$ID = (int) @$_GET['ID'];

$databaseConn = new DatabaseConn();
$vozilaModel = new VozilaModel($databaseConn);
$vozaciModel = new VozaciModel($databaseConn);
$vozilo = $vozilaModel->getCarByID($ID);
$vozaci = $vozaciModel->getAllDrivers();


?>
        <input type="hidden" name="ID" value="<?php echo $vozilo->vozilo_id; ?>" />
            Proizvodjac: <input type="text" name="Proizvodjac" value="<?php echo $vozilo->prizvodjac; ?>" />
            <br />
            Model: <input type="text" name="Model" value="<?php echo $vozilo->model; ?>" />
            <br />
            Registracija: <input type="text" name="Registracija" value="<?php echo $vozilo->registracija; ?>" />
            <br />
            Vozaci:
            <select name="Vozac">
            <?php
            foreach($vozaci as $vozac){
                echo "<option value={$vozac->vozac_id}>{$vozac->ime} {$vozac->prezime} ID:{$vozac->vozac_id}</option>";
            } 
            ?>
            </select>
            <hr />
            <button type="submit">Izmena vozaca</button>
        </form>
    </body>
</html>
