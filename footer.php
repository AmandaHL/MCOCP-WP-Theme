			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<section>
					<div class="footer-contact">
						<div class="footer-left">
							<p>Call Us:<br>xxx-xxx-xxxx or xxx-xxx-xxxx</p>
							<p>Find Us:<br>40 N. Main Street, Suite 500, Dayton, Ohio 45423</p>
							<a href="<?php bloginfo('wpurl');?>/contact-us" class="footer-btn">Send Us an Email</a>
						</div>
						<div class="footer-right">
							<div class="footer-logo">
								<a href="https://www.daytonfoundation.org" target="_blank"><img src="<?php echo get_template_directory_uri();?>/img/The_Dayton_Foundation.jpg" alt="The Dayton Foundation"></a>
							
								<p class="tdf">Montgomery County Ohio College Promise is a fund of The Dayton Foundation.</p>
							</div><!--.footer-logo-->
						</div>
					</div><!--.footer-contact-->
					
					

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
