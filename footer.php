    <footer id="footer-widgets">
      <div class="container">
        <div class="go-top"><a href="#top"><i class="ti-arrow-up"></i></a></div>
        <?php
          // Footer Left Area
          get_sidebar('footer-left');
        ?>

        <?php
          // Footer Left Area
          get_sidebar('footer-right');
        ?>
      </div>
    </footer>
    <footer id="footer">
      <div class="container">
        <div class="footer-wrap">
          <div class="col-md-4">
            <div class="copy-text">
              <p><i class="icon-heart red mr-15"></i>© 2015 Comet Agency.</p>
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
                <li><a target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                <li><a target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                <li><a target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                <li><a target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                <li><a target="_blank" href="#"><i class="ti-dribbble"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>