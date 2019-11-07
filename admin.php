
<?php
session_start();

if(!isset($_SESSION['loggedIN'])){
header('Location: pocetna.php');
exit();
}


?>



<!DOCTYPE html>

<html>
	<head>
		<title> Ritam Beograda </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<meta name="description" content="Rezervacija karata za predstojece muzicke dogadjaje u             gradu i postavljanje vasih nastupa za druge korisnike ">
		<meta name="author" content="Aleksandra Boskovic">
			<link rel="stylesheet" href="pocetna.css">
		<style>
			
body {font-size:18px;
       font-family:Georgia, serif;
}



.ponuda {text-align:center;
    width:180px;
}

#pocetak {
		          width:100%;
		          height:75%;
		         }	
.navigacioni_meni {
                  overflow: hidden;
                  background-color: #333;
	              font-weight:bold;
	              font-style:italic
                }
.navigacioni_meni a {
                  float: right;
                  color: #f2f2f2;
                  text-align: center;
                  padding: 14px 16px;
                  text-decoration: none;
                  font-size: 17px;
                 }
.navigacioni_meni a:hover {
                  background-color:#330a00;
                  color: white;
                       }

.navigacioni_meni a.active {
                  background-color:#1abc9c;
	              color: black;
	                    }
		button ,.button{
	            background-color:#1abc9c; 
                border: none;
                color: black;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
	            border-radius: 12px;
                width: 40%;
			    font-weight:bold;
		      }
	button:hover, .button:hover {background-color:#330a00 ; 
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
	            border-radius: 12px;
                width: 40%;
	            cursor:pointer;
		        font-weight:bold;
	
	            }
		
		table {
		       color:white;
		       text-align:center;
			   margin-left:auto;
			   margin-right:auto;
		     }
		
		.sl {
			padding:20px;
		    }	

     .linkovi {
             color :#1abc9c;
	         font-style:italic;
	         text-decoration:underline;
	   }


.iskacuci {
	       display:none;
	       position:fixed;
	       z-index:2;
	       top:15%;
	       left:20%;
	       right:20%;
	       background-color:white;
	       text-align:center;
	       width:60%;

	}
	
     .deo1 {height:70px;}
	
	#zatvori {
	       height:40px;
	       width:40px;
	       float:right;
	       text-align:center;
	       background-color:#1abc9c;
	       color:white;
	}
	
	span.close {font-size: 35px;
                font-weight: bold;}
	
    span.close:hover {color: #330a00;
	}

 #message_box {
	    background-image:linear-gradient(to bottom left,#002d26,#00dbb9,#002d26);
	    width:200px;
		height:90px;
		z-index:1;
		position:absolute;
		top:14px;
		left:14px;
		display:none;
		border-radius: 30px;
		
		}
		
		
		#close_box{
		position:absolute;
	    top:0px;
		right:5px;
	    font-size:13px;
		font-weight: bold;
		
		}
		
		#close_box:hover{
		 cursor: pointer;
		}
		
		
		#date_time{
		position:absolute;
	    top:20px;
		
		
		}
		#date_time{
			color:black;
		font-size:20px;
		font-weight: bold;
		text-align:center;
		vertical-align:middle;

		
		}

  
.mySlides {display: none
			
			
			}
img {vertical-align: middle;}


.slideshow-container {
  max-width: 1000px;
	max-height:500px;
  position: relative;
  margin: auto;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 0px;
  bottom:0px;
  width: 40px;
  padding-top:250px;
  color: white;
  font-weight: bold;
  font-size: 24px;
  transition: 1s ease;
 text-align:center;
 
}

.next {
  right: 0px;

  
}
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}


.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #1abc9c;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

		
			
		</style>
		
		
		
		
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
		 <script type='text/javascript'>
		 
		
		$(document).ready(function(){                            
                 $('#message_box').delay(500).slideDown(1000);
			
                $('#close_box').on('click', function(){
                    $('#message_box').slideUp(1000);
                });
			
			
            });
		
		  

		</script>
		
		
		
		
	</head>
	
	<body style="background:black">
		
		<div id="message_box">
		<div id="close_box">X
		</div>
		<div id="date_time">
			<span id="hour"></span>
			<span> :</span>
			<span id="min"></span>
			<span id="days"></span>
			<br>
			<span id="day"></span>.
			<span id="month"></span>.
			<span id="year"></span>
		</div>
		</div>
		
	
		<header>
			<div class="navigacioni_meni">
            <a href="logout.php">Logout</a>
            
            <a class="active" >Admin strana</a>
            

           </div>
		</header>
		
		
		
		<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="slika4.jpg" style="width:100% ; height:500px">
  <div class="text">Pogled na kafice u podnozju Kalemegdana</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="koncerti.jpg" style="width:100% ; height:500px">
  <div class="text">Stark arena</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="splavovi.jpg" style="width:100% ; height:500px">
  <div class="text">Reka Sava mesto na kom je najvise splavova</div>
</div>
			
<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="slika2.jpg" style="width:100% ; height:500px">
  <div class="text">Pogled sa kalemegdana</div>
</div>
			<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="slika3.jpg" style="width:100% ; height:500px">
  
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
	 <span class="dot" onclick="currentSlide(4)"></span> 
	 <span class="dot" onclick="currentSlide(5)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
   
     showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
	
	if (slideIndex > slides.length) {slideIndex = 1};
	if (n== (0)) {slideIndex=slides.length;}
	
	
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
		 dots[i].className = dots[i].className.replace(" active", "");
    }
	
	dots[slideIndex-1].className += " active";
   
    slides[slideIndex-1].style.display = "block";

	

	
  
	
	
	
	
  }
	
	
	
	
	
	
		
	
	
/*	
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
		 dots[i].className = dots[i].className.replace(" active", "");
    }
	
	dots[slideIndex-1].className += " active";
   
    slides[slideIndex-1].style.display = "block";
	slideIndex++;
	
	if (slideIndex > slides.length) {slideIndex = 1};
	
    setTimeout(showSlides, 5000); 
	
	
	
	
  }
 
	
*/	

	
	
	
</script>
		
		
		



	<br>
<br>
<br>	
		<div style="color:white; text-align:center">


		<form action='' method='get'>
			<h3> Unos podataka </h3>
<br>
			Naziv objekta<br> 
                        <input type='text' name='naziv_objekta' />
			<br/>
			Adresa <br>
                        <input type='text' name='adresa' />
			<br/>
			Datum<br> 
                        <input type='text' name='datum' /><br/>
			Vrsta muzike<br/>
                        <input type='text' name='vrsta_muzike' />
<br/>
		        Slobodan ulaz<br>
			 <input type='text' name='slobodan_ulaz' /><br/>
			Cena<br>
			 <input type='text' name='cena' />
			<br/><br/>
                         
			<input class="button" type='submit' name='insert' value='upisi podatke' />
		</form>

		<form action='' method='get'>
			<h3> Brisanje podataka </h3><br/>
			Naziv objekta<br/> <input type='text' name='naziv_objekta' />
			<br/>Datum<br/> <input type='text' name='datum' />
			<br/><br/>
			<input class="button" type='submit' name='delete' value='obrisi podatke' />
		</form>
		
		<form action='' method='get'>
			<h3> Izmena podataka.</h3><br>Obavezno je popuniti Naziv objekta, Datum i polje koja zelis da promenis proizvoljno.U jednoj iteraciji moguce je promeniti samo jednu vrednos.Ako menjatee slobodan ulaz na ne upisite i cenu<br><br/>
			Naziv objekta<br> 
                        <input type='text' name='naziv_objekta' />
			<br/>
			
			Datum<br> 
                        <input type='text' name='datum' /><br/>
			Vrsta muzike<br> 
                        <input type='text' name='vrsta_muzike' /><br/>
		  
			Cena<br>

			 <input type='text' name='cena' /><br/>
<br>
<br>
			<input class="button"type='submit' name='update' value='izmeni podatke' />
		</form>
		
	
		<?php
		  $veza=mysqli_connect('localhost','veb','123456','dogadjaji');
			
		
			if(isset($_GET['insert'])){


                                $naziv=$_GET['naziv_objekta'];
				$adresa=$_GET['adresa'];
				$datum=$_GET['datum'];
				$vrsta=$_GET['vrsta_muzike'];
                                $slobodan=$_GET['slobodan_ulaz'];
				$cena=$_GET['cena']; 


if($naziv=="" || $adresa=="" || $datum=="" || $vrsta=="" || $slobodan=="")
{
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Samo cena moze biti izostavljenja.Pokusaj ponovo!</div></a>";
}


else{

if($cena=="")
{
$upit2="insert into ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz) 
						values('$naziv2', '$adresa2', '$datum2', '$vrsta2','$slobodan2')";
				
				if(mysqli_query($veza,$upit2)===FALSE)
					echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Neuspesan upis.Pokusaj ponovo!</div></a>";
				else
					echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno upisani.Kikni za jos promena!</div></a>";




}
else {

$upit="insert into ponuda(naziv_objekta,adresa,datum,vrsta_muzike,slobodan_ulaz,cena) 
						values('$naziv', '$adresa', '$datum', '$vrsta','$slobodan','$cena')";
				
				if(mysqli_query($veza,$upit)===FALSE)
					echo "<span class='obavestenje'>Pokusajte ponovo: problem sa unosom vrednosti!</span>";
				else
					echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno upisani.Kikni za jos promena!</div></a>";






}



}
                                    }
			
			













			if(isset($_GET['delete'])){
				$naziv=$_GET['naziv_objekta'];
				$datum=$_GET['datum'];


 if($naziv=="" || $datum=="")
{
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Za brisanje neophodno je uneti naziv objekta i datum!</div></a>";
}

else{
$upit="delete from ponuda where naziv_objekta='$naziv' and datum='$datum'";
				
if(mysqli_query($veza,$upit)===FALSE)
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Problem pri brisanju.Pokusajte ponovo!</div></a>";
else{
if(mysqli_affected_rows($veza)!==0)
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno obrisani!</div></a>";						
else
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Ne postoji takva ponuda!</div></a>";

}

}

				
			}
			
			
		
		

                        if(isset($_GET['update'])){
			        $naziv=$_GET['naziv_objekta'];
				$datum=$_GET['datum'];
				$vrsta=$_GET['vrsta_muzike'];
                                $slobodan=$_GET['slobodan_ulaz'];
				$cena=$_GET['cena']; 
				


if($naziv=="" || $datum=="")

{
echo "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Za azuriranje neophodno je uneti naziv objekta i datum!</div></a>";
}
else{


if($vrsta!=""){
$upit="update ponuda set vrsta_muzike='$vrsta' where naziv_objekta='$naziv' and datum='$datum'";
if(mysqli_query($veza,$upit)===FALSE)
					echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Pokusajte ponovo: problem sa azuriranjem vrednosti!</div></a>";
				else
					echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno azurirani!</div></a>";
			

}


if($cena==0){
$upit2="update ponuda set cena=null where naziv_objekta='$naziv' and datum='$datum'";
if(mysqli_query($veza,$upit2)===FALSE)
					echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Pokusajte ponovo: problem sa azuriranjem vrednosti!</div></a>";
				else
{$upit3="update ponuda set slobodan_ulaz='da' where naziv_objekta='$naziv' and datum='$datum'";
if(mysqli_query($veza,$upit3)===FALSE) echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Pokusajte ponovo: problem sa azuriranjem vrednosti!</div></a>";
					else echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno azurirani!</div></a>";}
			

}


if($cena!=0 && $cena!=""){
$upit4="update ponuda set cena='$cena' where naziv_objekta='$naziv' and datum='$datum'";
if(mysqli_query($veza,$upit4)===FALSE)
					echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Pokusajte ponovo: problem sa azuriranjem vrednosti!</div></a>";
				else
{$upit5="update ponuda set slobodan_ulaz='ne' where naziv_objekta='$naziv' and datum='$datum'";
if(mysqli_query($veza,$upit5)===FALSE) echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Pokusajte ponovo: problem sa azuriranjem vrednosti!</div></a>";
					else echo  "<a href='admin.php'><div style='position:fixed; top:600px;left font-size:16px' class='obavestenje'>Podaci su uspesno azurirani!</div></a>";}
			

}



		


}	

			}

	
			
			
		
		?>

		





</div>
<br>
<br>
<br>
						
		<footer>
			<div>
		
		        <table>
			              <tr><th>SPLAVOVI</th>
				              <th>KONCERTI</th>
				              <th>SVIRKE</th>
			              </tr>
			              <tr><td><a href="https://www.beogradnocu.com/"><img class="sl"                                            src="splavovi.jpg" style="width:85%;"></a></td>
				              <td><a href="http://www.eventim.rs/rs/"><img class="sl"                                                src="koncerti.jpg"style="width:85%;"></a></td>
				              <td><img class="sl" src="svirke.jpg"style="width:70%;"></td>
			              </tr>
		       </table>
				
	      </div>
     </footer>
					
		<script>
    var d = new Date();
	var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	    document.getElementById("min").innerHTML =d.getMinutes();
		document.getElementById("hour").innerHTML =d.getHours();
		
        document.getElementById("days").innerHTML =days[d.getDay()] ;
	    document.getElementById("day").innerHTML = d.getDate();
		document.getElementById("month").innerHTML = months[d.getMonth()];
		document.getElementById("year").innerHTML = d.getFullYear();
</script>			
		
		
	</body>
</html>

