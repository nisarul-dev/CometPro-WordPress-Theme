<?php global $redux_data; //print_r( $redux_data ); echo "Find me here"; ?>
    <footer id="footer-widgets">
      <div class="container">
        <div class="go-top"><a href="#top"><i class="ti-arrow-up"></i></a></div>
        <?php
          // Footer Left Area
          get_sidebar('footer-left');
        ?>

        <?php
          // Footer Right Area
          get_sidebar('footer-right');
        ?>
      </div>
    </footer>
    <footer id="footer">
      <div class="container">
        <div class="footer-wrap">
          <div class="col-md-4">
            <div class="copy-text">
              <p><i class="icon-heart red mr-15"></i><?php echo esc_html( $redux_data['copyright-text'] ); ?></p>
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="#">About</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="footer-social">
              <ul>
                <li><a target="_blank" href="<?php echo esc_url( $redux_data['facebook-link'] ); ?>"><i class="ti-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo esc_url( $redux_data['twitter-link'] ); ?>"><i class="ti-twitter-alt"></i></a></li>
                <li><a target="_blank" href="<?php echo esc_url( $redux_data['linkedin-link'] ); ?>"><i class="ti-linkedin"></i></a></li>
                <li><a target="_blank" href="<?php echo esc_url( $redux_data['instagram-link'] ); ?>"><i class="ti-instagram"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>