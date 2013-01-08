<?php
/**
 * This is the template that Religion News Service uses to send some of its
 * campaigns using RNS Campaigns.
 *
 * See an example: http://bit.ly/VA5rl7
 *
 * Posts are connected to and displayed in campaigns using Posts 2 Posts. We
 * also can include advertisements, which are managed via the Options Page
 * addon for Advanced Custom Fields along with some other global variables.
 *
 * Original design by Antistatic Design (antistaticdesign.com) and development
 * by Visual Chefs (visualchefs.com).
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Religion News Service</title>
<style type="text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:13px;
		padding:15px;
		margin:0;
		background:#f5f4f2;
	}
	img {
		display:block;
		border:none;
		margin:0;
	}
	.image {
		border:1px solid #dadada;
	}
	.image img {
		border:9px solid #ebeae7;
	}
	a {
		text-decoration:none;
		color:#bd2403;
	}
	p.alt a {
		color:#005f7d;
	}
	/* navigation */
	#main-nav td {
		font-size:12px;
		text-align:center;
		text-transform:uppercase;
	}
	#main-nav td a {
		color:#fff;
	}
	/* main */
	#main h1 {
		font-size:15px;
		text-transform:uppercase;
		color:#b0aea7;
		margin:0 0 6px;
	}
	#main h2 {
		font-size:20px;
		line-height:24px;
		margin:0;
	}
	#main h3 {
		font-size:16px;
		line-height:24px;
		margin:0;
	}
	#main p, #main ul, #main ol {
		line-height:24px;
		margin:0 0 15px;
	}
	#main blockquote {
		padding:0 40px;
		margin:24px 0;
	}
	#main blockquote, #main blockquote p {
		font-family:Georgia, "Times New Roman", Times, serif;
		font-size:16px;
		font-style:italic;
		color:#005f7d;
	}
	#main #events h2 {
		font-size:14px;
		line-height:24px;
		margin:0;
	}
	#main #events h2 a {
		color:#005f7d;
	}
	/* sidebar */
	#quotes blockquote {
		padding:0;
		margin:0;
	}
	#quotes blockquote p {
		font-family:Georgia, "Times New Roman", Times, serif;
		font-style:italic;
		color:#005f7d;
		padding:0;
		margin:0 0 14px;
	}
	#quotes blockquote p cite {
		font-family:Arial, Helvetica, sans-serif;
		font-style:normal;
		color:#000;
	}
	#quotes p {
		font-size:11px;
		line-height:14px;
		text-align:center;
	}
	#sidebar h2 {
		font-size:15px;
		text-transform:uppercase;
		color:#b0aea7;
		margin:0 0 6px;
	}
	#sidebar ul {
		list-style-type:none;
		padding:0;
		margin:0;
	}
	#sidebar ul li {
		line-height:18px;
		padding:0 0 10px;
		border-bottom:1px solid #d4d4d4;
		margin:0 0 10px;
	}
	#sidebar p {
		margin:0;
	}
	/* footer */
	#footer h3 {
		font-size:12px;
		line-height:18px;
		text-transform:uppercase;
		color:#fd3333;
		margin:0;
	}
	#footer ul {
		list-style-type:none;
		padding:0;
		margin:0;
	}
	#footer ul li, #footer p {
		font-size:12px;
		line-height:18px;
		color:#888;
		margin:0;
	}
	#footer a {
		color:#fff;
	}
</style>
</head>
<body>

	<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td>
				<table width="600" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="496" style="font-size:11px; line-height:16px;">Trouble with this email? <webversion>View it as a webpage.</webversion></td>
						<td width="10"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="10" height="16" alt="" style="display:block;"></td>
						<td width="16"><a href="<?php the_field( 'rns_campaign_facebook_url', 'option' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/icon-facebook.gif" width="16" height="16" alt="Find RNS on Facebook" style="display:block;"></a></td>
						<td width="10"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="10" height="16" alt="" style="display:block;"></td>
						<td width="16"><a href="<?php the_field( 'rns_campaign_twitter_url', 'option' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/icon-twitter.gif" width="16" height="16" alt="Follow RNS on Twitter" style="display:block;"></a></td>
						<td width="10"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="10" height="16" alt="" style="display:block;"></td>
						<td width="16"><a href="<?php the_field( 'rns_campaign_google_plus_url', 'option' ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/icon-google.gif" width="16" height="16" alt="Find RNS on Google+" style="display:block;"></a></td>
						<td width="10"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="10" height="16" alt="" style="display:block;"></td>
						<td width="16"><a href="http://feeds.feedburner.com/religion-news-service"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/icon-rss.gif" width="16" height="16" alt="Subscribe via RSS" style="display:block;"></a></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="600" height="10" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td><a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/banner.jpg" width="600" height="109" alt="Religion News Service" style="display:block;"></a></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="600" height="18" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff">
				<table width="600" border="0" cellspacing="0" cellpadding="0">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<tr>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
						<td id="main" width="376" valign="top">
              <?php if ( get_the_content() ) : ?>
                <!-- THE CONTENT -->
                <table width="376" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><?php the_content(); ?></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/hr.gif" width="376" height="5" alt="" style="display:block;"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="376" height="18" alt="" style="display:block;"></td>
                  </tr>
                </table>
              <?php endif; // get_the_content(); ?>

              <!-- ARTICLES -->
              <?php
                // Find connected pages
                $connected = new WP_Query( array(
                  'connected_type' => 'rns_campaigns',
                  'connected_items' => get_queried_object(),
                  'connected_query' => array( 'post_status' => 'any' )
                ) );
              ?>
              <?php if ( $connected->have_posts() ) : ?>
              <!-- <h1>Articles</h1> -->
              <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                <table width="376" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                        <p class="continue"><a href="<?php the_permalink(); ?>">Continue Reading&nbsp;&raquo;</a></p>
                        <?php if ( get_post_meta( get_the_ID(), 'rprs_youtube_url', true ) ) : ?>
                        <p><a href="<?php echo get_post_meta( get_the_ID(), 'rprs_youtube_url', true ); ?>">Watch related video</a></p>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/hr.gif" width="376" height="5" alt="" style="display:block;"></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="376" height="18" alt="" style="display:block;"></td>
                  </tr>
                </table>
              <?php endwhile; wp_reset_postdata(); endif; // if connected posts ?>
						</td>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
						<td id="sidebar" width="170" valign="top">
							<!-- ADS -->
							<table width="170" border="0" cellspacing="0" cellpadding="0">
                <?php while( the_repeater_field( 'rns_campaign_ads', 'option' ) ) : ?>
                    <tr>
                      <td>
                        <a href="<?php the_sub_field( 'rns_campaign_ad_destination_url' ); ?>">
                          <img src="<?php the_sub_field( 'rns_campaign_ad_image' ); ?>" width="170" alt="<?php the_sub_field( 'rns_campaign_ad_alt_text' ); ?>" style="display:block;" />
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
                    </tr>
                <?php endwhile; // if has repeater rows ?>

                <?php // Display the Subscribe, Photos, and Support buttons only if we don't have ads ?>
                <?php if ( !the_repeater_field( 'rns_campaign_ads', 'option' ) ) : ?>
								<tr>
									<td><a href="<?php echo get_site_url(); ?>/subscribe"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/subscribe.jpg" width="170" height="51" alt="Republish our work: Subscribe now." style="display:block;"></a></td>
								</tr>
								<tr>
									<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
								</tr>
								<tr>
									<td><a href="http://archives.religionnews.com/multimedia/photos"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/browse-photos.jpg" width="170" height="51" alt="Looking for the perfect image? Browse photos." style="display:block;"></a></td>
								</tr>
								<tr>
									<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
								</tr>
								<tr>
									<td><a href="<?php echo get_site_url(); ?>/support-rns"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/support-new.jpg" width="170" height="51" alt="Help Religion News grow: Support RNS." style="display:block;"></a></td>
								</tr>
								<tr>
									<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
								</tr>
                <?php endif; ?>
							</table>
						</td>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/footer-hr.gif" width="600" height="13" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td bgcolor="#252523" background="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/footer.gif"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td bgcolor="#252523" background="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/footer.gif">
				<table id="footer" width="600" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
						<td width="124" valign="top">
							<h3>Content</h3>
							<ul>
                <li><a href="http://www.religionnews.com">Home</a></li>
                <li><a href="http://www.religionnews.com/category/politics">Politics</a></li>
                <li><a href="http://www.religionnews.com/category/culture">Culture</a></li>
                <li><a href="http://www.religionnews.com/category/beliefs">Beliefs</a></li>
                <li><a href="http://www.religionnews.com/category/institutions">Institutions</a></li>
                <li><a href="http://www.religionnews.com/category/ethics">Ethics</a></li>
                <li><a href="http://www.religionnews.com/blogs/">Blogs</a></li>
                <li><a href="http://www.religionnews.com/about/">About</a></li>
                <li><a href="http://archives.religionnews.com/sign-in/">Subscriber Login</a></li>
							</ul>
						</td>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
						<td width="124" valign="top">
							<h3>RNS</h3>
							<ul>
                <li><a href="http://pressreleases.religionnews.com/">Press Releases</a></li>
                <li><a href="http://www.religionnews.com/support-rns">Support RNS</a></li>
                <li><a href="http://www.religionnews.com/calendar">Calendar</a></li>
                <li><a href="http://archives.religionnews.com/">Archives</a></li>
                <li><a href="http://www.religionnews.com/advertise">Advertise</a></li>
                <li><a href="http://www.religionnews.com/subscribe">Subscribe</a></li>
							</ul>
						</td>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
						<td width="280" valign="top">
							<h3>Information</h3>
							<p>&copy; <?php echo date('Y'); ?> Religion News Service. All rights reserved. Use of and/or registration on any portion of this site constitutes acceptance of our <a href="<?php echo get_site_url(); ?>/about/user-agreement">User Agreement</a> and <a href="<?php echo get_site_url(); ?>/about/privacy-policy">Privacy Policy</a>. The material on this site may not be reproduced, distributed, transmitted, cached or otherwise used, except with the prior written permission of Religion News Service.</p>
						</td>
						<td width="18"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
					</tr>
				</table>
        <?php endwhile; endif; ?>
			</td>
		</tr>
		<tr>
			<td bgcolor="#252523" background="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/footer.gif"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="18" height="18" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/campaigns/spacer.gif" width="600" height="10" alt="" style="display:block;"></td>
		</tr>
		<tr>
			<td>
				<p style="line-height:18px; text-align:center; color:#666; margin:0;">
					Send this email to a <forwardtoafriend>friend</forwardtoafriend>.<br />
					You can <unsubscribe>instantly unsubscribe</unsubscribe> from this list.
				</p>
			</td>
		</tr>
	</table>

</body>
</html>

