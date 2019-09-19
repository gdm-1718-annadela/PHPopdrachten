<?php
    //open DB
        $username = "root";
        $password = "root";
        $dbName = "mysql:dbname=cart;host=127.0.0.1;port=3307";

    // Create connection
    $db = new PDO($dbName, $username, $password);

    //Get cardtype + add where clause if isset
        $cardtype = 0;
        $where ='';
        if(isset($_GET['cardtype_id']) && $_GET['cardtype_id']){
            $cardtype = (int) $_GET['cardtype_id'];//casting --> inteager van maken
            $where = 'WHERE cardtype_id = :cardtype';
        }

    //run query
        $sql = "SELECT *, RAND() as rand 
        from card
        $where
        ORDER BY rand 
        LIMIT 1";

        $sth = $db->prepare($sql);
        $sth->execute([':cardtype' => $cardtype]);
        $result = $sth->fetchObject();

        //aangeven aan browser type json
        header('content-Type: application/json');
        //php omzetten naar json bestand
        echo json_encode($result);
        //zeker zijn dat de server hier stopt
        exit;
