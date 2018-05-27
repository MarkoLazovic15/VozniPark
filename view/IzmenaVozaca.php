<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../control/IzmeniVozacaConn.php" method="post">
<?php

require_once ('../modeli/VozaciModel.php');
require_once ('../DatabaseConn.php');

$ID = (int) @$_GET['ID'];

$databaseConn = new DatabaseConn();
$vozaciModel = new VozaciModel($databaseConn);

$vozac = $vozaciModel->getVozacById($ID);

?>
            <input type="hidden" name="ID" value="<?php echo $vozac->vozac_id; ?>" />
            Ime: <input type="text" name="Ime" value="<?php echo $vozac->ime; ?>" />
            <br />
            Przime: <input type="text" name="Prezime" value="<?php echo $vozac->prezime; ?>" />
            <br />
            </select>
            </br>
            <button type="submit">Dodaj vozaca</button>
            
        </form>
    </body>
</html>