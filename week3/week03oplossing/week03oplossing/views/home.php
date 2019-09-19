<h1><?php echo $current_page->title; ?></h1>
<?php 
if($current_page->image){
    echo '<img src="' . $current_page->image . '" class="full">';
}
?>
<?php echo $current_page->content; ?>