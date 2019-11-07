<?php

session_start();

if(isset($_SESSION['loggedIN']))
{header('Location:novosti.php');
exit();}



  if(isset ($_POST['login'])){
$connection= new mysqli('localhost','veb','123456','dogadjaji');
$username=$connection->real_escape_string($_POST['usernamePHP']);
$password=$connection->real_escape_string($_POST['passwordPHP']);
$ime=$connection->real_escape_string($_POST['imePHP']);
$prezime=$connection->real_escape_string($_POST['prezimePHP']);
$data=$connection->query("SELECT username FROM korisnici WHERE username='$username'");
if($data->num_rows > 0){

exit('Korisnicko ime je zauzeto molimo pokusajte ponovo');}
else {
$insert=$connection->query("insert into korisnici (username,password,ime,prezime) values('$username','$password','$ime','$prezime')");

if($insert===FALSE)
exit('Pokusajte ponovo!');				
else{
$_SESSION['loggedIN']='1';
$_SESSION['username']=$username;					
exit('success');}


}


}

?>



<!DOCTYPE html>
<html>
	
<head>
	<title> Ritam Beograda </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		
	  <style>


#reg{display:none;
 z-index:2;}
		  body {font-size:18px;
       font-family:Georgia, serif}


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
	button:hover,.button:hover {background-color:#330a00 ; 
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

#glava {
		color:white;
		text-align:center;
	
	
	
	}

.error { color:#1abc9c;
         font-size:16px;}
		  
		  form {
		  margin-left:200px;
		  text-align:left;}	 
		  
		  form button{text-align:center;}
		  
		  
	</style>
	
		
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		 <script type='text/javascript'>
		 
		
		$(document).ready(function(){                            
                 
		
     $("#reg").on('click',function(){

             var username=$("#username").val();
             var password=$("#password").val();
             var name=$("#name").val();
             var surname=$("#surname").val();
             
      

               $.ajax({
                       url:'registracija2.php',
                       method:'POST',
                       data: {
                        login:1,
                        usernamePHP: username,
                        passwordPHP: password,
                        imePHP: name,
                        prezimePHP: surname

                        
                     },
                        success: function(response){
                       

                 if(response.indexOf('success') >= 0){
                         window.location='novosti.php';}
                      else {
                        window.alert(response);}

                
                                                 
                                                   },
                        dataType:'text'

                                                  });


                

                                        });	
			
            });
		
		  

		</script>
	<script type='text/javascript'>
	
		
	
function proveri()
	{
		        var ime_element =document.getElementById("name");
			    var ime = ime_element.value;
				var ime_message =document.getElementById("span_name");
			   
			
			 ime_message.textContent="";
			
		
				if(ime.length==0){
				    ime_message.textContent="Obavezno polje";
					return;
				}
				var noletter=0;
				for(var i=0; i<ime.length; i++){
					
					if("QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmšđčćžŠĐČĆŽ ".indexOf(ime[i]) == -1){
						noletter=noletter+1;
					}
				}
				
				if(noletter != 0){
					ime_message.textContent="Ime sme da sadrzi samo mala i velika slova";
				 return;
				}
		
		
		
		        var surname_element =document.getElementById("surname");
			    var surname = surname_element.value;
				var surname_message =document.getElementById("span_surname");
			   
				surname_message.textContent="";
				if(surname.length==0){
				    surname_message.textContent="Obavezno polje";
				return;	
				}
		else{
				var noletter2=0;
				for(var i=0; i<surname.length; i++){
					
					if("QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnmšđčćžŠĐČĆŽ ".indexOf(surname[i]) == -1){
						noletter2=noletter2+1;
					}
				}
				
				if(noletter2 != 0){
					surname_message.textContent="Ime sme da sadrzi samo mala i velika slova";
				 return;
				}
		}
		
		       
		
		        var username;
				var username_element;
			
				username_element = document.getElementById("username"); 
				username = username_element.value;
			    var username_message =document.getElementById("span_username");
			
		username_message.textContent="";
		
		if(username.length==0){
				    username_message.textContent="Obavezno polje";
					return;
				}
		
		else {
				if(username.length<5 || username.length>8){
					
					 username_message.textContent="Username mora da sadrzi maximum 8 karaktera,minimum 5 ";
					return;
				
				} 
		
		
			    var cifara=0;
				for(var i=0; i<username.length; i++){
					
					if("0123456789".indexOf(username[i]) != -1){
						cifara=cifara+1;
					}
				}
				
				if(cifara == 0){
					username_message.textContent="Username mora da sadrzi bar jednu cifru";
					return;
				}
		}
		
		
		
		
		
		
		        var password_element = document.getElementById("password");
				var password = password_element.value; 
				var password_message =document.getElementById("span_password");
				
		          password_message.textContent="";
		
		if(password.length==0){
				    password_message.textContent="Obavezno polje";
					return;
				}
		
		
				if( password.length>10){
					password_message.textContent="Password moze da sadrzi maksimalno 10 karaktera";
					 return;
				}
				
				var koliko=0; 
				
				for(var i=0; i<password.length; i++){
					
					if("0123456789".indexOf(password[i]) != -1){
						koliko=koliko+1;
					}
				}
				
				if(koliko < 4){
					password_message.textContent="Password mora da sadrzi tacno 4 cifre";
					return;
				}
		
		
		
		        var password_again_element = document.getElementById("password_again");
				var password_again = password_again_element.value; 
				var password_again_message =document.getElementById("span_password_again");
		
		password_again_message.textContent="";
		
		if(password != password_again)
		{
		password_again_message.textContent="Lozinke se ne poklapaju";
		return;
		
		}

		var ok = document.getElementById("ok");
                ok.textContent="Sada se mozete registrovati ukoliko je izabrani username zauzet dobicete poruku.";
		
var reg = document.getElementById("reg");
reg.style.display='block';
var reg = document.getElementById("pro");
reg.style.display='none';

		
	}
	
	</script>
</head>
	
<body style="background:black" >
	<header>
			<div class="navigacioni_meni">
            <a class="active">Registruj se</a>
            
            <a href="pocetna.php">Pocetna</a>
           </div>
	</header>
<div id="glava" class="reg">
	
	
	<form name="forma">
		
		<b>Ime:</b>
		<br>
		<input id="name" type="text">
		<span id="span_name" class="error">*</span>
		<br>
		
		<b>Prezime:</b>
		<br>
		<input id="surname" type="text">
		<span id="span_surname" class="error">*</span>
		<br>
		
		<b>Korisnicko_ime:</b>
		<br>
		<input id="username" type="text" itle="Mora da sadrzi maximum 8 karaktera,minimum 5 od kojih je bar jedno broj">
		<span id="span_username" class="error">*</span>
		<br>
		
		<b>Lozinka:</b>
		<br>
		<input id="password" type="password" title="Sifra moze da sadrzi maksimalno 10 karaktera,od cega tacno 4 moraju biti cifre">
		<span id="span_password" class="error">*</span>
		<br>
		<b>Ponovite lozinku:</b>
		<br>
		<input id="password_again" type="password">
		<span id="span_password_again" class="error">*</span>
		<br>
		
		<br>
		<span id="ok" class="error">*</span>
                <input id="reg" type="button" class="button" value="Registuj se">
		<button id="pro" type="button" OnClick="proveri()">Proveri</button>

	</form>	

<br>


</div>
		



	<br>
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
	
	
<body>
			
<html>
