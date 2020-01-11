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
				<h1 class='h2'>Visual Arts</h1>
				<p class='mb-0'>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
	</div>
</section>

<!--  -->
<section class=''>
	<div class='container'>

		<div class='row align-items-center justify-content-center py-5' id="myBtnContainer">
			<button class="btn active" onclick="filterSelection('all')"> Show all</button>
<?php
			$sectionquery = mysqli_query ($link, "SELECT * FROM visualarts_sections WHERE va_live=1 ORDER BY va_order");
			//va_id, va_name, va_idname, va_live, va_order
			if(mysqli_num_rows($sectionquery) > 0){
				while ( $row = mysqli_fetch_array($sectionquery) ) {
					
					echo "<button class='btn' onclick='filterSelection(\"".$row['va_id']."\")'>".$row['va_name']."</button>";
				
				}
			}
?>
			
		</div>
<?php
		$designquery = mysqli_query ($link, "SELECT * FROM visualarts_images WHERE vai_live=1 ORDER BY vai_order");
		//vai_id, vai_image, vai_name, vai_desc, vai_live, vai_linkid1, vai_linkid2, vai_linkid3, vai_order
		if(mysqli_num_rows($designquery) > 0){
			echo "<div class='row pb-5'>";
				while ( $des = mysqli_fetch_array($designquery) ) {
					
					if(!EMPTY($des['vai_linkid1'])) {$class1 = " ".$des['vai_linkid1']."";} else {$class1 = "";}
					if(!EMPTY($des['vai_linkid2'])) {$class2 = " ".$des['vai_linkid2']."";} else {$class2 = "";}
					if(!EMPTY($des['vai_linkid3'])) {$class3 = " ".$des['vai_linkid3']."";} else {$class3 = "";}
					
					//echo "<div class='col-md-3 py-3 h-100'>";
						echo "<div class='filterDiv ".$class1."".$class2."".$class3."'><img src='img/visualarts/".$des['vai_image']."' alt='".$des['vai_name']."' class='img-fluid'/></div>";
					//echo "</div>";
				}
			echo "</div>";
		}
?>

	</div>
</section>

</script>

<?php include 'incfiles/pagebottom.php'; ?>