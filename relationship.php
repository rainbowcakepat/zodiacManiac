<?php 

//4 variables
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'zodiacmaniac';

//Access database
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if($conn -> connect_error){
    die('Connection failed' . $conn -> connect_error);
}

    global $info;
    global $z;

    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday'])){

        $monthWord = date("F",strtotime($_COOKIE['bday']));
        $day =  date("d",strtotime($_COOKIE['bday']));

            //Leo
            if(($monthWord == "July" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                $z = 'Leo';                                                            
            }
            //Aquarius
            else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                $z = 'Aquarius';
            }
            //Virgo
            else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                $z = 'Virgo';    
            } 
            //Taurus
            else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                $z = 'Taurus';
            }
            //Gemini
            else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                $z = 'Gemini';
            }

            //Libra
            else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                $z = 'Libra';
            }
            
            //Cancer
            else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {                                       
                $z = 'Cancer';
            }

            //Pisces
            else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)){
                $z = 'Pisces';
            }

            //Aries
            else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)){
                $z = 'Aries';
            }

            //Scorpio
            else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)){
                $z = 'Scorpio';
            }

            //Sagittarius
            else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)){
                $z = 'Sagittarius';
            }

            //Capricorn
            else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)){
                $z = 'Capricorn';
            }

            $sql = "SELECT relationship from zodiacmaniacusers WHERE zodiacSign = '$z'";
            $info = $conn -> query($sql);

                if($info -> num_rows > 0){
                    while($row = $info -> fetch_assoc()){
                        $displayRelationship = $row["relationship"];
                    }
                }
                else{
                    $displayRelationship = "No records to display." . "<br/>";
                }    
    }
    else{
        $displayRelationship = "Looking for a soulmate? See which sign is compatible with yours. Just enter your name and birthday then send it to the stars!";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Zodiac Maniac</title>
        <link rel="icon" type="image/x-icon" href="assets/img/zod.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top">Relationships</a>
               
              
                </div>
            </div>
        </nav>
        
        <!-- Mashead header-->
       
        <header class="masthead">
            
            <div class="container px-5">
                
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="mb-5 mb-lg-0 text-center text-lg-start" >
                        <video id="background-video" style="width: 100vw;
            height: 100vh;
            object-fit: cover;
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;" 
            autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
                <source src="assets/img/galaxy.mp4" type="video/mp4">
              </video>
                            <h1 class="text-white display-1 lh-1 mb-3">Want to know about your Relationships?</h1>
                            <p class="text-white lead fw-normal text-white-50 mb-4">Here are the astrological descriptions that awaits you! Only here at Zodiac Maniac </p>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                            <p class="text-white lead fw-normal"><?php echo $displayRelationship ?></p>
                            <br>
                            </div>
                            <br>
                            <form action="index.php">
                                <input type="submit" name="back" value="  Go back to main menu 🌠" style="border-radius: 12px; background-color: #FFC0CB;"><br><br>
                            </form>

                        
                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="masthead-device-mockup">
                            <img src="assets/img/couple.webp" alt="..." style="max-width: 100%; height: 100%" />

                        </div>
                    </div>
                </div>
            </div>
       
        </header>

</html>

