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
$cat_list = get_the_category();
$tag_list = get_the_tags();
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
        <div class="card-body">
        
        <div class="border-top mt-2 row">
                <div class="col-md-6">
                    <?php foreach($cat_list as $cat): ?>
                        <a href="<?php echo get_category_link($cat->term_id);?>" class="small me-1"><?php echo $cat->name;?> </a> 
                    <?php endforeach; ?>
                </div>
                <div class="col-md-6 text-end">
                  <?php if(is_array($tag_list)): ?>
                    <?php foreach($tag_list as $tag): ?>
                        <a href="<?php echo get_tag_link($tag->term_id);?>" class="small me-1">#<?php echo $tag->name;?> </a> 
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
            </div>
      </div>
      </div>
    </a>
  </div>
</div>



