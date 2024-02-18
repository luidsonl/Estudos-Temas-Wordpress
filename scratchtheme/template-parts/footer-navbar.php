<?php
$menu_items = get_menu_items('footer-menu');
?>


        
<nav class="navbar">
    <ul class="navbar-nav">
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
</nav>


