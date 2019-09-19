<?php 

function getCurrentPageUri(){
    //ToDo
}

function getCurrentPage(){
    global $pages; // global variabele aanroepen, standaard is deze niet beschikbaar binnen een functie
    if(isset($_GET['key']) ){
        $page = $_GET['key'];
    } else{
        $page = 'home';
    };
   return $pages[$page];
};

function renderNavigation(){
    include('data.php');
    global $key;
    foreach($pages as $key => $value){
        // var_dump($pages);
        // global $key
        ?>
        
        <a href="?key=<?php echo $key ?>"><?php echo $key ?></a>
        <?php 
    };
};