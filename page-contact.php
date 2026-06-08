<?php
/**
 * Template for the Contact page (slug: contact)
 * WordPress automatically uses this file when the page slug is "contact"
 */

get_header(); ?>

<main id="main" class="site-main">

	<!-- ======= PAGE HERO ======= -->
	<section class="cv-page-hero">
		<div class="cv-container">
			<p class="cv-page-hero__eyebrow"><?php esc_html_e( 'Get in Touch', 'chique-vintique' ); ?></p>
			<h1 class="cv-page-hero__title"><?php esc_html_e( 'Contact Us', 'chique-vintique' ); ?></h1>
			<p class="cv-page-hero__subtitle"><?php esc_html_e( 'Have a question about a piece, a special request, or just want to say hello? We\'d love to hear from you.', 'chique-vintique' ); ?></p>
		</div>
	</section>

	<!-- ======= CONTACT CONTENT ======= -->
	<section class="cv-section" style="background:var(--cv-white);">
		<div class="cv-container">
			<div class="cv-contact-layout">

				<!-- Contact Form -->
				<div class="cv-contact-form">
					<h2 class="cv-contact-form__heading"><?php esc_html_e( 'Send a Message', 'chique-vintique' ); ?></h2>

					<?php
					// If Contact Form 7 is active, output the shortcode
					if ( function_exists( 'wpcf7' ) || class_exists( 'WPCF7' ) ) {
						echo do_shortcode( '[contact-form-7 id="contact-form" title="Contact form 1"]' );
					} else {
						// Fallback plain HTML form until CF7 is installed
						?>
						<form class="cv-plain-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
							<div class="cv-form-row">
								<label for="cv-name"><?php esc_html_e( 'Your Name', 'chique-vintique' ); ?></label>
								<input type="text" id="cv-name" name="cv_name" placeholder="<?php esc_attr_e( 'Jane Smith', 'chique-vintique' ); ?>" required>
							</div>
							<div class="cv-form-row">
								<label for="cv-email"><?php esc_html_e( 'Email Address', 'chique-vintique' ); ?></label>
								<input type="email" id="cv-email" name="cv_email" placeholder="<?php esc_attr_e( 'jane@example.com', 'chique-vintique' ); ?>" required>
							</div>
							<div class="cv-form-row">
								<label for="cv-subject"><?php esc_html_e( 'Subject', 'chique-vintique' ); ?></label>
								<input type="text" id="cv-subject" name="cv_subject" placeholder="<?php esc_attr_e( 'Enquiry about...', 'chique-vintique' ); ?>">
							</div>
							<div class="cv-form-row">
								<label for="cv-message"><?php esc_html_e( 'Message', 'chique-vintique' ); ?></label>
								<textarea id="cv-message" name="cv_message" rows="6" placeholder="<?php esc_attr_e( 'Tell us what you\'re looking for or ask us anything...', 'chique-vintique' ); ?>" required></textarea>
							</div>
							<div class="cv-form-row">
								<p class="cv-form-note"><?php esc_html_e( 'Note: Please install Contact Form 7 to enable this form.', 'chique-vintique' ); ?></p>
							</div>
						</form>
						<?php
					}
					?>
				</div>

				<!-- Contact Info -->
				<div class="cv-contact-info">
					<h2 class="cv-contact-info__heading"><?php esc_html_e( 'Find Us', 'chique-vintique' ); ?></h2>

					<div class="cv-contact-info__block">
						<h3><?php esc_html_e( 'Email', 'chique-vintique' ); ?></h3>
						<p><a href="mailto:hello@chiquevintique.co.uk">hello@chiquevintique.co.uk</a></p>
					</div>

					<div class="cv-contact-info__block">
						<h3><?php esc_html_e( 'Opening Hours', 'chique-vintique' ); ?></h3>
						<p>
							<?php esc_html_e( 'Online shop open 24/7', 'chique-vintique' ); ?><br>
							<?php esc_html_e( 'We aim to respond to enquiries within 1–2 working days.', 'chique-vintique' ); ?>
						</p>
					</div>

					<div class="cv-contact-info__block">
						<h3><?php esc_html_e( 'Follow Along', 'chique-vintique' ); ?></h3>
						<p><?php esc_html_e( 'We share new finds and behind-the-scenes on Instagram and Facebook.', 'chique-vintique' ); ?></p>
						<div class="cv-social-links">
							<a href="#" class="cv-social-link" aria-label="Instagram">Instagram</a>
							<a href="#" class="cv-social-link" aria-label="Facebook">Facebook</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
