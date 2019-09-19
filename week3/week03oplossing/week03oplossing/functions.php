<?php 

function getCurrentPageUri(){
    $uri = 'home'; //default page is home

    if( isset($_GET['page_uri']) && !empty($_GET['page_uri']) ) {
        // if there is a querystring ?page_uri=... in the URI update the var
        $uri = $_GET['page_uri']; 
    }

    return $uri;
}

function getCurrentPage(){
    global $pages; // get the global variable pages

    $page_uri = getCurrentPageUri(); // get the page uri from $_GET via function

    //Check if there is an value in the array with that specific key
    if( ! isset($pages[$page_uri]) ) {
        // If not: todo: redirect to 404 page
        echo 'Page not found...';
        exit;
    }

    // return the value from the array with the key
    // cast the value array to an object
    // this way we can use $page->title in stead of $page['title']
    return (object) $pages[$page_uri];
}

function renderNavigation(){
    global $pages;

  //foreach( $array as $key      => $value     ) {
    foreach( $pages as $page_uri => $page_item ) {
        $class = '';
        if($page_uri == getCurrentPageUri()){
            //add an active class if the navigation item key = the current page key
            $class = ' class="active"';
        }
        echo '<a href="index.php?page_uri=' . $page_uri . '"' . $class .'>' . $page_item['title_short'] . '</a>';
    }
}