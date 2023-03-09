<?php
include '../header.php';
$supId = $_SESSION['id'];

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
			include 'sup-nav.php';
			?>
			<!-- End Left Column -->
		</div>

		<!-- Middle Column -->
		<div class="col-md-8 col-lg-9">

			<div id="main">

				<table class="w3-table w3-hoverable">
					<thead>
						<tr class="bg-info">
							<th>Group No.</th>
							<th>Members</th>
							<th>Title</th>

						</tr>
					</thead>
					<tr>


						<?php
						$grpsql = mysqli_query($dbcon, "SELECT * FROM grp WHERE empId = '$supId'") or die(mysqli_error($dbcon));

						while ($group = mysqli_fetch_array($grpsql)) {
							$groupNo = $group['grpNo'];
							//var_dump($grpsql);
						?>

							<td> <?php echo $groupNo; ?> </td>
							<td>
								<?php
								//$group_rows = mysqli_num_rows($grpsql);

								$membersql = mysqli_query($dbcon, "SELECT regNo, fName, mName, lName FROM student WHERE regNo IN (SELECT regNo FROM members where grpNo = '$groupNo')") or die(mysqli_error($dbcon));

								$rows = 1;
								while ($rows <= mysqli_num_rows($membersql)) {
									//echo "This is ".$rows. "<br />";
									$members = mysqli_fetch_assoc($membersql);
									//var_dump($members);
									$memberNo = $members['regNo'];

									$member = mysqli_query($dbcon, "SELECT * FROM student WHERE regNo = '$memberNo'") or die(mysqli_error($dbcon));
									$member_row = mysqli_fetch_array($member);
									$memberName = $member_row['lName'] . ", " . $member_row['mName'] . " " . $member_row['fName'];
									echo $memberName . "<br />";

									//var_dump($memberName);

									$rows++;
								}

								/*$supId =  "SELECT * FROM `supervisor` WHERE empId = (SELECT empId FROM grp WHERE grpNo = '$groupNo')";
		    $supIdsql = mysqli_query($dbcon,$supId) or die(mysqli_error($dbcon));
		    $sup_row = mysqli_fetch_array($supIdsql);

		    $supervisor = $sup_row['fName']." ".$sup_row['lName'];
		    //var_dump($supervisor);*/

								$projectsql = mysqli_query($dbcon, "SELECT * FROM project WHERE grpNo = '$groupNo'") or die(mysqli_error($dbcon));
								$project_row = mysqli_fetch_array($projectsql);

								if ($project_row !== null) {
									$title = $project_row['projectTitle'];
									$project = $project_row['projectId'];
									echo "</td>";
									echo "<td><a href='../functions/projectdetails.php?id=$project'>" . $title . "</a></td>";
								} else {
									echo "</td>";
									echo "<td>have'nt sumbit</td>";
								}

								//var_dump($title);

								?>

					</tr>
				<?php
							//$group_rows++;
						}

				?>
				</table>

			</div>
		</div>
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