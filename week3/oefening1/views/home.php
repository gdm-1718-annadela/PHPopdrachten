<?php 
$currentPage = getCurrentPage();
        // var_dump($currentPage);
?>

<h1><?php  echo $currentPage['title']; ?> </h1>
<img src="<?php echo $currentPage['image']?>" class='full'>
<div>
    <?php  echo $currentPage['content']; ?>
</div>