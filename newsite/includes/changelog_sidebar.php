		<ul class="left_bar wide_bar">

			<li><div id="search_holder"><div id="artificial_searchbox"><input type="text" placeholder="Search" /></div></div></li>

			<li><div class="header">Park Changelog<div><img src="images/arrow.png" /></div></div></li>
			<li><a href="/" <?=($selected == 1) ? "class='selected'" : ""?> >Newsfeed</a></li>
			<li><a href="#" <?=($selected == 2) ? "class='selected'" : ""?> >Hot Topics</a></li>
			<li><a href="#" <?=($selected == 3) ? "class='selected'" : ""?> >All Keywords</a></li>
			<li><a href="#" <?=($selected == 4) ? "class='selected'" : ""?> >Advanced Search</a></li>

			<li><div class="header">Categories<div><img src="images/arrow.png" /></div></div></li>
			<li><a href="coasters.php" <?=($selected == 5) ? "class='selected'" : ""?> >Roller Coasters</a></li>
			<li><a href="rides.php" <?=($selected == 6) ? "class='selected'" : ""?> >Rides &amp; Attractions</a></li>
			<li><a href="food.php" <?=($selected == 7) ? "class='selected'" : ""?> >Food &amp; Dining</a></li>
			<li><a href="#" <?=($selected == 8) ? "class='selected'" : ""?> >Shows</a></li>
			
			<li><div class="header">Recent Stories<div><img src="images/arrow.png" /></div></div></li>
			<?php
				$rs = new RecentStories(5);
				HTMLoutput::recentStories($rs);
			?>

		</ul>