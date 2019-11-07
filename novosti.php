<?php
session_start();

if(!isset($_SESSION['loggedIN'])){
header('Location: pocetna.php');
exit();
}

if(isset ($_POST['login'])){
$connection= new mysqli('localhost','veb','123456','dogadjaji');
$naziv=$connection->real_escape_string($_POST['nazivPHP']);
$adresa=$connection->real_escape_string($_POST['adresaPHP']);
$datum=$connection->real_escape_string($_POST['datumPHP']);
$username=$_SESSION['username'];

$data=$connection->query("SELECT * FROM ponuda WHERE naziv_objekta='$naziv' and adresa='$adresa' and datum='$datum'");


if($data->num_rows > 0){
$insert=$connection->query("insert into rezervisano (username,naziv_objekta,adresa,datum) values('$username','$naziv','$adresa','$datum')");
if($insert===FALSE){exit("Pokusajte ponovo i proverite unos");}
else{
exit("Uspesno ste izvrsili rezervaciju. Proverite na strani Moje rezervacije.");
}

}
else{
exit("Pazljivo pogledajte za koje dogadjaje je moguce izvrsiti rezervaciju!");
}

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
       font-family:Georgia, serif}



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
                
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
	            border-radius: 12px;
                width: 10%;
			    font-weight:bold;
		      }
	button:hover, .button:hover {background-color:#330a00 ; 
                border: none;
                color: white;
               
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 20px;
	            border-radius: 12px;
                width: 10%;
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


#hidden {
	       display:none;
	       position:fixed;
	       z-index:2;
	       top:10px;
	       left:10%;
	       right:10%;
	       background-color:#333;
	       text-align:center;
              color:white;
	       width:80%;
               height:160px;

	}
	
    
	
	#zatvori {
	       height:25px;
	       width:20px;
	       float:right;
	       text-align:center;
	       background-color:#1abc9c;
	       color:white;
	}
	
	span.close {font-size: 20px;
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
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		 <script type='text/javascript'>
		 
		
		$(document).ready(function(){                            
                 $('#message_box').delay(500).slideDown(1000);
			
                $('#close_box').on('click', function(){
                    $('#message_box').slideUp(1000);
                });
		
     $("#potvrda").on('click',function(){

             var naziv=$("#naziv").val();
              var adresa=$("#adresa").val();
              var datum=$("#datum").val();

  
               $.ajax({
                       url:'novosti.php',
                       method:'POST',
                       data: {
                       login:1,
                       nazivPHP: naziv,
                       adresaPHP: adresa,
                       datumPHP: datum,},
                        success: function(response){
                        
                        window.alert(response);


                       console.log(response);
                                                 
                                                   },
                        

                                                  });



                

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
            
            <a href="moje_rezervacije.php">Moje rezervacije</a>
            <a class="active">Novosti</a>
            

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
		




<table>
<tr><th class="ponuda">Naziv objektra</th>
<th class="ponuda">Adresa</th>
<th class="ponuda">Datum</th>
<th class="ponuda">Vrsta muzike</th>
<th class="ponuda">Slobodan ulaz</th>
<th class="ponuda">Cena</th>
<th></th>
</th>


<?php
		
$veza=mysqli_connect("localhost","veb","123456","dogadjaji");

if(mysqli_connect_errno($veza))
die("Problem sa konekcijom");


$query="select * from ponuda";

$result=$veza->query($query);

while(($row=$result->fetch_row())){		
	?>

<tr><td class="ponuda"><?php echo "$row[0]";?></td>
<td class="ponuda"><?php echo "$row[1]";?></td>
<td class="ponuda"><?php echo "$row[2]";?></td>
<td class="ponuda"><?php echo "$row[3]";?></td>
<td class="ponuda"><?php echo "$row[4]";?></td>
<td class="ponuda"><?php echo "$row[5]";?></td>

</tr>
<?php
}

?>
</table>

<br>
<br>
<br>

<input type="button" style="margin:auto; width:40%" onclick="document.getElementById('hidden').style.display='block'"  class="button" value="Rezervisi">

	 <div id="hidden" class="iskacuci">
  
           
		 
		   
               
		           <div id="zatvori">
                           <span onclick="document.getElementById('hidden').style.display='none'"                                  class="close" title="Zatvori">&times;</span>  
		           </div>
		      
              <br>
<form action="" method="post">
Naziv : <input type="text" placeholder="Unesi naziv objekta" id="naziv">
                             
                       
		                        <br>
Adresa:
                        <input type="text" placeholder="Unesi adresu" id="adresa">
                              
				                <br>
Datum :
<input type="text" placeholder="YYYY-MM-DD" id="datum">
                             
				            
 <span id="poruka" style="color:red"></span><br>
			<input class="button" style="float:right"type="button" value="OK" id="potvrda">				
                   </form>     
							    <br>
                         
		                        <br>
			                    <br>
				                <br>
					            <br>
                   

    
      
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

