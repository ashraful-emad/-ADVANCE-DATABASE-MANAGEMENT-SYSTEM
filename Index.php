<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<style>
        body{
          
            background-size: cover;
            margin: 0;
            text-align: center;
            background-image: url('../picture/online-shopping-with-mobile-shopping-elements-mockup-template_1150-38846.webp');
            background-repeat: no-repeat;
            max-width: 100%;
            height: auto;
            padding: 50px 0;
            font-family: 'Poppins', sans-serif;
         }
        .logo{
            height: 1050px;
            font-size: large ;
            font-style: italic;
            font-weight: 100000;
            color: blueviolet;
            
            
            }
            .navbar{
                display: flex;
                align-items: center;
                padding: 10px;
                
            }
            nav{
                flex: 1;
                text-align: right;
                height: 1000px;
            }
            nav ul{
                display: inline-block;
                list-style-type: none;
            }
            nav ul li{
                display: inline-block;
                margin-right: 20px;
            }
            a{
                text-decoration: wavy;
                color: #555;
            }
            .container{
                max-width: 1300px;
                margin: auto;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 20px;
               
            }
            p{
                color: #555;
            }
            h2{
                font-size: 30px;
                color: #555; 
                font-style: inherit;
                text-align: center;
                height: 700px;    
            }
            .row{
              display: flex;
              align-items: center;
              flex-wrap: wrap;
              justify-content: space-around;  
            }
            .heading{
                flex-basis: 50%;
                min-width: 300px;
                font-size: medium;
            }
            .heading h1{
                font-size: 30px;
                line-height: 60px;
                margin: 25px 0;
            }
            .btn{
                display: inline-block;
                background: #ff523b;
                color: #fff;
                padding: 8px 30px;
                margin: 30px 0 ;
                border-radius: 30px;
                transition: 0.5s;
            }
            .btn:hover{
                background: #563434;
            }
            .header{
                margin-top: 10px;
            }
			
			
			
			
    .categories-list {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 3px;
        text-align: center;
        font-style: italic;
        font-size: 20px; 
        padding-top: 70px;     
}
     .categories-list img {
       width: 50%;
       height: 100%;
       object-fit: cover;
}

           
    </style>
<body>
     <?php include 'forms/header.php';?>
 <div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <h1>Trust Me Bro </h1>           
            </div>
            <div class="row">
                <div class="heading">
                    <h1>Dont want to go outside !</h1>
                    <p><b>Surprise we are here .</b></p>
                    <a href="forms/login.php"class="btn">Login Here...</a>
                </div>   
            </div>
                <nav>
                    <ul>
                         
                        <li><a href="" class="btn">About</a></li>
                        <li><a href="forms/contact.php"class="btn">Hot line</a></li>
                        <li><a href="forms/track.php" class="btn">Track parcel</a></li>
                        
                    </ul>
                </nav>
        
               
            
        </div>
             
    </div>
      
    </div>

 </div>   
<?php include 'forms/footer.php';?>
</body>
</html>