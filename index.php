<?php

	@ob_start();

	include 'include/functions/header.php';

?>

<!DOCTYPE html>

<html lang="<?php print $language_code; ?>">



<head>

    <meta charset="UTF-8" />

	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->

    <title><?php print $site_title.' - '.$title; if($offline) print ' - '.$lang['server-offline']; ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php print $site_url; ?>templates/battleforlorencia/css/swiper.min.css">

	<link href="<?php print $site_url; ?>templates/battleforlorencia/css/override.css" rel="stylesheet">

    <link href="<?php print $site_url; ?>templates/battleforlorencia/css/main.css" rel="stylesheet">

    <link href="<?php print $site_url; ?>templates/battleforlorencia/css/style.css" rel="stylesheet">

    <link href="<?php print $site_url; ?>templates/battleforlorencia/css/profiles.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap" rel="stylesheet">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.min.css" rel="stylesheet" media="screen">

	</div>			
				
			<video class="pixarts-header-video" muted muted="muted" loop autoplay autoplay="autoplay">
				<source src="<?php print $site_url; ?>video/header.webm" type="video/webm"></source>
			</video>

		</header>
	

	<link href="<?php print $site_url; ?>css/font-awesome.min.css" rel="stylesheet">

	<?php if($page=="admin" && $a_page=="player_edit") { ?>

    <link rel='stylesheet' href='<?php print $site_url; ?>css/bootstrap-select.css'/>

	<?php } ?>

	<link rel="shortcut icon" href="<?php print $site_url; ?>images/favicon.ico?v=" />

</head>



<body class="<?php if($page=='news' || $page=='') print 'bodyHomePage'; ?>">

	<div class="wrapper">

		<?php

			if($item_shop!="")

				$shop_url = $item_shop;

			else if(is_dir('shop')) 

				$shop_url = $site_url.'shop'; 

			else print $shop_url = '';

			

			if(!$offline && $database->is_loggedin() && $web_admin>=$jsondataPrivileges['news'] && isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['title']) && !empty($_POST['content']))

				$paginate->add($_POST['title'], $_POST['content']);

		?>

		<header class="header<?php if($page=='news' || $page=='') print ' headerHomePage'; ?>">

			<div class="topPanel">

				<div class="topPanel-wrapper flex-s">

					<div class="logo">

						<a href="<?php print $site_url; ?>"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/logo.png" alt=""></a>

					</div>

					<nav class="menu">

						<ul>

							<li><a href="<?php print $site_url; ?>news"><?php print $lang['news']; ?></a></li>

							<?php if(!$database->is_loggedin()) { ?>

							<li><a href="<?php print $site_url; ?>users/register"><?php print $lang['register']; ?></a></li>

							<?php } else { if(!$web_admin) { ?>

							<li><a href="<?php print $shop_url; ?>" target="_blank"><?php print $lang['item-shop']; ?></a></li>

							<?php } else { ?>

							<li><a href="<?php print $site_url; ?>admin"><?php print $lang['administration']; ?></a></li>

							<?php

							} } ?>

							<li><a href="<?php print $site_url; ?>ranking/players"><?php print $lang['ranking']; ?></a>

								<ul>

									<li><a href="<?php print $site_url; ?>ranking/players"><?php print $lang['players']; ?></a></li>

									<li><a href="<?php print $site_url; ?>ranking/guilds"><?php print $lang['guilds']; ?></a></li>

								</ul>

							</li>

							<li><a href="#"><?php print $json_languages['languages'][$language_code]; ?></a>

								<ul>

									<?php

										foreach($json_languages['languages'] as $key => $value)

											print '<li><a href="'.$site_url.'?lang='.$key.'">'.$value.'</a></li></br>';

									?>

								</ul>

							</li>

						</ul>

					</nav>

					<?php if(!$database->is_loggedin()) { ?>

					<div class="acc-panel flex-c">

						<a href="<?php print $site_url; ?>users/login">

							<?php print $lang['login']; ?>

							<span><?php print $lang['user-panel']; ?></span>

						</a>

					</div>

					<?php } else { ?>

					<div class="acc-panel flex-c">

						<a href="<?php print $site_url; ?>user/administration">

							<?php print getAccountName($_SESSION['id']); ?>

							<span><?php print $lang['user-panel']; ?></span>

						</a>

					</div>

					<?php } ?>

				</div><!-- topPanel-wrapper -->

			</div><!-- topPanel -->		

			<?php if($page=='news' || $page=='') { ?>

			<div class="headerButtons flex">

				<a href="<?php print $site_url; ?>download" class="downloadButton">

					<span><?php print $lang['download']; ?></span>

					Game Client

				</a>

				<div class="headerButtons-other" style="margin-right:17px;">

					<a href="<?php print $social_links['facebook']; ?>" target="_blank">

						<div class="b-icons fb">

						</div>

						Join us on

						<span>Facebook</span>

					</a>

					<a href="<?php $forum; ?>" target="_blank">

						<div class="b-icons forum">

						</div>

						Community

						<span>Forum</span>

					</a>

				</div>

				<div class="headerButtons-other">

					<a href="<?php print $social_links['instagram']; ?>" target="_blank">

						<div class="b-icons ig">

						</div>

						<span>Instagram</span>

					</a>

					<a href="<?php print $social_links['https://discord.gg/dreamz2']; ?>" target="_blank">

						<div class="b-icons wp">

						</div>

						<span>DISCORD</span>

					</a>

				</div>

				<?php if(!$database->is_loggedin()) { ?>

				<a href="<?php print $site_url; ?>users/register" class="registerButton">

					<span><?php print $lang['register']; ?></span>

				</a>

				<?php } else { ?>

				<a href="<?php print $site_url; ?>users/logout" class="registerButton">

					<span><?php print $lang['logout']; ?></span>

				</a>

				<?php } ?>

			</div><!-- headerButtons -->

			<?php include 'pages/news.php';

			} ?>

		</header><!-- .header-->

		<?php if($page=='news' || $page=='') { ?>

		<br /><br />

		<?php

			if(!$offline && $database->is_loggedin())

				if($web_admin>=$jsondataPrivileges['news'])

					include 'include/functions/add-news.php';

		?>

<div class="row">

    <div class="col-xs-6">

        <div class="blockTitle">

            <h2><span><?php print $lang['ranking']; ?></span> <?php print $lang['players']; ?></h2>

        </div><!-- blockTitle -->



		<table class="table">

		   <tr>

			  <th></th>

			  <th><?php print $lang['name']; ?></th>

			  <th class="text-center"><?php print $lang['level']; ?></th>

		   </tr>

				<?php

					if(!$offline) {

					$top = array();

					$top = top10players();

					

					foreach($top as $player)

					{

				?>

			   <tr>

				  <td class="text-center"><img src="<?php print $site_url; ?>images/job/<?php print $player['job']; ?>.png" width="30px" height="auto" style="-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;-khtml-border-radius: 50%;"/></td>

				  <td><a href="<?php print $site_url; ?>ranking/players"><?php print $player['name']; ?></a></td>

				  <td class="text-center"><?php print $player['level']; ?></td>

			   </tr>

				<?php }

					}

				?>

		</table>

	</div>

    <div class="col-xs-6">

        <div class="blockTitle">

            <h2><span><?php print $lang['ranking']; ?></span> <?php print $lang['guilds']; ?></h2>

        </div><!-- blockTitle -->

		<table class="table">

		   <tr>

			  <th></th>

			  <th><?php print $lang['name']; ?></th>

			  <th class="text-center"><?php print $lang['points']; ?></th>

		   </tr>

				<?php

					if(!$offline) {

					$top = array();

					$top = top10guilds();

					

					foreach($top as $guild)

					{

				?>

			   <tr>

				  <td class="text-center"><img src="<?php print $site_url; ?>images/empire/<?php print $empire=get_guild_empire($guild['master']); ?>.jpg" width="30" height="30" style="-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;-khtml-border-radius: 50%;"></td>

				  <td><a href="<?php print $site_url; ?>ranking/guilds"><?php print $guild['name']; ?></a></td>

				  <td class="text-center"><?php print number_format($guild['ladder_point'], 0, '', '.'); ?></td>

			   </tr>

				<?php }

					}

				?>

		</table>

	</div>

</div>

 

<div class="infoBlockHome">

    <!-- Swiper -->

    <div class="slider">

        <div class="swiper-container slider gallery-top">

            <div class="swiper-wrapper">

				<?php 

					$warrior = get_best_by_class(0);

					$ninja = get_best_by_class(1);

					$sura = get_best_by_class(2);

					$shaman = get_best_by_class(3);

				?>

                <div class="swiper-slide" style="background-image: url(<?php print $site_url; ?>templates/battleforlorencia/img/warrior.png);">

                    <div class="classNameBlock flex-c">

                        <div class="class-img warrior">

                        </div>

                        <div class="className">

                            <h2><?php print $warrior['name']; ?></h2>

                            <span><?php print $lang['warrior']; ?></span>

                        </div>

                    </div><!-- classNameBlock -->

                    <div class="skillBlock">

                        <p><?php print $lang['empire']; ?>: <b><?php print emire_name(get_player_empire($warrior['account_id'])); ?></b></p>

                        <p><?php print $lang['level']; ?>: <b><?php print $warrior['level']; ?></b></p>

                        <p>TIMP: <b><?php print number_format($warrior['playtime'], 0, '', '.'); ?></b></p>

                    </div><!-- skillBlock -->

                </div>

                <div class="swiper-slide" style="background-image: url(<?php print $site_url; ?>templates/battleforlorencia/img/shaman.png);">

                    <div class="classNameBlock flex-c">

                        <div class="class-img magic">

                        </div>

                        <div class="className">

                            <h2><?php print $shaman['name']; ?></h2>

                            <span><?php print $lang['shaman']; ?></span>

                        </div>

                    </div><!-- classNameBlock -->

                    <div class="skillBlock">

                        <p><?php print $lang['empire']; ?>: <b><?php print emire_name(get_player_empire($shaman['account_id'])); ?></b></p>

                        <p><?php print $lang['level']; ?>: <b><?php print $shaman['level']; ?></b></p>

                        <p>TIMP: <b><?php print number_format($shaman['playtime'], 0, '', '.'); ?></b></p>

                    </div><!-- skillBlock -->

                </div>

                <div class="swiper-slide" style="background-image: url(<?php print $site_url; ?>templates/battleforlorencia/img/ninja.png);">

                    <div class="classNameBlock flex-c">

                        <div class="class-img archer">

                        </div>

                        <div class="className">

                            <h2><?php print $ninja['name']; ?></h2>

                            <span><?php print $lang['ninja']; ?></span>

                        </div>

                    </div><!-- classNameBlock -->

                    <div class="skillBlock">

                        <p><?php print $lang['empire']; ?>: <b><?php print emire_name(get_player_empire($ninja['account_id'])); ?></b></p>

                        <p><?php print $lang['level']; ?>: <b><?php print $ninja['level']; ?></b></p>

                        <p>TIMP: <b><?php print number_format($ninja['playtime'], 0, '', '.'); ?></b></p>

                    </div><!-- skillBlock -->

                </div>

                <div class="swiper-slide" style="background-image: url(<?php print $site_url; ?>templates/battleforlorencia/img/sura.png);">

                    <div class="classNameBlock flex-c">

                        <div class="class-img magic">

                        </div>

                        <div class="className">

                            <h2><?php print $sura['name']; ?></h2>

                            <span><?php print $lang['sura']; ?></span>

                        </div>

                    </div><!-- classNameBlock -->

                    <div class="skillBlock">

                        <p><?php print $lang['empire']; ?>: <b><?php print emire_name(get_player_empire($sura['account_id'])); ?></b></p>

                        <p><?php print $lang['level']; ?>: <b><?php print $sura['level']; ?></b></p>

                        <p>TIMP: <b><?php print number_format($sura['playtime'], 0, '', '.'); ?></b></p>

                    </div><!-- skillBlock -->

                </div>

            </div> 

        </div>

        <div class="slider-arrow">

            <div class="swiper-button-next"></div>

            <div class="swiper-button-prev"></div>

        </div>

        <div class="swiper-container gallery-thumbs">

            <div class="swiper-wrapper">

			    <div class="swiper-slide elf"><span><img src="<?php print $site_url; ?>templates/battleforlorencia/img/warrior-ava.png" alt=""></span></div>               
			   
			    <div class="swiper-slide mg"><span><img src="<?php print $site_url; ?>templates/battleforlorencia/img/shaman-ava.png" alt=""></span></div>

                <div class="swiper-slide gl"><span><img src="<?php print $site_url; ?>templates/battleforlorencia/img/ninja-ava.png" alt=""></span></div>
              
                <div class="swiper-slide sm"><span><img src="<?php print $site_url; ?>templates/battleforlorencia/img/sura-ava.png" alt=""></span></div>

			</div>

        </div>

    </div><!-- slider -->

    <div class="gameCenterBlock">

        <h1>GAME <span>CENTER</span></h1>

        <div class="gameBlocks flex-c-c">

            <div class="gameBlock strategy">

                <p class="game-title_1"><?php print $lang['download']; ?></p>

                <a href="<?php print $site_url; ?>download">GO</a>

            </div>

            <div class="gameBlock system">

                <p class="game-title_1"><?php print $lang['item-shop']; ?></p>

                <a href="<?php print $shop_url; ?>" target="_blank">GO</a>

            </div>

            <div class="gameBlock events">

                <p class="game-title_1"><?php print $lang['ranking']; ?></p>

                <a href="<?php print $site_url; ?>ranking/players">GO</a>

            </div>

            <div class="gameBlock pets">

                <p class="game-title_1"><?php print $lang['user-panel']; ?></p>

                <a href="<?php print $site_url; ?>user/administration">GO</a>

            </div>

            <div class="gameBlock guides">

                <p class="game-title_1">Forum</p>

                <a href="<?php print $forum; ?>" target="_blank">GO</a>

            </div>

        </div>

    </div><!-- gameCenterBlock -->

</div><!-- infoBlockHome -->

<?php } else { ?><main class="content">

   <div class="pageTitle" id="pageTitle">

      <h1></h1>

   </div>

   <div class="row">

      <div class="col-xs-8">

		<?php include 'pages/'.$page.'.php'; ?>

      </div>

      <div class="col-xs-4">

         <div class="panel panel-sidebar">

			<?php if($offline || !$database->is_loggedin()) { ?>

            <div class="panel-heading">

               <h3 class="panel-title">

					<?php print $lang['user-panel']; ?>

					<a href="<?php print $site_url; ?>users/lost" class="btn btn-primary btn-xs pull-right"><?php print $lang['forget-password']; ?></a>

			   </h3>

            </div>

            <div class="panel-body">

				<form role="form" method="post" action="<?php print $site_url; ?>users/login" accept-charset="UTF-8" id="login-nav">

					<div class="form-group">

						<input type="text" name="username" pattern=".{5,64}" maxlength="64" class="form-control" placeholder="<?php print $lang['user-name-or-email']; ?>" autocomplete="off" <?php if($offline) print 'disabled'; else print 'required'; ?>>

					</div>

					<div class="form-group">

						<input type="password" name="password" pattern=".{5,16}" maxlength="16" class="form-control" placeholder="<?php print $lang['password']; ?>" <?php if($offline) print 'disabled'; else print 'required'; ?>>

					</div>

					<button type="submit" name="webengineLogin_submit" value="submit" class="btn btn-primary"><?php print $lang['login']; ?></button>

				</form>

            </div>

			<?php } else { ?>

            <div class="panel-heading">

               <h3 class="panel-title">

					<?php print $lang['user-panel']; ?>

					<?php if($web_admin) { ?>

					<a href="<?php print $site_url; ?>admin" class="btn btn-primary btn-xs pull-right"><?php print $lang['administration']; ?></a>

					<?php } ?>

			   </h3>

            </div>

            <div class="panel-body">

			<div class="list-group">

				<?php if($web_admin) { ?>

				<a href="<?php print $site_url; ?>admin" class="list-group-item list-group-item-action"><?php print $lang['administration']; ?><?php if($web_admin>=9 && checkUpdate(officialVersion())) print ' <span class="tag tag-info tag-pill float-xs-right">'.$lang['update-available'].'</span>'; ?></a>

				<?php 

					if($web_admin>=$jsondataPrivileges['donate']) {

						$count_donations = count(get_donations());

						if($count_donations)

						{

				?>	

				<a href="<?php print $site_url; ?>admin/donatelist" class="list-group-item list-group-item-action"><?php print $lang['donatelist']; ?> <span class="tag tag-info tag-pill float-xs-right"><?php print $count_donations.' '.$lang['new-donations']; ?> </span></a>

				<?php

						}

					}

				}

				?>

				<a href="<?php print $site_url; ?>user/administration" class="list-group-item list-group-item-action"><?php print $lang['account-data']; ?></a>

				<a href="<?php print $site_url; ?>user/characters" class="list-group-item list-group-item-action"><?php print $lang['chars-list']; ?></a>

				<a href="<?php print $site_url; ?>user/redeem" class="list-group-item list-group-item-action"><?php print $lang['redeem-codes']; ?></a>

				<?php if($jsondataFunctions['active-referrals']) { ?>

				<a href="<?php print $site_url; ?>user/referrals" class="list-group-item list-group-item-action"><?php print $lang['referrals']; ?></a>

				<?php } if($item_shop!="") { ?>

				<a target='_blank' href="<?php print $item_shop; ?>" class="list-group-item list-group-item-action"><?php print $lang['item-shop']; ?></a>

				<?php }

					$vote4coins = file_get_contents('include/db/vote4coins.json');

					$vote4coins = json_decode($vote4coins, true);

					

					if(count($vote4coins))

						print '<a href="'.$site_url.'user/vote4coins" class="list-group-item list-group-item-action">Vote4Coins</a>';

					

					$donate = file_get_contents('include/db/donate.json');

					$donate = json_decode($donate, true);

					

					if(count($donate))

						print '<a href="'.$site_url.'user/donate" class="list-group-item list-group-item-action">'.$lang['donate'].'</a>';

				?>

				<a href="<?php print $site_url; ?>users/logout" class="list-group-item list-group-item-action list-group-item-danger"><?php print $lang['logout']; ?></a>

			</div>

			

			</div>

			<?php } ?>

         </div>

		 <?php if(!$offline && $statistics) { ?>

         <div class="panel panel-sidebar">

            <div class="panel-heading">

               <h3 class="panel-title"><?php print $lang['statistics']; ?></h3>

            </div>

            <div class="panel-body">

               <table class="table">

					<?php

					foreach($jsondataFunctions as $key => $status)

						if(!in_array($key, array('active-registrations', 'players-debug', 'active-referrals')) && $status)

						{

					?>

						<tr>

							<td><?php print $lang[$key]; ?>:</td>

							<td style="<?php if($key=='players-online') print 'color:#00aa00;'; ?>font-weight:bold;"><?php print number_format(getStatistics($key), 0, '', '.'); ?></td>

						</tr>

					<?php } ?>

               </table>

            </div>

         </div>

		 <?php } ?>

         <div class="panel panel-sidebar">

            <div class="panel-heading">

               <h3 class="panel-title"><?php print $lang['ranking'].' - '.$lang['players']; ?><a href="<?php print $site_url; ?>ranking/players" class="btn btn-primary btn-xs pull-right" style="text-align:center;width:22px;">+</a></h3>

            </div>

            <div class="panel-body">

               <table class="table table-condensed">

                  <tr>

                     <th></th>

                     <th><?php print $lang['name']; ?></th>

                     <th class="text-center"><?php print $lang['level']; ?></th>

                  </tr>

				<?php

					if(!$offline) {

					$top = array();

					$top = top10players();

					

					foreach($top as $player)

					{

				?>

			   <tr>

				  <td><img src="<?php print $site_url; ?>images/job/<?php print $player['job']; ?>.png" width="20px" height="auto" style="-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%;-khtml-border-radius: 50%;"/></td>

				  <td><a href="<?php print $site_url; ?>ranking/players"><?php print $player['name']; ?></a></td>

				  <td class="text-center"><?php print $player['level']; ?></td>

			   </tr>

				<?php }

					}

				?>

               </table>

            </div>

         </div>


      </div>

   </div>

</main>

<!-- .content -->

<?php } ?>

	<footer class="footer">

		<div class="f-logo">

			<a href="<?php print $site_url; ?>"><img src="<?php print $site_url; ?>templates/battleforlorencia/img/logo.png" alt=""></a>

		</div>

		<div class="copyright">

			&copy; Copyright <?php

										$copyright_year = date('Y');

										if($copyright_year > 2020)

											print '2020 - '.$copyright_year;

										else print $copyright_year;

											print ' '.$site_title;

								?></div>

		<div class="copy-text">

			Va asteptam cu drag pe server !<br />

		</div>

	</footer><!-- .footer -->

	<div id="overlay"></div>

	</div><!-- .wrapper -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<?php include 'include/functions/footer.php'; ?>

	<script src="<?php print $site_url; ?>templates/battleforlorencia/js/swiper.min.js"></script>

	<script src="<?php print $site_url; ?>templates/battleforlorencia/js/main.js"></script>

	<script src="<?php print $site_url; ?>templates/battleforlorencia/js/mainjs.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script>

	$(document).ready(function() {

		if($('.pre-social').length) {

			$('.page-hd').hide();

			$('#pageTitle').html('<h1>'+$('.pre-social').text()+'</h1>');

		}

	});

	</script>


</html>