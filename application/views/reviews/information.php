<h1><?php echo $information_item['title'];?></h1>
<h2>Rating: <?php echo $information_item['rating'];?></h2>
<h4><?php echo $information_item['text'];?></h2>

<a onclick="confirm('Are you sure you want to delete?');"
href="<?php echo site_url('reviews/delete/'
.$information_item['slug']);?>">Delete</a>

<a href="<?php echo site_url('reviews/trail/edit/'
.$information_item['slug']);?>">Edit</a>