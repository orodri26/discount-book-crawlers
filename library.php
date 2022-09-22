<?php
     
     session_start();

     $page_title="EDIT CATEGORY PAGE";

     include 'includes/db.php';

     include 'includes/functions.php';

     include 'includes/dash_header.php';

     $error = [];

    //  authentication($_SESSION);
?>

	<div class="wrapper">
			<div id="stream">
				<table id="tab">
					<thead>
						<tr>
						<th>BOOK TITLE</th>
							<th>CATEGORY NAME</th>
							<th>BOOK AUTHOR</th>
							<th>PRICE</th>
							<th>Flag</th>							
							<th>BOOK IMAGE</th>
						</tr>
					</thead>
					<tbody>
						<?php
						viewUserBooks($conn);
						?>
	          		</tbody>
				</table>
			</div>
		</div>



<?php

     include 'includes/footer.php';

?>