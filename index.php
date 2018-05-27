<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Pregled Vozila:</br>
        <table border="1">
            <tr>
                <td>ID VOZILA</td>
                <td>Model</td>
                <td>Proizvodjac</td>
                <td>Registracija</td>
                <td colspan="2">Vozac</td>
                <td colspan="2">Opcije:</td>
            </tr>
            <?php   
            require_once ('DatabaseConn.php');
            require_once ('modeli/DataModel.php');
            require_once ('modeli/VozaciModel.php');

            $databaseConn = new DatabaseConn(); 
            $dm = new DataModel($databaseConn);
            $data = $dm->getAllData();
            
            foreach($data as $vozilo){
                echo "<tr>\n";
                echo "<td>{$vozilo->vozilo_id}</td>\n";
                echo "<td>{$vozilo->model}</td>\n";
                echo "<td>{$vozilo->prizvodjac}</td>\n";
                echo "<td>{$vozilo->registracija}</td>\n";
                echo "<td>{$vozilo->ime}</td>\n";
                echo "<td>{$vozilo->prezime}</td>\n";
                echo "<td><a href='view/izmenaVozila.php?ID={$vozilo->vozilo_id}'>Izmena</a></td>\n";
                echo "<td><a href='control/IzbrisiVoziloConn.php?ID={$vozilo->vozilo_id}'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="view/dodajVozilo.php">Dodaj Vozilo</a></br></br>

            Pregled Vozaca:</br>
            <table border="1">
            <tr>
                <td>ID Vozaca</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td colspan="2">Opcije:</td>
            </tr>
           
            <?php   
            $vozaciModel = new VozaciModel($databaseConn);
            $vozaci = $vozaciModel->getAllDrivers();
            foreach($vozaci as $vozac){
                echo "<tr>\n";
                echo "<td>{$vozac->vozac_id}</td>\n";
                echo "<td>{$vozac->ime}</td>\n";
                echo "<td>{$vozac->prezime}</td>\n";
                echo "<td><a href='view/IzmenaVozaca.php?ID={$vozac->vozac_id}'>Izmena</a></td>\n";
                echo "<td><a href='control/IzbrisiVozacaConn.php?ID={$vozac->vozac_id}'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="view/DodajVozaca.php">Dodaj Vozaca</a>
    </body>
</html>