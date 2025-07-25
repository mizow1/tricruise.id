<aside class="side_left pc">
			<!--<div class="b_banners_txt">
				<div class="banners_txt">
					<div class="footer_btns_txt">
						<p class="footer_btns_txt_ttl">Proposal for Employment Agency Services</p>
						<p>Establishing a foreign-capitalized company requires approximately $660,000 in capital, while establishing a domestic company involves shareholder risks. Before establishing a company in Indonesia, why not enter the Indonesian market using our lower-cost, lower-risk employment agency services?</p>
						<a href="<?php echo home_url(); ?>/contact/"><p class="footer_btns_txt_btn"><span>Learn more details</span></p></a>
					</div>	
				</div>
			</div>-->

			<a href="/visa-services/"><img src="/wp/wp-content/themes/kakemochi/img/column/side_area.png" alt="visa" /></a>
			<a href="/visa-services/"><p class="footer_btns_txt_btn"><span>More details</span></p></a>

			<p class="footer_btns_txt_ttl_s">Search Information</p>
			<div class="side_search">
				<?php
				$args['post_type'] = 'column';
				get_template_part('search', null, $args);
				?>
			</div>
	</aside>
	<!-- left end -->
