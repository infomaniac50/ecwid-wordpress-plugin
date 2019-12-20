<div class="named-area">
	<div class="named-area__header">
		<div class="named-area__titles"><div class="named-area__title"><?php _e( 'Design', 'ecwid-shopping-cart'); ?></div></div>
		<div class="named-area__description"><?php _e( 'Personalize your storefront appearance', 'ecwid-shopping-cart'); ?></div>
	</div>
	<div class="named-area__body">

		<div class="a-card a-card--compact">
			<div class="a-card__paddings">
				<div class="iconable-block">
					<div class="iconable-block__infographics">
						<span class="iconable-block__icon">
							<?php
							ecwid_embed_svg( 'admin-storefront/icons/site-appearance' );
							?>
						</span>
					</div>
					<div class="iconable-block__content">
						<div class="cta-block">
							<div class="cta-block__central">
								<div class="cta-block__title"><?php _e( 'Store appearance', 'ecwid-shopping-cart'); ?></div>
								<div class="cta-block__content">
									<?php
									if( Ecwid_Admin_Storefront_Page::is_used_gutenberg() ) {
										_e( 'Used Gutenberg. Adjust your store design to fit your business better', 'ecwid-shopping-cart');
									} else {
										_e( 'Not used Gutenberg. Adjust your store design to fit your business better', 'ecwid-shopping-cart');
									}
									?>
								</div>
							</div>
							<div class="cta-block__cta">
								<a href="<?php echo $design_edit_link;?>" target="_blank" class="btn btn-default btn-medium"><?php _e( 'Edit', 'ecwid-shopping-cart'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="a-card a-card--compact">
			<div class="a-card__paddings">
				<div class="iconable-block">
					<div class="iconable-block__infographics">
						<span class="iconable-block__icon">
							<?php
							ecwid_embed_svg( 'admin-storefront/icons/site-content' );
							?>
						</span>
					</div>
					<div class="iconable-block__content">
						<div class="cta-block">
							<div class="cta-block__central">
								<div class="cta-block__title"><?php _e( 'Store page content', 'ecwid-shopping-cart'); ?></div>
								<div class="cta-block__content"><?php _e( 'By default, your store page displays your store products and categories. As with other WordPress pages, you can add extra text or widgets to it.', 'ecwid-shopping-cart'); ?></div>
							</div>
							<div class="cta-block__cta">
								<a href="<?php echo $design_edit_link; ?>" target="_blank" class="btn btn-default btn-medium">
									<?php _e( 'Edit', 'ecwid-shopping-cart'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>