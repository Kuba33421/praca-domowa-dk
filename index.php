<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="lewy">
        <h1>Akta Pracownicze</h1>
        <?php
        
        
        $con = mysqli_connect('localhost', 'root', '', 'pracadomowa');
        $q = "SELECT id,imie,nazwisko,adres,miasto,czyRODO,czyBadania FROM pracownicy WHERE id=2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            $rodo = ($row[5] == 1) ? 'podpisano' : 'niepodpisano';
            $badania = ($row[6] == 1) ? 'aktualne' : 'nieaktualne';

            echo "
            <h3>dane</h3>
            <p>$row[1] $row[2]</p>
            <hr/>
            <h3>adres</h3>
            <p>$row[3]</p>
            <p>$row[4]</p>
            <hr/>
            <p>RODO: $rodo</p>
            <p>Badania: $badania</p>";
        }

        $q = "SELECT COUNT(*) FROM pracownicy";
        $res = mysqli_query($con, $q);
        $row = mysqli_fetch_array($res);
        echo "<hr/>
              <h3>Liczba zatrudnionych pracowników</h3>
              <p>$row[0]</p>";
        ?>
    </div>
    <div id="prawy">
        <?php
        $q = "SELECT id,imie,nazwisko FROM pracownicy WHERE id=2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<img src='2.png' alt='pracownik'>
                  <h2>$row[1] $row[2]</h2>";
        }

        $q = "SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM pracownicy, stanowiska WHERE pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 2;";
        $res = mysqli_query($con, $q);
        while ($row = mysqli_fetch_array($res)) {
            echo "<h4>$row[1]</h4>
                  <h5>$row[2]</h5>";
        }

        mysqli_close($con);
        
        ?>
    </div>
    <div id="stopka">
        <p>Autorem aplikacji jest: Kuba Stolarczyk 2P</p>
        <ul>
            <li> Skontaktuj się</li>
            <li> Poznaj naszą firmę</li>
        </ul>
    </div>
</body>
</html>

