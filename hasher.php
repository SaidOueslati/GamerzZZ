<?php
    session_start() ;

    include 'db_connect.php' ;

    $mdpHASH= password_hash('MsghR4', PASSWORD_DEFAULT);
    echo $mdpHASH ;

?>