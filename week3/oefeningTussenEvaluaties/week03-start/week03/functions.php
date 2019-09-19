<?php 
include 'data.php';

function getCurrentPageUri(){
    //ToDo
}

function getCurrentPage(){
    global $pages; // global variabele aanroepen, standaard is deze niet beschikbaar binnen een functie

    $page_uri = getCurrentPageUri();
}

function renderNavigation(){
    global $pages;
    
    foreach($pages as $page_uri=> $page_item)
    {
        echo '<a href="index.php/'.$page_uri.'">'.$page_item['title_short'].'</a>';
    }
}