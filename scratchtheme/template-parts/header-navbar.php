<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

$menu_items = get_menu_items('header-menu');
?>
<?php if(is_array($menu_items)): ?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo home_url() ?>">
        <?php
          if ( has_custom_logo() ):
            the_custom_logo();
          
          else:
            echo '<h1>' . get_bloginfo('name') . '</h1>';

          endif;
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <?php foreach($menu_items as $menu_item): ?>

            <?php
              $children = array_filter($menu_items, function($check_item) use($menu_item) {
                return $check_item->menu_item_parent == $menu_item->ID;
              });
            ?>

            <?php if($menu_item->menu_item_parent == 0): ?>
              
              <?php if (count($children) > 0): ?>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $menu_item->title ?></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
                  <div class="dropdown-divider"></div>
                  <?php foreach($children as $child): ?>
                  <li><a class="dropdown-item" href="<?php echo $child->url; ?>"><?php echo $child->title; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php else: ?>

              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo $menu_item->url ?>"><?php echo $menu_item->title ?></a>
              </li>

              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
        <form class="d-flex ms-auto" role="search" action='<?php echo get_home_url(); ?>'>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='s'>
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
<?php endif;?>