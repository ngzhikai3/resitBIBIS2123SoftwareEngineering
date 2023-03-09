<?php

include '../header.php';
$result = mysqli_query($dbcon, "SELECT * FROM student") or die(mysqli_error($dbcon));
//$user_row = mysqli_fetch_array($result);

$grpsql = mysqli_query($dbcon, "SELECT * FROM grp ") or die(mysqli_error($dbcon));
//;

?>


<!-- Page Container -->
<div class="w3-container " style="max-width:1400px;margin-top:80px">
	<!-- The Grid -->
	<div class="w3-row">
		<!-- Left Column -->
		<div class="container-fluid">
			<div class="row d-flex flex-row-reverse">
				<div class="col-md-4 col-lg-3">
					<?php
					include 'coord-nav.php';
					?>
					<!-- End Left Column -->
				</div>

				<!-- Middle Column -->
				<div class="col-md-8 col-lg-9">

					<div id="main">


						<div class="w3-row-padding w3-container">

							<div class="w3-card-2">
								<table class="w3-table  w3-hoverable">
									<thead>
										<tr class="bg-info">
											<th>Group No.</th>
											<th>FYP Proposal</th>
											<th>Thesis Drafts</th>
											<th>Proposal Presentation Slides</th>
											<th>Poster</th>
											<th>Final Report</th>

										</tr>
									</thead>
									<?php

									while ($group = mysqli_fetch_array($grpsql)) {

										$groupNo = $group['grpNo'];


										$repsql = "SELECT * FROM progressreport WHERE projectId = (SELECT projectId FROM project WHERE grpNo = '$groupNo')";
										$reportsql = mysqli_query($dbcon, $repsql) or die(mysqli_error($dbcon));


										while ($report = mysqli_fetch_array($reportsql)) {

											$report1file = $report['review'];
											$sem1_progress = $report['sem1_progress'];
											$sem1_final = $report['sem1_final'];
											$sem2_progress = $report['sem2_progress'];
											$sem2_final = $report['sem2_final'];
									?>
											<tr>
												<td><?php echo $groupNo; ?></td>
												<td>
													<?php
													if (!empty($report1file)) {
														echo '<a  href="' . $report1file . '"> View Report </a>';
													} else {
														echo 'No Submission';
													}
													?>
												</td>

												<td>
													<?php
													if (!empty($sem1_progress)) {
														echo '<a  href="' . $sem1_progress . '"> View Report </a>';
													} else {
														echo 'No Submission';
													}
													?>

												</td>
												<td>
													<?php
													if (!empty($sem1_final)) {
														echo '<a  href="' . $sem1_final . '"> View Report </a>';
													} else {
														echo 'No Submission';
													}
													?>

												</td>
												<td><?php
													if (!empty($sem2_progress)) {
														echo '<a  href="' . $sem2_progress . '"> View Report </a>';
													} else {
														echo 'No Submission';
													}
													?>
												</td>
												<td><?php if (!empty($sem2_final)) {
														echo '<a  href="' . $sem2_final . '"> View Report </a>';
													} else {
														echo 'No Submission';
													}
												} //End while for Reports
											} //End while for grpous
													?>

												</td>
											</tr>
								</table>

							</div>

							<br />
						</div>

					</div> <!-- End Middle Main -->
					<!-- End Middle Column -->
				</div>


				<!-- End Grid -->
			</div>

			<!-- End Page Container -->
		</div>
		<br>

		<!-- Footer -->
		<?php
		include '../footer.php';
		?>