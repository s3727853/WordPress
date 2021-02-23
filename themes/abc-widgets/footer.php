<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ABC_Widgets
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'abc-widgets' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'abc-widgets' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'Cat Supply Co' ), 'Cat Supply Co', '<a href="http://underscores.me/">Jack Edwards</a>' );
				?>
				<br>
			
				<p>This website has been created as part of an assignment in an approved course of study for Curtin University and contains copyright material not created by the author.<br>
				All copyright material used remains copyright of the respective owners and has been used here in pursuant to Section 40 of the Copyright Act 1968 (Commonwealth of Australia).<br>
				No part of this work may be reproduced without consent of the original copyright owners.
				</p>
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
