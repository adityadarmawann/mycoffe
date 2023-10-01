<?php
session_start();
ob_start();
include "koneksi.php";

$menu = new menu($connection);

	$tampiluser    =mysqli_query($conn, "SELECT * FROM tbl_user WHERE codename='$_SESSION[codename]'");
    $user    =mysqli_fetch_array($tampiluser);

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
            padding: 0;
            margin: 0;
            font-family: 'PT Sans', sans-serif;
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
    <div>
    <style>
        body {
            background-color: #EEE3CB;
        }
    </style>
    <div class="p-4 mb-5 text text-left" style="background-color: #967E76;">
            <div class="d-flex flex-wrap justify-content-between">
                <img src="img/logomyco1.png" alt="" style="width: 200px; height:150px;">
                <div class="text-center mx-auto p-3">
                    <h2 class="text-dark">Selamat Datang, Kasir <?= $user['username'];?></h2>
                    <h4 class="text-dark"><i>"Satu - satunya cara untuk melakukan pekerjaan hebat yaitu dengan mencintai apa yang dikerjakan."</i></h4>
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
					<p id='ct7' class="text-dark d-block"></p>

                    <a class="mt-3" href="antrian.php" style="text-decoration: none;">
                        <button class="btn btn-secondary   text-center" style="height: 40px;">Antrian</button>
                    </a>
                </div>
                <div class="text-center p-3 d-flex flex-column mb-3">
                    <a href="logout.php" style="text-decoration: none;">
                        <button class="btn btn-danger   text-center" style="font-size:13px;">Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                    </a>
                </div>
            </div>
        </div>

        <div class="h4 pb-2 mb-4 text-dark border-bottom border-dark w-75 mx-auto">
            <h3>Pesanan</h3>
        </div>           
            <?php 
            ?>
            <form action="function.php?aksi=insert" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="w-50 text-center mx-auto mb-5">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>
                                    
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="meja" id="meja" placeholder="Nomor Meja" required>
                        </div>
                    </div>
                <div>
                    <p class="text-center text-danger">Note : Bila ada menu yang tidak muncul, artinya stok habis</p>
                </div>
                <h2 class="text-center">Makanan</h2>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php
                        $tampilmkn = $menu->tampilmkn();
                        while($mkn = $tampilmkn->fetch_array()){?>
                        <div>
                            <div class="m-4 border border-black rounded-4">
                                <div class="d-flex m-2">
                                    <div class="caption mx-4">
                                        <h4 style="margin-bottom: 1px;"><?php echo $mkn['nama'];?></h4>
                                        <p style="margin-bottom: 1px;">Stok : <?php echo $mkn['stok'];?></p>
                                            <p>Rp. <?php echo $mkn['harga'];?></p>
                                                    <input min="0" type="number" name="<?php echo $mkn['id_menu'];?>" class="qty" data-qty="<?=$mkn['id_menu']?>" ng-model="<?php echo $mkn['id_menu'];?>" ng-init="<?php echo $mkn['id_menu'];?>=0" require/>
                                    </div>
                                    <img src="img/<?php echo $mkn['img'];?>" alt="..." style="width: 120px; height: 120px; border-radius:20%;">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                
                    <br><br>

                    <h2 class="text-center">Minuman</h2>
                    <div class="d-flex flex-wrap justify-content-center">
                        <?php
                        $tampilmnm = $menu->tampilmnm();
                        while($mnm = $tampilmnm->fetch_array()){?>
                        <div>
                            <div class="m-4 border border-black rounded-4">
                                <div class="d-flex m-2">
                                    <div class="caption mx-4">
                                        <h4 style="margin-bottom: 1px;"><?php echo $mnm['nama'];?></h4>
                                        <p style="margin-bottom: 1px;">Stok : <?php echo $mnm['stok'];?></p>
                                            <p>Rp. <?php echo $mnm['harga'];?></p>
                                                    <input min="0" type="number" name="<?php echo $mnm['id_menu'];?>" class="qty" data-qty="<?=$mnm['id_menu']?>" ng-model="<?php echo $mnm['id_menu'];?>" ng-init="<?php echo $mnm['id_menu'];?>=0" require/>
                                    </div>
                                    <img src="img/<?php echo $mnm['img'];?>" alt="..." style="width: 120px; height: 120px; border-radius:20%;">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <div class="w-75 mx-auto mb-5">
                        <h4>List Pesanan :</h4>
							<table class="table table-striped  ">
								<?php
                                $tampilmenu = $menu->tampilmenu();
								while($row = $tampilmenu->fetch_array()){ ?>
								<tr ng-show="<?=$row['id_menu']?> > 0">
									<td class=" "><?=$row['nama']?></td>
									<td class=" ">{{ <?=$row['id_menu']?>}}</td>
									<td class=" ">{{ <?=$row['harga']?>*<?=$row['id_menu']?>}}</td>
								</tr>
								<?php } ?>
								<tr>
									<td class=" ">Total</td>
									<td colspan="2" align="center" class=" " >

                                    {{<?php $i = 1;
                                            $jml;?>
                                        <?php foreach($tampilmenu as $row) : ?><?php $jml?>+(<?= $row['harga']?>*<?= $row['id_menu']?>)
                                            <?php ;$i++; ?>
                                            <?php endforeach; ?>}}
									</td>
								</tr>
								<tr>
									<td colspan="3" align="right">
										<button type="submit" name="pesan" class="btn btn-outline-dark">Pesan</button>
									</td>
								</tr>
							</table>
					</div>
			    </form>
            </div>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>