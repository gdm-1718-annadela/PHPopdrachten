<?php 
if($current_page->image){
    echo '<img src="' . $current_page->image . '" class="right">';
}
?>
<h1><?php echo $current_page->title; ?></h1>
<div class="breadcrumb"><a href="index.php">Home</a> / <?php echo $current_page->title; ?></div>
<?php echo $current_page->content; ?>