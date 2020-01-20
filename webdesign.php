<?php include ("db_connnection.php"); ?>
<?php include 'incfiles/pagetop.php'; ?>  

<!-- About -->
<section class='banner-dark'>
	<div class='container'>
		<div class='row py-5'>
			<div class='col-md-2 d-none d-md-flex align-items-center justify-content-center'>
				<div class=''>
					<!--<img src='/images/myimage.jpg' alt='My Image' class='rounded-circle img-fluid m-auto' />-->
					<i class="fas fa-edit fa-3x"></i>
				</div>
			</div>
			<div class='col-md-10'>
				<h1 class='h2'>Website Design</h1>
				<p class='mb-0'>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
	</div>
</section>

<!-- display designs -->
<section class=''>
	<div class='container-fluid'>
		<div class='row py-5'>
<?php
		$sitequery = mysqli_query ($link, "SELECT * FROM webdesign_main WHERE wd_live=1 ORDER BY wd_order");
		//wd_id, wd_sitename, wd_type, wd_description, wd_live, wd_order FROM webdesign_main, wd_galleryname
		if(mysqli_num_rows($sitequery) > 0){
			while ( $row = mysqli_fetch_array($sitequery) ) {
			
				echo "<div class='col-md-4 webdesign py-3'>";
					echo "<a href='' type='button' class='text-nodecoration w-100' data-toggle='modal' data-target='#".$row['wd_galleryname']."'>";
					
						echo "<div class='mainimage'>";
						
					$maindesignquery = mysqli_query ($link, "SELECT * FROM webdesign_images WHERE wdi_live=1 AND wdi_linkid='".$row['wd_id']."' and wdi_main=1 LIMIT 1");
						//wdi_id, wdi_image, wdi_alt, wdi_linkid, wdi_order, wdi_live, wdi_main, wdi_mobile
					if(mysqli_num_rows($maindesignquery) > 0){
						while ( $des = mysqli_fetch_array($maindesignquery) ) {
							echo "<img src='/img/webdesign/".$des['wdi_image']."' class='img-fluid w-100'>";
						}
					}
					
						echo "<div class='cta-overlay d-flex align-items-center justify-content-center'>";
							echo "<div class='w-100'>";
								echo "<p class='text-center text-white h3'>".$row['wd_sitename']."</p>";
								if (!empty($row['wd_description'])) {
									echo "<p class='text-center text-white text-truncate'>".$row['wd_description']."</p>";
								}
							echo "</div>";
						echo "</div>";
						
						echo "</div>";
							
					echo "</a>";
				echo "</div>";
			
			}
		}

?>		
		</div>
	</div>
</section>

<!-- design modals -->
<?php
$sitequery = mysqli_query ($link, "SELECT * FROM webdesign_main WHERE wd_live=1");
//wd_id, wd_sitename, wd_type, wd_description, wd_live, wd_order FROM webdesign_main, wd_galleryname
if(mysqli_num_rows($sitequery) > 0){
	while ( $row = mysqli_fetch_array($sitequery) ) {
	
		echo "<div class='modal web' id='".$row['wd_galleryname']."'>";
			echo "<div class='modal-dialog'>";
				echo "<div class='modal-content'>";
				
					echo "<div class='modal-header banner-dark p-5'>";
						echo "<div class=''>";
							echo "<div class='row pb-3'>";
								echo "<div class='col-6'>";
									echo "<h3 class='modal-title text-white'>".$row['wd_sitename']."</h3>";
								echo "</div>";
								echo "<div class='col-6'>";
									echo "<button type='button' class='text-white close' data-dismiss='modal'>&times;</button>";
								echo "</div>";
							echo "</div>";
							echo "<div class='row'>";
								echo "<div class='col-12'>";
									echo "<p class='text-white'>".$row['wd_description']."</p>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
									
					//<!-- Modal body -->
					echo "<div class='modal-body p-5'>";
						
						//desktop
						$maindesignquery = mysqli_query ($link, "SELECT * FROM webdesign_images WHERE wdi_live=1 AND wdi_linkid='".$row['wd_id']."' AND wdi_mobile=0");
						//wdi_id, wdi_image, wdi_alt, wdi_linkid, wdi_order, wdi_live, wdi_main, wdi_mobile
						if(mysqli_num_rows($maindesignquery) > 0){
						echo "<div class='row'>";
							while ( $des = mysqli_fetch_array($maindesignquery) ) {
								echo "<div class='col-md-12'>";
									echo "<p class=''>".$des['wdi_alt']."</p>";
									//echo "<div class='img-zoom-hover'>";
										echo "<img src='/img/webdesign/".$des['wdi_image']."' alt='".$des['wdi_alt']."' class='img-fluid w-100 shadow'>";
									//echo "</div>";
									
									echo "<div class='d-flex justify-content-center py-5'>";
										echo "<div class='border-bottom w-75'></div>";
									echo "</div>";
								
								echo "</div>";
							}
						echo "</div>";
						}
						
						//mobile
						$maindesignquery = mysqli_query ($link, "SELECT * FROM webdesign_images WHERE wdi_live=1 AND wdi_linkid='".$row['wd_id']."' AND wdi_mobile=1");
						//wdi_id, wdi_image, wdi_alt, wdi_linkid, wdi_order, wdi_live, wdi_main, wdi_mobile
						if(mysqli_num_rows($maindesignquery) > 0){
						echo "<div class='row'>";
							while ( $des = mysqli_fetch_array($maindesignquery) ) {
								echo "<div class='col-md-6'>";
									echo "<p class=''>".$des['wdi_alt']."</p>";
									echo "<img src='/img/webdesign/".$des['wdi_image']."' alt='".$des['wdi_alt']."' class='img-fluid w-100 shadow'>";
								
									echo "<div class='d-flex justify-content-center py-5'>";
										echo "<div class='border-bottom w-75'></div>";
									echo "</div>";
								
								echo "</div>";
							}
						echo "</div>";
						}
					echo "</div>";
					
				echo "</div>";
			echo "</div>";
		echo "</div>";			
	
	}
}

?>	

<?php include 'incfiles/pagebottom.php'; ?>