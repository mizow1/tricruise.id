<?php
/*
Template Name: トップページ
*/
?>

<?php get_header(); ?>
<body>
<?php get_template_part('after_open_body'); ?>
	<div id="wrapper">
<?php get_template_part('gnav'); ?>
<?php 
if(get_the_post_thumbnail_url($post->ID, "full")){
	$mv = get_the_post_thumbnail_url($post->ID, "full");
	$mv_css =  ' style="background:url('.$mv.')"';
}
?>		
		
		<main id="index_new">
			<article>
			<section class="index_renew_visual area">
					<div class="inner">
						<p class="index_renew_ttl">Your Gateway to Global Success<br><span class="orange">Low-Risk Entry into Indonesia</span></p>
						<p class="txt">Given the high entry barriers for foreign investors in Indonesia, <br class="pc">we advise a step-by-step approach to market entry.</p>
					</div>
				</section>
				<!-- index_new_visual -->

			<!-- インドネシアへの進出支援 -->
        	<section class="index_renew_support area">
			<div class="inner1000 index_renew_support_list_overflow">
						<ul class="index_renew_support_list">
							<li>
								<p class="step"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/step01.png" alt="STEP1" width="78" height="78"></p>
								<p class="ttl">Research</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/img02_01.png" alt="icon" width="79" height="71"></p>
								<p class="txt"><span class="orange">●</span>On-site Inspection<br>
								<span class="orange">●</span>Questionnaire Survey<br>
								<p class="btm">Operate Without Incorporation</p>
							</li>
							<li class="arrow"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/arrow01.png" alt="" width="22" height="36"></li>
							<li>
								<p class="step"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/step02.png" alt="STEP2" width="78" height="78"></p>
								<p class="ttl">EOR</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/img02_02.png" alt="icon" width="79" height="71"></p>
								<p class="txt"><span class="orange">●</span>Trial Sales<br>
								<span class="orange">●</span>Test Marketing</p>
								<p class="btm">Operate Without Incorporation</p>
							</li>
							<li class="arrow"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/arrow01.png" alt="" width="22" height="36"></li>
							<li>
								<p class="step"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/step03.png" alt="STEP3" width="78" height="78"></p>
								<p class="ttl">Formation</p>
								<p class="icon"><img src="<?php echo get_theme_file_uri(); ?>/img/index_new02/img02_03.png" alt="icon" width="79" height="71"></p>
								<p class="txt"><span class="orange">●</span>Domestic Company<br>
								<span class="orange">●</span>Foreign-Owned Company<br>
								<p class="btm orange">Establish a Company</p>
							</li>
						</ul>
					</div>
				</section>
			<!-- //インドネシアへの進出支援 -->				


			<!-- //netad_contId02 -->			  
				<div id="netad_contId02" class="netad_contId02">
				<h3 class="new_ttl01">Why PT. TRICRUISE MARKETING INDONESIA</h3>
				<div class="id_textpage">
				<dl>
					<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/internet-advertising-agency/photo01.png" alt="Comprehensive Market Entry Expertise"></dt>
					<dd>
						<h3 class="netad_sub01 netadnum01"><span class="netad_sub01_num">1</span>Comprehensive Market Entry Expertise</h3>
						<p class="txt">Our specialized knowledge of Indonesia's business landscape enables you to navigate market entry with confidence. We provide end-to-end support—from initial market research through company establishment, visa acquisition, and representative office setup—giving you a seamless experience with a single trusted partner rather than coordinating multiple service providers.</p>
					</dd>
				</dl>
				
				<dl>
					<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/internet-advertising-agency/photo02.png" alt="Local Compliance & Risk Mitigation"></dt>
					<dd>
						<h3 class="netad_sub01 netadnum02"><span class="netad_sub01_num">2</span>Local Compliance & Risk Mitigation</h3>
						<p class="txt">Our team's deep understanding of Indonesia's complex regulatory environment helps protect your business from costly compliance issues. We ensure your company structure, documentation, and employment practices align with current Indonesian laws, significantly reducing legal and operational risks that foreign companies often encounter when entering this dynamic market.</p>
					</dd>
				</dl>
				
				<dl>
					<dt><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/internet-advertising-agency/photo03.png" alt="Time & Resource Optimization"></dt>
					<dd>
						<h3 class="netad_sub01 netadnum03"><span class="netad_sub01_num">3</span>Time & Resource Optimization</h3>
						<p class="txt">By leveraging our established networks and proven processes, we dramatically reduce the time required to establish your business presence in Indonesia. Our employment solutions allow you to build your local team efficiently while focusing on your core business activities, enabling faster market penetration without the administrative burden of managing unfamiliar bureaucratic procedures.</p>
					</dd>
				</dl>
				</div>
			</div>
			<!-- //netad_contId02 -->			  

			<!-- インドネシア進出サービス -->
			<section class="index_new_service_new area">
				<div class="inner1200">
					<h3 class="new_ttl01">Indonesia Market Entry Support Services</h3>
					<ul class="new_service_list_new">
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new01.png" alt="Market Research"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">Market Research</h4>
									<p class="txt">Major research firms often charge USD10,000-20,000 for a single market report on Indonesia, typically over 100 pages long. At that price point, running repeated surveys to support a PDCA cycle becomes unrealistic. We offer lean, affordable market research solutions — enabling agile decision-making without compromising on insight.</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/marketing-services/survey/">more details</a></p>-->
								</div>
							</div>
						</li>
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new02.png" alt="On-site Inspection"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">On-site Inspection</h4>
									<p class="txt">You’ve likely seen many articles and news reports highlighting Indonesia’s growth potential. However, no amount of information can replace the insights gained by being on the ground and experiencing the local energy firsthand. We coordinate customized site visits to help you truly understand the market beyond the data.</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/overseas-expansion/inspection-tour-to-indonesia/">more details</a></p>-->
								</div>
							</div>
						</li>
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new03.png" alt="Visa Application"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">Visa Application</h4>
									<p class="txt">As of April 2025, entering Indonesia—whether for tourism or business—requires a visa that matches your specific purpose. Since January 2024, visa categories have been more strictly defined and managed based on activity type. If you're unsure which visa you need, feel free to contact us for guidance.</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/visa-services/">more details</a></p>-->
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<section class="index_new_service_new area index_new_service_new02">
				<div class="inner1200">
					<ul class="new_service_list_new">
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new04.png" alt="Employment Outsourcing"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">Employment Outsourcing</h4>
									<p class="txt">Establishing a legal entity in Indonesia comes with challenges — foreign-owned companies face a high capital requirement (approx. JPY 100 million), while locally registered entities require Indonesian shareholders who cannot transfer ownership. As a first step into the attractive Indonesian market, why not consider using employment outsourcing services instead of setting up a company?</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/sales-services/employer-of-record/">more details</a></p>-->
								</div>
							</div>
						</li>
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new05.png" alt="Representative Office"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">Representative Office</h4>
									<p class="txt">Unlike setting up a company, establishing a representative office allows for easier and more flexible access to the Indonesian market—making it an ideal entry point. While Indonesia offers great potential, long-term success is never guaranteed. Starting with a representative office is a smart and low-risk way to explore business opportunities before making larger commitments.</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/founding-services/founding-representative-office/">more details</a></p>-->
								</div>
							</div>
						</li>
						<li>
							<p class="img"><img src="<?php echo get_theme_file_uri(); ?>/img/index/index_service_new06.png" alt="Establish a Company"></p>
							<div class="txt_box">
								<div class="txt_box_in">
									<h4 class="new_ttl02">Establish a Company</h4>
									<p class="txt">When establishing a company in Indonesia, one of the first decisions is whether to set up a foreign-owned or locally-owned entity. If you can secure the required capital—approximately JPY 100 million—a foreign-owned company is generally recommended. It allows full ownership and control, offering a more straightforward and transparent path than setting up a local nominee-based entity.</p>
									<!--<p class="new_btn01"><a href="<?php echo home_url(); ?>/founding-services/">more details</a></p>-->
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- インドネシア進出サービス -->


				<!--//Client Testimonials-->
				<div class="sv_box_wrap bg01"">
					<div class="sv_box_inner">
					<h2 class="new_h2_ttl">Client Testimonials</h2>
					<ul class="company_links career_list company_links_one letter_txt">
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Local Site Visit</p>
								<p class="txt">Despite a very tight schedule, they arranged appropriate transportation, drivers, and interpreters, which was a huge help.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Visa Application</p>
								<p class="txt">I was surprised to learn that a VOA (Visa on Arrival) doesn’t allow factory visits, but they fully supported the correct visa application for our needs.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Representative Office Setup</p>
								<p class="txt">They clearly explained the required documents and handled the process so smoothly that the setup went forward without any issues.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Locally-Owned Company Setup</p>
								<p class="txt">We asked them to help set up a company with two former technical interns as shareholders. They also carefully explained important points about using nominees.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Foreign-Owned Company Setup</p>
								<p class="txt">We invested nearly JPY 300 million to establish a foreign-owned company. Their support throughout the land and factory selection gave us great peace of mind.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Survey Research</p>
								<p class="txt">We requested a survey of 200 married women living in Jakarta. They smoothly gathered our target respondents, which was very helpful.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Trade Show Participation</p>
								<p class="txt">They supported our participation in a trade show in Jakarta, even helping with booth setup and visitor engagement on the day of the event.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Influencer Marketing</p>
								<p class="txt">To increase product awareness, they identified influencers who matched our brand and handled all the negotiations.</p>
							</div>
						</li>
						<li>
							<div class="company_links_txt_inner">
								<p class="company_links_ttl"><span class="orange">●</span>Social Media & Ad Management</p>
								<p class="txt">Since we heard Instagram and TikTok are popular in Indonesia, we appreciated being able to entrust them with the entire operation.</p>
							</div>
						</li>
					</ul>
					</div>
				</div>
				<!--//Client Testimonials-->


				<!-- Customer Acquisition Support -->
				<section class="index_new_attracting area">
					<div class="inner1200">
						<h3 class="new_ttl01">Indonesian Customer Acquisition Support</h3>
						<p class="top_txt">In addition to our market entry support for Indonesia, we also provide digital customer acquisition services within the country. From multilingual website development to content marketing, SEO, online ad management, and social media account operations, we offer a comprehensive range of web marketing strategies. Of course, we also support individual services such as SEO or ad management only. Please feel free to contact us for more details.</p>
						<ul class="new_attraction_list">
							<li>
								<p class="ttl">Content Marketing</p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting01.png"></p>
								<p class="txt">We aim to help your prospective and existing customers become loyal fans by delivering the right information at the right time. We support you comprehensively, from strategy planning to execution.</p>
							</li>
							<li>
								<p class="ttl">Influencer Marketing</p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting02.png"></p>
								<p class="txt">Influencer marketing is becoming increasingly important. However, choosing influencers who don’t align with your brand image can be ineffective. We support the selection and coordination process to ensure the right fit.</p>
							</li>
							<li>
								<p class="ttl">Translation Services</p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting03.png"></p>
								<p class="txt">In addition to English, we offer translations into Chinese, Korean, Vietnamese, Indonesian, and other languages. Our multilingual staff with strong Japanese skills provide natural and localized translations.</p>
							</li>
							<li>
								<p class="ttl"><a href="<?php echo home_url(); ?>/digital-marketing/internet-advertising-agency/">Ad Management</a></p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting04.png"></p>
								<p class="txt">We support the delivery of your services and products through a wide range of ads — from Google Ads to Facebook and Instagram. We can propose advertising strategies tailored to your budget, so feel free to consult with us.</p>
							</li>
							<li>
								<p class="ttl">Social Media Management</p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting05.png"></p>
								<p class="txt">Managing official corporate social media accounts has become increasingly complex. Poorly executed social media activities can harm your brand. We provide consulting to help you manage SNS effectively and safely.</p>
							</li>
							<li>
								<p class="ttl"><a href="<?php echo home_url(); ?>/digital-marketing/access-analysis/">Analytics</a></p>
								<p class="icon"><img alt="" src="<?php echo get_theme_file_uri(); ?>/img/index_new/attracting06.png"></p>
								<p class="txt">Are you leaving your SEO, ad campaigns, or SNS operations unchecked? We analyze performance data to evaluate effectiveness and improve future strategies. Let us help you run a successful PDCA cycle.</p>
							</li>
						</ul>
					</div>
				</section>
				<!-- Customer Acquisition Support -->
			
	
				<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
				<!-- Frequently Asked Questions -->
				<section id="area09" class="area">
					<div class="inner">
						<div class="common_parts_w1000">
						<h3 class="new_ttl01">Frequently Asked Questions</h3>
						<div class="bace_faq">
						<dl>
							<dt>
								<span></span><p>Can you arrange a driver and car from the airport to the hotel on the first day of the site visit?</p>
							</dt>
							<dd>
								<span></span><p>Yes, we can. After arriving at the hotel, if you’d like to visit a shopping mall or any other location, the same driver will take you there. We can also provide transportation just for your return to the airport on the final day.</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>We plan to obtain a visa and visit a factory — can you arrange a professional interpreter?</p>
							</dt>
							<dd>
								<span></span><p>Yes, we can arrange one. We’ll propose an interpreter suited to your needs, so please first share the details such as the site, purpose, and content of your visit.</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>How much does employment outsourcing cost?</p>
							</dt>
							<dd>
								<span></span><p>It depends on factors such as whether you plan to hire one person, and under what working conditions. The cost will vary depending on how your business is structured in Indonesia. Please feel free to contact us for a consultation.</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>Can a representative office be converted into a local or foreign-owned entity after 6 months to 1 year?</p>
							</dt>
							<dd>
								<span></span><p>No, it cannot. If you wish to establish a local or foreign-owned company, you will need to incorporate a new entity.</p>
							</dd>
						</dl>
						<dl>
							<dt>
								<span></span><p>How much capital is required to set up a foreign-owned company?</p>
							</dt>
							<dd>
								<span></span><p>The minimum paid-up capital required for foreign-owned companies is IDR 10 billion (approximately JPY 100 million).</p>
							</dd>
						</dl>
						</div>
					</div>
					</div>
				</section>
				<!-- Frequently Asked Questions -->
			

				<!-- New_CTA -->
				<div class="n_cta">
					<div class="n_cta_L">
						<div class="n_cta_L_inner">
							<p class="n_cta_L_ttl">We are experts for Entering the Indonesian Market</p>
							<dl class="n_cta_L_cont">
								<dt><img src="<?php echo get_theme_file_uri(); ?>/img/index_new/n_cta.png" alt="インドネシア市場にて成功させるコツがある"></dt>
								<dd>
									<p class="n_cta_L_ttl02">Research<br>EOR / VISA<br>Formation</p>
								</dd>
							</dl>
							<p class="n_cta_L_bottom">Supporting foreign companies in expanding to Indonesia.</p>
						</div>
					</div>

					<div class="n_cta_R">
						<div class="n_cta_R_inner">
							<script src="https://js-na2.hsforms.net/forms/embed/242405365.js" defer></script>
							<div class="hs-form-frame" data-region="na2" data-form-id="f7c0a558-198b-40dc-8b9e-28f17252099c" data-portal-id="242405365"></div>
						</div>
					</div>
				</div>
				<!-- //New_CTA -->

				

				

				<!--<?php get_template_part('news'); ?>-->
				<?php get_template_part('news_column'); ?>
				<!-- お電話でのお問い合わせ -->
				<div id="contact_new_area">
					<section class="new_contact_box area">
						<div class="inner">
							<div class="box">
								<div class="tel">
									<p class="tel_txt">Contact Us by Phone</p>
									<p class="tel_btn">
										<a href="tel:050-1721-9794"><span class="icon"><img src="https://tricruise.id/wp/wp-content/themes/kakemochi/img/ownedmedia-to-expand-indonesia/contact_tel.png" alt="050-1721-9794"></span>050-1721-9794</a>
									</p>
									<p class="time">（9:00〜19:00）</p>
								</div>	
								<a href="https://tricruise.id/company/?__hstc=753710.eccdba32f896e9fecee3598728d41d2f.1726551375612.1726551375612.1726551375612.1&amp;__hssc=753710.228.1726551375612&amp;__hsfp=1044320531" class="intro orange">Company Info</a>
							</div>
						</div>
					</section>
				</div>
				<!-- //お電話でのお問い合わせ -->
				

							
			</article>
			<!-- article end -->
		</main>
		
<?php get_template_part('parts/contact/contact'); ?>




<?php get_template_part('about'); ?>
<?php 
$sidebar = ''; // $sidebar変数を初期化
$args['sidebar']=$sidebar;
get_footer('',$args);
?>

		<div id="page_top">
			<span></span>
		</div>
		<!-- page_top end -->		
		
	</div>
	<!-- wrapper end -->
<?php get_template_part('before_close_body'); ?>
<?php wp_footer(); ?>
</body>
</html>
