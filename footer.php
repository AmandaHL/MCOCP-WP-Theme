			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<section>
					<div class="footer-contact">
						<div class="footer-left">
							<p>Call Us:<br>937-225-9922 or 937-225-9957</p>
							<p>Find Us:<br>40 N. Main Street, Suite 500, Dayton, Ohio 45423</p>
						</div>
						<div class="footer-right">
							<a href="<?php bloginfo('wpurl');?>/contact-us" class="footer-btn">Send Us an Email</a>
						</div>
					</div><!--.footer-contact-->
					<div class="footer-logo">
						<img src="<?php echo get_template_directory_uri();?>/img/dayton_foundation.png" alt="The Dayton Foundation">
					</div><!--.footer-logo-->

					<!-- copyright -->
					<p class="copyright">
						&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. All rights reserved.
					</p>
					<!-- /copyright -->
				</section>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
