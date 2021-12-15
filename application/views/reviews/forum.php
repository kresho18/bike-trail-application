<?php foreach ($trails as $item): ?>
 <h3><?php echo $item['name']; ?>
 </h3> <div class="main"> 
 <h4> Length : <?php echo $item['length']; ?> </h4>  
 </div>
 <div> <img src='<?php echo $item["img"]; ?>'> </div>
 <p><a href="<?php echo site_url('reviews/trail/'.$item['slug']); ?>">
 View this trail</a></p>
  <?php endforeach; ?> 