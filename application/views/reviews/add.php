<?php echo validation_errors(); ?>

<?php echo form_open('reviews/trail/add/'.$new_path); ?>

<label for="title">Title</label>
<input type="input" name="title" /><br />

<label for="text">Review</label>
<input type="text" name="text" /><br />

<label for="rating">Rating:</label>
  <input type="range" id="rating" name="rating" min="1" max="5">


<input type="submit" name="submit" value="Submit this review" />

</form>