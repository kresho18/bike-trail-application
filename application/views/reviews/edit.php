<?php echo validation_errors(); ?>

<?php echo form_open('reviews/trail/coastline/edit'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $reviews_item['title']; ?>" /><br />

    <label for="text">Review</label>
    <input type="text" name="text" value="<?php echo $reviews_item['text']; ?>" /><br />

    <label for="quantity">Rating</label>
    <input type="range" name="rating" id="rating" min="1" max="5"  value="<?php echo $reviews_item['rating']; ?>" /><br />

    <input type="submit" name="submit" value="Save the edit" onClick="return confirm('Are you sure you want to edit?');" />

</form>