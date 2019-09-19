<h1><?php  echo $currentPage['title']; ?> </h1>
<div class="breadcrumb"><a href="index.php">Home</a>/<?php echo $currentPage['title'] ?></div>
<img src="<?php echo $currentPage['image']?>" class='right'>
<div>
    <?php  echo $currentPage['content']; ?>
</div>