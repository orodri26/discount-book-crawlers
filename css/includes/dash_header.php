<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>
	<section>
		<div class="mast">
			<h1>Book Crawlers</h1>
			<nav>
				<ul class="clearfix">
					<li><a href="add_books.php" <?php curNav('add_books.php') ?>>Add Books</a></li>
					<li><a href="view_books.php" <?php curNav('view_books.php') ?>>View Books</a></li>
					<li><a href="view_category.php" <?php curNav('view_category.php') ?>>View Categories</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</nav>
		</div>
	</section>