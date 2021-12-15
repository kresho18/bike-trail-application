<h1><?php echo $trails_item['name'];?></h1>
<h2>Length: <?php echo $trails_item['length'];?></h2>
<img src='<?php echo site_url("reviews/trail/".$trails_item["slug"]); ?>'>

<a href = "<?php echo site_url('/reviews/trail/add/'.$trails_item["slug"]); ?>"> Add new review for this trail</a>

<?php foreach ($reviews_item as $item): ?>
 <h3><?php echo $item['title']; ?>
 </h3> <div class="main"> 
 <h4> Rating: <?php echo $item['rating']; ?> </h4>  
 </div>
 <p><a href="<?php echo site_url('reviews/trail/'.$trails_item["slug"].'/'.$item['slug']); ?>">
 View this review</a></p>
  <?php endforeach; ?> 

