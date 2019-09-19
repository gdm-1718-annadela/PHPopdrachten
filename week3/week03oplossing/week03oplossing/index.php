<?php 
//INTRO TO MVC: See canvas

require_once 'data.php'; //Load the data array (MODEL)
include_once 'functions.php'; //Load the functions (CONTROLLER)

// get the current page as an object
$current_page = getCurrentPage(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $current_page->title; ?></title>
    <meta name="description" content="<?php echo $current_page->description; ?>">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <nav>
        <?php renderNavigation(); ?>
    </nav>
    <section>
        <?php 
            // include the VIEW of the current page
            include 'views/' . $current_page->type . '.php';
        ?>
    </section>
</body>
</html>