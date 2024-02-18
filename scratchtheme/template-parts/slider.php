<?php
$images = array();
$label_texts = array();
$content_texts = array();

for($i = 1; $i <= 3; $i++){
  $images[] = wp_get_attachment_url(get_theme_mod('slider_banner_' . $i)) == '' ? get_template_directory_uri().'/assets/images/default_slider.jpg' : wp_get_attachment_url(get_theme_mod('slider_banner_' . $i));
  $label_texts[] = get_theme_mod('slider_label_'. $i) == '' ? 'Slide Label ' . $i : get_theme_mod('slider_label_'. $i);
  $content_texts[] = get_theme_mod('slider_content_'. $i) == '' ? 'Slide Content ' . $i : get_theme_mod('slider_content_'. $i);
}
?>


<div id="captionCarouselSlide" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#captionCarouselSlide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#captionCarouselSlide" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#captionCarouselSlide" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $images[0]; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $label_texts[0];?></h5>
        <p><?php echo $content_texts[0] ?></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo $images[1]; ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $label_texts[1];?></h5>
        <p><?php echo $content_texts[1] ?></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo $images[2]; ?>?>/1000/200" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo $label_texts[2];?></h5>
        <p><?php echo $content_texts[2] ?></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#captionCarouselSlide" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#captionCarouselSlide" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

