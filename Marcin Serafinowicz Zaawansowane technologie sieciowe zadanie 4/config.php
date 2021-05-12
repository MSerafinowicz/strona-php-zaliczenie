<?php
if (!$db = new SQLite3('database.db')) {
    die("Błąd pliku bazy danych!!!");
}

$db->exec("CREATE TABLE IF NOT EXISTS uprawy
(id INTEGER PRIMARY KEY,
 data_zasiewu TEXT,
 koszt_zasiewu TEXT,
 max_limit TEXT,
 data_zbioru TEXT,
 data_ostatniego_zasiewu TEXT,
 data_ostatniego_zbioru TEXT,
 data_sprawdzenia TEXT,
 bogactwo TEXT)");

$result = $db->query("SELECT COUNT(*) as num_rows FROM uprawy");

while ($row = $result->fetchArray()) {
    if ($row['num_rows'] < 1) {
        $db->exec("INSERT INTO " .
            "uprawy( data_zasiewu,
            koszt_zasiewu,
            max_limit,
            data_zbioru,
            data_ostatniego_zasiewu,
            data_ostatniego_zbioru,
            data_sprawdzenia,
            bogactwo ) " .
            "VALUES ( '" . date("Y-m-d H:i:s") . "','1000','2000','0','0','0','0','2000' ) ");
    }
}
