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
    <title>MY COFFE</title>
    <style>
		body{
            font-family: 'PT Sans', sans-serif;
			background-color: #FFF8EA;
        }

		.rainbow{
		animation: rainbow 2.5s linear;
		animation-iteration-count: infinite;
        }

        @keyframes rainbow{
		100%,0%{
			color: rgb(255,0,0);
		}
		8%{
			color: rgb(255,127,0);
		}
		16%{
			color: rgb(255,255,0);
		}
		25%{
			color: rgb(127,255,0);
		}
		33%{
			color: rgb(0,255,0);
		}
		41%{
			color: rgb(0,255,127);
		}
		50%{
			color: rgb(0,255,255);
		}
		58%{
			color: rgb(0,127,255);
		}
		66%{
			color: rgb(0,0,255);
		}
		75%{
			color: rgb(127,0,255);
		}
		83%{
			color: rgb(255,0,255);
		}
		91%{
			color: rgb(255,0,127);
		}
    }

	</style>
</head>
<body>
    <div class="p-4 mb-5 text text-left" style="background-color: #967E76;">
		    <div class="d-flex flex-wrap justify-content-between">
                <img src="img/logomyco1.png" alt="" style="width: 200px; height:px;">
                <div class="text-center mx-auto p-3">
					<h2 class=" text-dark">Selamat Datang, Chef <?= $user['username'];?></h2>
                    <h4 class="text-dark"><i>"Makanan bukan hanya masakan yang akan berakhir di perutmu, melainkan sebuah petualangan yang patut dinikmati dan dihargai." </i></h4>
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
					<span id='ct7' class="text-dark  d-block mt-4"></span>
                </div>
                <div class="text-center p-3">
                    <a href="logout.php" style="text-decoration: none;">
                        <button class="btn btn-danger  text-center" style="font-size:13px">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </div>
            </div>
        </div>
        
        <div>
            <div class="bg p-4 mb-5 mt-2 text text-left   border border-light" style="margin: auto;">
            <div class="row">
			<div class="h4 pb-2 mb-5 text-dark border-bottom border-dark w-75 mx-auto">
            <h3>List Pesanan :</h3>
        	</div>
					<?php
                    $no=1;
					$tampil = $menu->selesai();
					while($row = $tampil->fetch_array()){?>
					<form class="d-flex flex-wrap justify-content-evenly" action="aksi.php?aksi=update" method="post">
					  <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <div class="caption justify-content-center">
					        <h4 class="text-center"><?php echo $no;?></h4>
							<table class="table table-striped w-75 mx-auto">
											<tr class=" ">
												<td class=" "><b>Menu</b></td>
												<td class=" "><b>Qty</b></td>
											</tr>
											<?php
												$tampilmenu = $menu->tampilmenu();
												while ($mnu = $tampilmenu->fetch_array()){
														$nama = str_replace(' ', '_', $mnu['nama']);
													if($row[$nama]){?>
											<tr class=" ">
														<td class=" "><?= $mnu['nama']?></td>
														<td class=" "><?php echo $row[$nama];?></td>
													<?php	}}?>
											</tr>

											<tr class=" ">
												<td>Waiting</td>
												<td>
													<a href="function.php?aksi=update&no=<?php echo $row['id_transaksi']; ?>">Selesai</a>
												</td>
											</tr>
										</table>
					      </div>
					    </div>
					  </div>
						<?php $no++; } ?>
					</form>
				</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>