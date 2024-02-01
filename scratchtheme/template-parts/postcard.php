<style>
  .custom-link {
    color: inherit;
    text-decoration: none;
  }

  .cropped-image-container {
    width: 100%;
    height: 300px; 
    overflow: hidden;
    display:flex;
    justify-content: center;
  }

  .cropped-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

</style>

<?php
if (has_post_thumbnail()) {
    $thumbnail_url = get_the_post_thumbnail_url();
} else {
    $thumbnail_url = esc_url(get_template_directory_uri() . '/assets/images/default_image_placeholder.png');
}
?>
<div class="col-md-6">
  <div class="card m-4 shadow border">
    <?php ; ?>
    <a href="<?php the_permalink() ?>" class="custom-link">
      <div class='cropped-image-container'>
        <img src="<?php echo $thumbnail_url; ?>" class="card-img-top cropped-image">
      </div>
      
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><?php echo strip_tags(get_the_excerpt()); ?></p>
      </div>
    </a>
  </div>
</div>



