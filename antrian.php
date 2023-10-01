<?php
session_start();
ob_start();
    include "koneksi.php";
	$tampiluser    =mysqli_query($conn, "SELECT * FROM tbl_user WHERE codename='$_SESSION[codename]'");
    $user    =mysqli_fetch_array($tampiluser);

    $menu = new menu($connection);
?>

<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/angular.min.js"></script>

    <script type="text/javascript">
		    var auto_refresh = setInterval(
		    function () {
					window.location = './antrian.php';
		      //  $('#load_content').load('tampil.php').fadeIn("slow");
		    }, 5000); // refresh setiap 10000 milliseconds

		</script>
    <title>MY COFFE</title>
    <style>
		body{
            font-family: 'PT Sans', sans-serif;
			background-color: #FFF8EA;
        }
	</style>
</head>
<body>
    <div>
        <div class="bg p-2 mb-5 text text-left" style="background-color: #967E76;">
            <div class="d-flex flex-wrap justify-content-between">
                <img src="img/logomyco1.png" alt="" style="width: 170px; height: 140px;">
                <div class="text-center mx-auto p-3">
                    <h5 style="font-size: 28px; font-color: #FFFF"><i>LIST ANTRIAN PESANAN</i></h5>
                    <script>function display_ct7() {
					var x = new Date()
					var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
					hours = x.getHours( ) % 12;
					hours = hours ? hours : 12;
					hours=hours.toString().length==1? 0+hours.toString() : hours;
					
					var minutes=x.getMinutes().toString()
					minutes=minutes.length==1 ? 0+minutes : minutes;
					
					var seconds=x.getSeconds().toString()
					seconds=seconds.length==1 ? 0+seconds : seconds;
					
					var month=(x.getMonth() +1).toString();
					month=month.length==1 ? 0+month : month;
					
					var dt=x.getDate().toString();
					dt=dt.length==1 ? 0+dt : dt;
					
					var x1=month + "/" + dt + "/" + x.getFullYear(); 
					x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
					document.getElementById('ct7').innerHTML = x1;
					display_c7();
					 }
					 function display_c7(){
					var refresh=1000; // Refresh rate in milli seconds
					mytime=setTimeout('display_ct7()',refresh)
					}
					display_c7()
				</script>
					<span id='ct7' class="text-dark d-block"></span>
                    <a href="pesan.php" style="text-decoration: none;">
                        <button class="btn btn-secondary  text-center" style="height: 40px; margin-top:30px;">Back</button>
                    </a>
                </div>
                <div class="text-center p-3">
                    <a href="logout.php" style="text-decoration: none;">
                        <button class="btn btn-danger   text-center" style="font-size: 11pt;">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </div>
            </div>
        </div>
        
        <div>
            <div class="bg p-4 mb-5 mt-2 text text-left   border border-light" style="margin: auto;">
            <div class="row">
					    <div class="thumbnail">
					      <div class="caption justify-content-center">
					        	<table class="table table-striped mx-auto w-75 text-center" style="font-size: 20px;">
											<tr>
												<td class=" "><b>#</b></td>
												<td class=" "><b>Nama</b></td>
                                                <td class=" "><b>Meja</b></td>
                                                <td class=" "><b>Status</b></td>
											</tr>
                                            <?php
                                                $antrian = $menu->antrian();
                                                while($row = $antrian->fetch_array()){
                                            ?>
											<tr class=" ">
													<td><?= $row['no_antri']?></td>
													<td><?= $row['nama']?></td>
                                                    <td><?= $row['meja']?></td>
                                                    <td><?= $row['status']?></td>
											</tr>
                                            <?php } ?>
										</table>
					      </div>
					    </div>
					  </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>