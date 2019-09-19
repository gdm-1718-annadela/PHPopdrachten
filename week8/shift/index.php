<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <?php
        //open DB
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbName = "cart";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbName);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

        //Get cardtype + add where clause if isset
            $cardtype = 0;
            $where ='';
            if(isset($_GET['cardtype_id']) && $_GET['cardtype_id']){
                $cardtype = (int) $_GET['cardtype_id'];//casting --> inteager van maken
                $where = 'WHERE cardtype_id =' .$cardtype;
            }

        //run query
            $sql = "SELECT *, RAND() as rand 
            from card
            $where
            ORDER BY rand 
            LIMIT 1";

            var_dump($sql);
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //print card
                   ?> 
                   <div class="card">
                        <h1><?php echo $row['title']?></h1>
                        <p><?php echo $row['description']?></p>
                        <a href="<?php echo $row['link'] ?>">Ga naar de website</a>
                        <img src="<?php echo $row['image'] ?>">
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();

       
    ?>

    <form>
        <select name="cardtype_id">
            <option value="">Alle types</option>
            <option value="1" <?php if($cardtype == 1){echo 'selected';}?>>Company</option>
            <option value="2" <?php if($cardtype == 2){echo 'selected';}?>>Technology</option>
            <option value="3" <?php if($cardtype == 3){echo 'selected';}?>>Trends</option>
        </select>
        <input type="submit" name="add" value="Get new card">
    </form>
    
</body>
</html>