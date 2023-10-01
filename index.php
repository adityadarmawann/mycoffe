<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MY COFFE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:wght@100;200;300;400;500;700&family=Ubuntu:ital,wght@0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4ef2c70460.js" cross origin="anonymous"></script>
	<style>
		body{
			background-image: url(img/bgmyco3.png);
			-webkit-animation: bgcolor 20s infinite;
			animation: bgcolor 10s infinite;
			-webkit-animation-direction: alternate;
			animation-direction: alternate;
            font-family: 'PT Sans', sans-serif;
            line-height: 1.6;
			background-size: cover;
    		background-repeat: no-repeat;   
        }
	</style>
</head>
<body>
	<div class="section" style=" margin:0 auto; position: absolute; left:50%; top:50%; transform:translate(-50%, -50%); width: 600px;">
        <div class="bg p-4 mb-5 mt-5 text text-center text-black" style="width:75%; margin: auto;">
            <div class="container">
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
					var refresh=1000;
					mytime=setTimeout('display_ct7()',refresh)
					}
					display_c7()
					</script>
					<span id='ct7' class="text-black d-block"></span>
				<img src="img/logomyco1.png" alt="" style="width: 270px; height:200px;">
                <h5 class="headerp text-black">Selamat datang di aplikasi My Coffe!!</h5>
				<p class="headerp text-black">Silahkan login</p>
                    <div class="datainput">
                        <form action="ceklogin.php" method="post" autocomplete="off" class="m-3">
                            <div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user text-black"></i></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                              </div>
                              
                              <div class="input-group mb-3">
								<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock text-black"></i></span>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                              </div>
    
                              <button class="btn btn-outline-dark mt-3" type="submit" name="login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                        </form>
						<p class="headerp text-black">Belum punya akun? Silakan hubungi admin</p>
                    </div>				
            </div>
        </div>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>