<?php global $redux_data; // print_r( $redux_data[ 'logo-light' ][ 'url' ] ); ?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- <div id="loader">
      <div class="centrize">
        <div class="v-center">
          <div id="mask"><span></span><span></span><span></span><span></span><span></span></div>
        </div>
      </div>
    </div> -->

    <header id="topnav">
      <div class="container">
        <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_attr( $redux_data[ 'logo-light' ][ 'url' ] ); ?>" alt="" class="logo-light"><img src="<?php echo esc_attr( $redux_data[ 'logo-dark' ][ 'url' ] ); ?>" alt="" class="logo-dark"></a></div>
        <div class="menu-extras">
          <div class="menu-item">
            <div class="cart"><a href="#"><i class="ti-bag"></i><span class="cart-number">2</span></a>
              <div class="shopping-cart">
                <div class="shopping-cart-info">
                  <div class="col-xs-6">
                    <div class="row">
                      <h6 class="upper">Your Cart</h6>
                    </div>
                  </div>
                  <div class="col-xs-6 text-right">
                    <div class="row">
                      <h6 class="upper">$399.99</h6>
                    </div>
                  </div>
                </div>
                <ul class="nav product-list">
                  <li>
                    <div class="product-thumbnail"><img src="<?php echo get_template_directory_uri() . '/images' ?>/shop/2.jpg" alt=""></div>
                    <div class="product-summary"><a href="#">Premium Suit Blazer</a><span>$199.99</span></div>
                  </li>
                  <li>
                    <div class="product-thumbnail"><img src="<?php echo get_template_directory_uri() . '/images' ?>/shop/5.jpg" alt=""></div>
                    <div class="product-summary"><a href="#">Reiss Vara Tailored Blazer</a><span>$199.99</span></div>
                  </li>
                </ul>
                <p><a href="#" class="btn btn-color btn-block btn-sm">Checkout</a></p>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <div class="search"><a href="#"><i class="ti-search"></i></a>
              <div class="search-form">
                <form action="#" class="inline-form">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                      <button type="button" class="btn btn-color"><span><i class="ti-search"></i></span></button></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="menu-item"><a class="navbar-toggle">
              <div class="lines"><span></span><span></span><span></span></div></a></div>
        </div>
          <?php wp_nav_menu( [
            'theme_location' => 'main-menu',
            'container_id'   => 'navigation',
            'menu_class'     => 'navigation-menu',
            'items_wrap'     => '<ul id="%1$s" class="dropdown %2$s"  data-dropdown-menu>%3$s</ul>',
            'walker'         => new Commetpro_Header_Nav_Menu(),
          ] ); ?>
      </div>
    </header>