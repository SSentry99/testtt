			<div class="newsBlock flex">

				<div class="swiper-container swiper-news">

					<div class="swiper-wrapper">

						<div class="swiper-slide"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/slide.jpg" alt=""></div>

						<div class="swiper-slide"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/slide1.jpg" alt=""></div>

						<div class="swiper-slide"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/slide2.jpg" alt=""></div>

						<div class="swiper-slide"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/slide3.jpg" alt=""></div>

					</div>

					<div class="newsPagination">

						<!-- Add Pagination -->

						<div class="swiper-pagination"></div>

						<!-- Add Arrows -->

						<div class="swiper-button-next"></div>

						<div class="swiper-button-prev"></div>

					</div>

				</div><!-- swiper-news -->

				<div class="news-block">

					<div class="news-block-tab-buttons">

						<span class="active tab-button" data-tab="news"><?php print $lang['news']; ?></span>

					</div>

					<div class="news-block-tab tab-block active" id="news">

						<?php

							$query = "SELECT * FROM news ORDER BY id DESC";

							$records_per_page=intval(getJsonSettings("news"));

							$newquery = $paginate->paging($query,$records_per_page);

							$paginate->dataview($newquery, $lang['sure?'], $web_admin, $jsondataPrivileges['news'], $site_url, $lang['read-more']);

						?>

					</div>

					<div class="load-more">

						<?php $paginate->paginglink($query,$records_per_page,$lang['first-page'],$lang['last-page'],$site_url); ?>

					</div>

				</div><!-- news-block -->

			</div><!-- newsBlock -->