<?php
// $the_url=urlencode(get_permalink());
$title_encode=urlencode(get_the_title());
$the_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$twitter_count = get_twitter_count(get_permalink());
// $facebook_count = get_facebook_count(get_permalink());

?>
<div class="sns_share">
	<ul class="sns01">
		<li>
			<a class="facebook sns_item" href="https://www.facebook.com/sharer.php?src=bm&u=<?php echo $the_url;?>&t=<?php echo $title_encode;?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" rel="nofollow">
				<img src="<?php echo get_theme_file_uri(); ?>/img/voice/sns01.png" alt="facebook">
				<span></span>
				<span class="sns_count"><?php if($facebook_count>0){echo $facebook_count;}?></span>
			</a>
		</li>
		<li>
			<a class="twitter sns_item" href="https://twitter.com/intent/tweet?url=<?php echo $the_url;?>&text=<?php echo $title_encode ?>&tw_p=tweetbutton" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" rel="nofollow">
				<img src="<?php echo get_theme_file_uri(); ?>/img/voice/sns02.png" alt="Twitter">
				<span></span>
				<span class="sns_count"><?php if($twitter_count>0){echo $twitter_count;} ?></span>
			</a>
		</li>
		<li>
			<a href="https://social-plugins.line.me/lineit/share?url=<?php echo get_permalink(); ?>">
				<img src="<?php echo get_theme_file_uri(); ?>/img/voice/sns03.png" alt="LINE">
			</a>
		</li>
		<li>
			<div class="link_copy" data-clipboard-text="<?php the_permalink(); ?>">
				<span>
					<img src="<?php echo get_theme_file_uri(); ?>/img/voice/sns04.png" alt="link">
				</span>
			</div>
		</li>
       <li>
                        <a class="pocket sns_item" href="https://getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" rel="nofollow">
                        
                                <img src="<?php echo get_theme_file_uri(); ?>/img/voice/sns06.png" alt="pocket">
                                <span></span>
                                <!--span class="sns_count">
                                        <?php
                                                $res2 = json_decode($res);
                                                echo $res2->saves;
                                        ?>
                                </span-->
                        </a>
       </li>
		<li>
		<a href="https://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="touch-counter" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
       </li>
		<li>
		<a href='https://feedly.com/i/subscription/feed%2Fhttps%3A%2F%2Ftricruise.id%2Ffeed%2F'  target='blank'><img id='feedlyFollow' src='https://s1.feedly.com/legacy/feedly-follow-square-flat-green_2x.png' alt='follow us in feedly' width='28' height='28'></a>
		</li>       
	</ul>
</div><!-- /.sns_share -->
