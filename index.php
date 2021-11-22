<?php
// User Input
if (isset($_POST['send'])){

    $fname = $_POST["fullName"];
    $bday = $_POST["birthday"];

    setcookie('fname', $fname, time()+1800);
    setcookie('bday', $bday, time()+1800);
    header('Location: index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Zodiac Maniac</title>
        <link rel="icon" type="image/x-icon" href="assets/img/galaxyLogo.png" />
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
                <a class="navbar-brand fw-bold" href="#page-top">Zodiac Maniac</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Your Zodiac</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="#horoscope">Daily Horoscope</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="about.php">About Us</a></li>
                    </ul>
                 
                </div>
            </div>
        </nav>
        
        <!-- Mashead header-->
       
        <header class="masthead">
            
            <div class="container px-5">
                
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        
                        <!-- BANNER-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start" >
                            
                            <h1 class="text-white display-1 lh-1 mb-3">Welcome to Zodiac Maniac!</h1>
                            <p class="text-white lead fw-normal text-white-50 mb-5">It's time! the constellations are here to tell your brightest destiny, know your fate in just one click</p>
                            <div class="d-flex flex-column flex-lg-row align-items-center mb-5">
                                <form method="post" action="index.php">
                                    <span class="text-white lead fw-normal mb-5">Name: </span> 
                                    <input type="text" id="fullName" name="fullName" placeholder="Enter your full name    " style="background-color: white; border-radius: 5px" required><br><br>
                                    <span class="text-white lead fw-normal mb-5">Birthday: </span> 
                                    <input type="date" id="birthday" name="birthday" style="background-color: white; border-radius: 5px; width: 200px" required><br><br>
                                    <input type="button" name="send" value="  Send to the stars 🌠" style="border-radius: 10px; background-color: #FFC0CB;"><br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="masthead-device-mockup">
                            <img src="assets/img/zodiacSigns2.png" alt="..." style="max-width: 100%; height: 100%" />

                        </div>
                    </div>
                </div>
            </div>
       
        </header>
        <!-- NAME + BDAY-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">
                            
                            <?php 
                            
                            $guestInfo = 'Hey, guest! The stars are re-aligning at your favor, discover your fate ';

                            if (!isset($_COOKIE['fname']) && !isset($_COOKIE['bday'])) { 

                                echo $guestInfo . '<br>'; 


                            } else {
                        
                                function calcutateAge($dateOfBirth){

                                    $dateOfBirth = date("Y-m-d",strtotime($_COOKIE['bday']));
                            
                                    $dateOfBirthObj = new DateTime($dateOfBirth);
                                    $dateNowObject = new DateTime();
                            
                                    $difference = $dateOfBirthObj->diff($dateNowObject);
                            
                                    return $difference->y;
                            
                             }
                                
                                echo 'Hey, ' . $_COOKIE['fname'] .  '! ' . '<br>';
                                echo 'You are currently, ' . calcutateAge($_COOKIE['bday']) . ' years old';
                                echo ' and your birthday is on ' . date('F d Y', strtotime($_COOKIE['bday'])) . '<br>';

                            }
                                
                            ?>
                           
                        </div>
                        <!-- <img src="assets/img/tnw-logo.svg" alt="..." style="height: 3rem" /> -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features" class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-moon-stars-fill icon-feature text-gradient d-block mb-3"></i>
                                        <a href="zodiac.php" style="color: #000000 ;" ><h3 class="font-alt">Zodiac Sign</h3></a>

                                        <?php

                                        

                                            class Zodiac {


                                                function getInformation() {
                                                    
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                     {
                                                        $monthWord = date("F",strtotime($_COOKIE['bday']));
                                                        $day =  date("d",strtotime($_COOKIE['bday']));
                                                        
                                                        //Leo
                                                        if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                            echo 'Leo is the fifth Zodiac Sign covering the period from the 23rd of July to 22nd of August.';
                                                        }
                                                        //Aquarius
                                                        else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            echo "Aquarius is the eleventh Zodiac Sign covering the period from the 20th of January to 18th of February";
                                                        }
                                                        //Virgo
                                                        else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            echo "
                                                            Virgo is the sixth Zodiac Sign covering the period from the 23rd of August to 22nd of September.";
                                                        } 
                                                        
                                                        /*
                                                        
                                                        Dagdagan niyo dito


                                                        */


                                                        else {
                                                            echo  "Zodiac signs are constellations that originated from the greek term zōdiakos kyklos, meaning “circle of animals”.";
                                                        }
                                                       
                                                       
                                                      
                                                    } else {
                                                        
                                                        echo  "Zodiac signs are constellations that originated from the greek term zōdiakos kyklos, meaning “circle of animals”.";
                                                        
                                                    }
                                                  
                                   
                                                }
                                            }

                                            class Personality extends Zodiac{

                                                function getInformation() {
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($_COOKIE['bday']));
                                                       $day =  date("d",strtotime($_COOKIE['bday']));
                                                       
                                                       //Leo
                                                       if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                           echo "Leos are known to be born as natural leaders who are creative and eager to conquer everything.";
                                                       }
                                                       //Aquarius
                                                       else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            echo "Aquarius are known to be incredibly innovative, self-reliant and clever in everything that they do.";
                                                        }
                                                       //Virgo
                                                       else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            echo "Virgos are known to be humble, practical and sympathetic person that you will meet in the world.";
                                                        } 
                                                       
                                                       /*
                                                       
                                                       Dagdagan niyo dito


                                                       */



                                                       else {
                                                           echo  "Unleash the inner you! Know more about yourself through the constellations.";
                                                       }
                                                      
                                                      
                                                     
                                                   } else {
                                                       
                                                        echo  "Unleash the inner you! Know more about yourself through the constellations.";
                                                       
                                                   }
                                                 
                                  
                                               }
                                                
                                            }

                                            class Elements extends Zodiac{

                                                function getInformation() {
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($_COOKIE['bday']));
                                                       $day =  date("d",strtotime($_COOKIE['bday']));
                                                       
                                                       //Leo
                                                       if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                           echo "Leo's have the powerful and active fire element in their nature";        
                                                       }
                                                       //Aquarius
                                                       else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            echo "Aquarius' have this breathable minds representing the air element";
                                                        }
                                                       //Virgo
                                                       else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            echo "Virgo's have the life giver and ever loving presence of the earth element";
                                                        } 
                                                       
                                                       /*
                                                       
                                                       Dagdagan niyo dito


                                                       */



                                                       else {
                                                           echo "Among the four astrological elements associated with the Zodiac signs, which one are you?";
                                                       }
                                                      
                                                      
                                                     
                                                   } else {
                                                       
                                                    echo "Among the four astrological elements associated with the Zodiac signs, which one are you?";
                                                       
                                                   }
                                                 
                                  
                                               }
                                            }

                                            class Relationships extends Zodiac{

                                                function getInformation() {
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($_COOKIE['bday']));
                                                       $day =  date("d",strtotime($_COOKIE['bday']));
                                                       
                                                       //Leo
                                                       if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                        echo "The most compatible signs with a Leo are Aries, Sagittarius, Gemini and Libra";
                                                        }
                                                       //Aquarius
                                                       else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            echo "The most compatible signs with an Aquarius are Aries, Sagittarius, Gemini and Libra.";
                                                        }
                                                       //Virgo
                                                       else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            echo "The most compatible signs with a Virgo are Taurus, Capricorn and fellow Virgo.";
                                                        } 
                                                       
                                                       /*
                                                       
                                                       Dagdagan niyo dito


                                                       */



                                                       else {
                                                           echo "Looking for a soulmate? See which sign is compatible with yours";
                                                       }
                                                      
                                                      
                                                     
                                                   } else {
                                                       
                                                        echo "Looking for a soulmate? See which sign is compatible with yours";
                                                       
                                                   }
                                                 
                                  
                                               }
                                            }

                                            $zodiacObject = new Zodiac();
                                            $personalityObject = new Personality();
                                            $elementObject = new Elements();
                                            $relationshipObject = new Relationships();
                                            

                                        ?>
                                
                                    <p class="text-muted mb-0"><?php echo $zodiacObject -> getInformation(); ?></p>

                                        

                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-people icon-feature text-gradient d-block mb-3"></i>
                                        <a href="personality.php" style="color: #000000 ;" ><h3 class="font-alt">Personality</h3></a>
                                        <p class="text-muted mb-0"><?php echo $personalityObject -> getInformation(); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                        <a href="element.php" style="color: #000000 ;" ><h3 class="font-alt">Element</h3></a>
                                        <p class="text-muted mb-0"><?php echo $elementObject -> getInformation(); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-bookmark-heart-fill icon-feature text-gradient d-block mb-3"></i>
                                        <a href="relationship.php" style="color: #000000 ;" ><h3 class="font-alt">Relationship</h3></a>
                                        <p class="text-muted mb-0"><?php echo $relationshipObject -> getInformation(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-0">
                        <!-- Features section device mockup-->
                        <div class="features-device-mockup">
                            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                        <stop class="gradient-start-color" offset="0%"></stop>
                                        <stop class="gradient-end-color" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50"></circle></svg
                            ><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg
                            ><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                            <div class="device-wrapper">
                                <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                                    <div class="screen bg-black">
                                        <!-- PUT CONTENTS HERE:-->
                                    
                                        <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%"><source src="assets/img/demo-screen.mp4" type="video/mp4" /></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic features section-->
        <section class="bg-light">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-12 col-lg-5">
                        <h2 class="display-4 lh-1 mb-4">Ruling Planet</h2>
                        <p class="lead fw-normal text-muted mb-5 mb-lg-0">This section is for the ruling planet details in the website.</p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="assets/img/sun.png" alt="..." /></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to action section-->
        <section class="cta">

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

            <div class="cta-content" id="horoscope">
                <div class="container px-5">
                    <h2 class="text-white display-1 lh-1 mb-4">
                        Your Daily
                        <br />
                        Horoscope
                    </h2>
                    <p class="btn-outline-light py-3 px-4">Hello horoscope ito</p>
                    <!-- <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a> -->
                </div>
            </div>
        </section>
       
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Gurlalu Productions 2021. All Rights Reserved.</div>
                   Dionson
                    <span class="mx-1">&middot;</span>
                   Loseñada
                    <span class="mx-1">&middot;</span>
                   Ong
                    <span class="mx-1">&middot;</span>
                   Valenzuela
                </div>
            </div>
        </footer>
   
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
