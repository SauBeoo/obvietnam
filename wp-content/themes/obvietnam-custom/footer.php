<?php
/**
 * The footer for our theme
 *
 * @package OB_Vietnam_Custom
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-container">
			<div class="footer-container">
				<div class="footer-about">
					<?php if ( is_active_sidebar( 'footer-about' ) ) : ?>
						<?php dynamic_sidebar( 'footer-about' ); ?>
					<?php else : ?>
						<div class="footer-logo">
							<?php
							if ( has_custom_logo() ) :
								the_custom_logo();
							else :
							?>
								<h3 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
							<?php
							endif;
							?>
						</div>
						<div class="footer-about-text">
							<?php echo esc_html( get_theme_mod( 'footer_about_text', 'OB Việt Nam Group là đơn vị cung cấp giải pháp cung ứng hàng hoá toàn diện, kết nối chuỗi cung ứng trên khắp toàn cầu với hơn 10 năm kinh nghiệm.' ) ); ?>
						</div>
						<div class="footer-social">
							<?php if ( get_theme_mod( 'social_facebook', '#' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'social_facebook', '#' ) ); ?>" class="footer-social-link" target="_blank">
									<i class="fab fa-facebook-f"></i>
								</a>
							<?php endif; ?>
							
							<?php if ( get_theme_mod( 'social_twitter', '#' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'social_twitter', '#' ) ); ?>" class="footer-social-link" target="_blank">
									<i class="fab fa-twitter"></i>
								</a>
							<?php endif; ?>
							
							<?php if ( get_theme_mod( 'social_linkedin', '#' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'social_linkedin', '#' ) ); ?>" class="footer-social-link" target="_blank">
									<i class="fab fa-linkedin-in"></i>
								</a>
							<?php endif; ?>
							
							<?php if ( get_theme_mod( 'social_youtube', '#' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'social_youtube', '#' ) ); ?>" class="footer-social-link" target="_blank">
									<i class="fab fa-youtube"></i>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				
				<div class="footer-links">
					<h3 class="footer-heading"><?php esc_html_e( 'Liên kết nhanh', 'obvietnam-custom' ); ?></h3>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-links',
							'menu_id'        => 'footer-links-menu',
							'container'      => false,
							'menu_class'     => 'footer-menu',
							'fallback_cb'    => 'obvietnam_custom_footer_links_fallback',
							'depth'          => 1,
						)
					);
					?>
				</div>
				
				<div class="footer-links">
					<h3 class="footer-heading"><?php esc_html_e( 'Dịch vụ', 'obvietnam-custom' ); ?></h3>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-services',
							'menu_id'        => 'footer-services-menu',
							'container'      => false,
							'menu_class'     => 'footer-menu footer-services-menu',
							'fallback_cb'    => 'obvietnam_custom_footer_services_fallback',
							'depth'          => 1,
						)
					);
					?>
				</div>
				
				<div class="footer-contact">
					<?php if ( is_active_sidebar( 'footer-contact' ) ) : ?>
						<?php dynamic_sidebar( 'footer-contact' ); ?>
					<?php else : ?>
						<h3 class="footer-heading"><?php esc_html_e( 'Liên hệ', 'obvietnam-custom' ); ?></h3>
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<div class="footer-contact-text footer-contact-address">
								<?php echo esc_html( get_theme_mod( 'contact_address', '123 Nguyễn Trãi, Thanh Xuân, Hà Nội' ) ); ?>
							</div>
						</div>
						
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fas fa-phone-alt"></i>
							</div>
							<div class="footer-contact-text footer-contact-phone">
								<?php echo esc_html( get_theme_mod( 'contact_phone', '0987 654 321' ) ); ?>
							</div>
						</div>
						
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fas fa-envelope"></i>
							</div>
							<div class="footer-contact-text footer-contact-email">
								<?php echo esc_html( get_theme_mod( 'contact_email', 'info@obvietnam.com' ) ); ?>
							</div>
						</div>
						
						<div class="footer-contact-item">
							<div class="footer-contact-icon">
								<i class="fas fa-clock"></i>
							</div>
							<div class="footer-contact-text footer-contact-hours">
								<?php echo esc_html( get_theme_mod( 'contact_hours', 'Thứ 2 - Thứ 7: 8:00 - 17:30' ) ); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="footer-bottom">
				<div class="copyright-text">
					<?php echo esc_html( get_theme_mod( 'copyright_text', '© Copyright ' . date('Y') . ' OB Việt Nam Group - All Rights Reserved' ) ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( get_theme_mod( 'show_chat_buttons', true ) ) : ?>
<div class="chat-buttons">
	<?php if ( get_theme_mod( 'zalo_number', '0987654321' ) ) : ?>
		<a href="https://zalo.me/<?php echo esc_attr( get_theme_mod( 'zalo_number', '0987654321' ) ); ?>" class="chat-button chat-zalo" target="_blank">
			<i class="fab fa-facebook-messenger"></i>
			<span class="chat-tooltip">Zalo: <?php echo esc_html( get_theme_mod( 'zalo_number', '0987654321' ) ); ?></span>
		</a>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'facebook_messenger', 'https://messenger.com/t/obvietnam/' ) ) : ?>
		<a href="<?php echo esc_url( get_theme_mod( 'facebook_messenger', 'https://messenger.com/t/obvietnam/' ) ); ?>" class="chat-button chat-messenger" target="_blank">
			<i class="fab fa-facebook-messenger"></i>
			<span class="chat-tooltip">Messenger</span>
		</a>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'contact_phone', '0987 654 321' ) ) : ?>
		<a href="tel:<?php echo esc_attr( str_replace( ' ', '', get_theme_mod( 'contact_phone', '0987 654 321' ) ) ); ?>" class="chat-button chat-phone">
			<i class="fas fa-phone-alt"></i>
			<span class="chat-tooltip">Gọi: <?php echo esc_html( get_theme_mod( 'contact_phone', '0987 654 321' ) ); ?></span>
		</a>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
