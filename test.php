<html>
		<head>
			<script>
					function goLastMonth(month, year){
								if (month == 1) {
									--year;
									month = 12;
								}
								document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+(month-1)+"&year="+year;
					}

					function goNextMonth(month, year){
								if (month == 12) {
									++year;
									month = 0;
								}
								document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+(month+1)+"&year="+year;
					}



			</script>	




		</head>

		<body>
				<?php
				if (isset($_GET['day'])){
				$day = $_GET['day'];
				}else{ 
				$day = date("j");
				}
				if (isset($_GET['month'])){
				$month = $_GET['month'];
				}else{
				$month = date("n");	
				}				
				if (isset($_GET['year'])){
				$year = $_GET['year'];
				}else{
				$year = date("Y");	
				}

				// calender variable //				
				$currentTimeStamp = strtotime("$year-$month-$day");
				$monthName = date("F", $currentTimeStamp);
				$numDays = date("t", $currentTimeStamp);
				$counter = 0;

				
				?>	

				<table border='1'>
					<tr>
						<td><input style='width:50px;' type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
						<td colspan='5' align='center'> <?php echo $monthName.", ".$year; ?></td>
						<td><input style='width:50px;' type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)"></td>
						<td></td>						
					</tr>
					<tr>
						<td width='50px' align='center'>D</td>
						<td width='50px' align='center'>L</td>
						<td width='50px' align='center'>M</td>
						<td width='50px' align='center'>M</td>
						<td width='50px' align='center'>J</td>
						<td width='50px' align='center'>V</td>
						<td width='50px' align='center'>S</td>
					</tr>
					<?php 
						echo "<tr>";
							for($i = 1; $i < $numDays+1; $i++, $counter++) { 
									$timeStamp = strtotime("$year-$month-$i");
									if ($i == 1) {
										$firstDay = date("w", $timeStamp);
										for ($j = 0; $j < $firstDay; $j++, $counter++) {
												// blank space //
												echo "<td>&nbsp;</td>";
										}	
									}
									if ($counter % 7 == 0){
										echo "</tr><tr>";
									}
										echo "<td align='center'>".$i."</td>";
							}
						echo "</tr>";
					?>

				</table>

		</body>

</html>﻿