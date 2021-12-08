<?php
// User Input
if (isset($_POST['send'])){

    $fname = $_POST["fullName"];
    $bday = $_POST["birthday"];

    setcookie('fname', $fname, time()+1800);
    setcookie('bday', $bday, time()+1800);
    header('Location: index.php');
} else if (isset($_POST['reset'])) {
    setcookie('fname', $fname, time()-1);
    setcookie('bday', $bday, time()-1);
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
                            <div class="d-flex flex-column flex-lg-row align-items-center mb-1">
                                <form method="post" action="index.php">
                                    <span class="text-white lead fw-normal mb-5">Name: </span> 
                                    <input type="text" id="fullName" name="fullName" placeholder="Enter your full name    " style="background-color: white; border-radius: 5px" required><br><br>
                                    <span class="text-white lead fw-normal mb-5">Birthday: </span> 
                                    <input type="date" id="birthday" name="birthday" max='<?php echo date('Y-m-d');?>' style="background-color: white; border-radius: 5px; width: 200px" required><br><br>
                                    <input type="submit" name="send" value="  Send to the stars 🌠" style="border-radius: 10px; background-color: #FFC0CB;"><br><br>
                                </form>
                            </div>
      
                            <form method="post" action="index.php">
                                    <input type="submit" name="reset" value=" Reset 🔁" style="border-radius: 10px; background-color: #D3D3D3; "><br><br>
                            </form>
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

                            $guestInfo = "Hey, guest! The stars are re-aligning at your favor, discover what the vastness of the universe tells to your future!";

                            if (!isset($_COOKIE['fname']) && !isset($_COOKIE['bday'])) { 

                                echo $guestInfo . '<br>'; 


                            } else {

                                function calculateAge($dateOfBirth){

                                    $dateOfBirth = date("Y-m-d",strtotime($_COOKIE['bday']));

                                    $dateOfBirthObj = new DateTime($dateOfBirth);
                                    $dateNowObject = new DateTime();

                                    $difference = $dateOfBirthObj->diff($dateNowObject);

                                    //return $difference->y;

                                    if($difference->y == 0) {
                                        return 'less than a year old';
                                    } else {
                                        return $difference->y . ' years old';
                                    }



                            }

                                echo 'Hey, ' . $_COOKIE['fname'] .  '! ' . '<br>';
                                echo 'You are currently, ' . calculateAge($_COOKIE['bday']) ;
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

                                        
                                            //OVER RIDING
                                            class Zodiac {


                                                function getInformation() {
                                                    
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                     {
                                                        $monthWord = date("F",strtotime($_COOKIE['bday']));
                                                        $day =  date("d",strtotime($_COOKIE['bday']));
                                                        
                                                        //Leo
                                                        if(($monthWord == "July" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                            
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
                                                        //Taurus
                                                        else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                                            echo "Taurus is the second sign of the zodiac, considered as governing that portion of the year from about April 20 to about May 20.";
                                                        }
                                                        //Gemini
                                                        else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                                            echo "Gemini is the third sign of the zodiac, considered as governing the period from about May 21 to about June 21.";
                                                        }
                                                        //Libra
                                                        else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                                            echo "Libra is the seventh sign of the zodiac, considered as governing the period from about September 22 to about October 23. ";
                                                        }

                                                        //Cancer
                                                        else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {
                                                            echo "Cancer is the fourth sign of the zodiac, considered as governing the period from about June 22 to about July 22. ";
                                                        }

                                                        //Pisces
                                                        else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)) {
                                                            echo "Pisces is the 12th sign of the zodiac, considered as governing the period from about February 19 to about March 20. ";
                                                        }

                                                        //Aries
                                                        else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)) {
                                                            echo "Aries is the first sign of the zodiac, considered as governing the period from about March 21 to about April 19. ";
                                                        }

                                                        //Scorpio
                                                        else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)) {
                                                            echo "Scorpio is the eighth sign of the zodiac, considered as governing the period from about October 24 to about November 21.";
                                                        }

                                                        //Sagittarius
                                                        else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)) {
                                                            echo "Sagittarius is the ninth sign of the zodiac, considered as governing the period from about November 22 to about December 21.";
                                                        }

                                                        //Capricorn
                                                        else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)) {
                                                            echo "Capricorn is the 10th sign of the zodiac, considered as governing the period from about December 22 to about January 19.";
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
                                                        //Taurus
                                                        else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                                            echo "Tauruses are known to be intelligent, dependable, hardworking, dedicated, and stubborn.";
                                                        }
                                                        //Gemini
                                                        else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                                            echo "Geminis are known to be volatile beings that are inquisitive, intelligent, and great thinkers.";
                                                        }
                                                        //Libra
                                                        else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                                            echo "Libras are known to be recognized for their charm, beauty, and well-balanced personalities.";
                                                        }

                                                        //Cancer
                                                        else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {
                                                            echo "On the outside, cancers may seem cold or distant. However with time they tend to reveal their true nature, which is gentle, compassionate, and highly intuitive.";
                                                        }

                                                        //Pisces
                                                        else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)) {
                                                            echo "Pisces are known for being very emotionally aware, as well as being creative and having a colorful imagination.";
                                                        }

                                                        //Aries
                                                        else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)) {
                                                            echo "Aries are known to be adventurous, bold, and quick to initiate action with their high energy.";
                                                        }

                                                         //Scorpio
                                                         else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)) {
                                                            echo "Scorpio is one of the most misunderstood signs of the zodiac. Because of its incredible passion and power, Scorpio is often mistaken for a fire sign.";
                                                        }

                                                        //Sagittarius
                                                        else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)) {
                                                            echo "Sagittarius is a mutable sign, meaning it is associated with adaptability and flexibility. This perfectly reflects the archers' deep-rooted desire for change.";
                                                        }

                                                        //Capricorn
                                                        else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)) {
                                                            echo "Capricorns tap into their inner fortitude to overcome whatever stands between them and their long-term goals and they don’t let anything distract them from getting ahead.";
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

                                            //ABSTRACTION
                                            abstract class Information {
    
                                                public $type; //no initial value
                                                
                                                public abstract function display(); //declare bc depende sa class iimplement
                                            
                                                // public abstract function display();
                                            
                                                function __construct($type) { //needs a constructor
                                                    $this->type = $type;
                                                }
                                            }
                                            

                                            class Elements extends Information{

                                                function display() {
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($this->type));
                                                       $day =  date("d",strtotime($this->type));
                                                       
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
                                                        //Taurus
                                                        else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                                            echo "Taurus' nature is to be stable, grounded, and practical based on its earth element.";
                                                        }
                                                        //Gemini
                                                        else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                                            echo "Geminis tend to live in their heads, being logical and scientific because this is the nature of air element people.";
                                                        }
                                                        //Libra
                                                        else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                                            echo "Libras' have this harmony-seeking social butterflies trait whose hearts are drawn to art, music, dance, and connecting with others.";
                                                        }

                                                        //Cancer
                                                        else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {
                                                            echo "Cancers hold the feminine or yin energy of emotion thanks to their element of Water.";
                                                        }

                                                        //Pisces
                                                        else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)) {
                                                            echo "A Pisces' Water element allow them to be tuned in to a deeper and subtler reality than others around them.";
                                                        }

                                                        //Aries
                                                        else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)) {
                                                            echo "Much like their representative element of Fire, Aries have a radiant form of energy that brings light to the world around them.";
                                                        }
                                                         
                                                        //Scorpio
                                                         else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)) {
                                                            echo "Scorpio is a water element, just like Cancer and Pisces. Water signs are nurturing, intuitive, and sensitive.";
                                                        }

                                                        //Sagittarius
                                                        else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)) {
                                                            echo "The final fire sign of the zodiac, Sagittarius traits are unlike any other sign of the zodiac; they're totally unique to this brazen spirit.";
                                                        }

                                                        //Capricorn
                                                        else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)) {
                                                            echo "The last earth sign of the zodiac, Capricorn is represented by the sea goat, a mythological creature with the body of a goat and tail of a fish.";
                                                        }
                                                       
                                                       /*
                                                       
                                                       Dagdagan niyo dito


                                                       */



                                                       else {
                                                           echo "Among the four astrological elements associated with the Zodiac signs, are you from the Fire, Air, Water or Earth element?";
                                                       }
                                                      
                                                      
                                                     
                                                   } else {
                                                       
                                                    echo "Among the four astrological elements associated with the Zodiac signs, are you from the Fire, Air, Water or Earth element?";
                                                       
                                                   }
                                                 
                                  
                                               }
                                            }

                                            class Relationships extends Information{

                                                function display() {
                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($this->type));
                                                       $day =  date("d",strtotime($this->type));
                                                       
                                                       //Leo
                                                       if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                        echo "The most compatible signs with a Leo are Aries, Scorpio and Aquarius";
                                                        }
                                                       //Aquarius
                                                       else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            echo "The most compatible signs with an Aquarius are Aries, Sagittarius, Gemini and Libra.";
                                                        }
                                                       //Virgo
                                                       else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            echo "The most compatible signs with a Virgo are Taurus, Capricorn and fellow Virgo.";
                                                        } 
                                                        //Taurus
                                                        else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                                            echo "The most compatible signs with a Taurus are Scorpio, Virgo, and Capricorn.";
                                                        }
                                                        //Gemini
                                                        else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                                            echo "The most compatible signs with a Gemini are Aquarius, and Libra.";
                                                        }
                                                        //Libra
                                                        else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                                            echo "The most compatible signs with a Libra are Gemini and Aquarius.";
                                                        }

                                                        //Cancer
                                                        else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {
                                                            echo "The most compatible signs with a Cancer are its fellow water signs, Pisces and Scorpio.";
                                                        }

                                                        //Pisces
                                                        else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)) {
                                                            echo "The signs most compatible with Pisces are fellow water signs Cancer and Scorpio, as well as earth signs Taurus and Capricorn.";
                                                        }

                                                        //Aries
                                                        else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)) {
                                                            echo "The signs most compatible with Aries are fellow fire signs Leo and Sagittarius, as well as air signs Gemini and Aquarius.";
                                                        }

                                                        //Scorpio
                                                        else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)) {
                                                            echo "The most compatible signs for Scorpio friendships and romantic relationships are fellow water signs Cancer, other Scorpios, and Pisces, and earth signs Virgo, Taurus, and Capricorn.";
                                                        }

                                                        //Sagittarius
                                                        else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)) {
                                                            echo "The signs most compatible with Sagittarius are fellow fire signs Aries and Leo, and air signs Libra and Aquarius.";
                                                        }

                                                        //Capricorn
                                                        else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)) {
                                                            echo "The signs most compatible with Capricorn are fellow earth signs Taurus and Virgo, and water signs Scorpio and Pisces. ";
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

                                            
                                            class RulingPlanet extends Information{


                                                function display() {
                                                    global $images; 

                                                    if (isset($_COOKIE['fname']) && isset($_COOKIE['bday']))
                                                    {
                                                       $monthWord = date("F",strtotime($this->type));
                                                       $day =  date("d",strtotime($this->type));
                                                       
                                                        //Leo
                                                        if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                                            $images = "assets/img/sun.png";
                                                            echo "The Zodiac Sign Leo is ruled by the Sun which signifies royalty, warmth and energy. As the sun is center of the solar system, Leos also loves to be the center of attention and is expressive in their creativity and self-confidence.";    
                                                        }
                                                        //Aquarius
                                                        else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                                            $images = "assets/img/uranus.png";
                                                            echo "The Zodiac Sign Aquarius is ruled by the planet Uranus which signifies a person being uncommon or strange to many because they are highly unique and talented. Aguarius people are truly clever that they love being challenged and futuristic.";
                                                        }
                                                        //Virgo
                                                        else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                                            $images = "assets/img/mercury.png";
                                                            echo "The Zodiac Sign Virgo is ruled by the planet Mercury which is near to the Sun signifying that they are highly-observant people. Virgos loved to usually keep things as organize as possible, showing their keen and analytical side.";
                                                        } 
                                                        //Taurus
                                                        else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                                            $images = "assets/img/venus.png";
                                                            echo "The Zodiac Sign Taurus is ruled by the planet Venus which is the planet of love, beauty and profit, she aids Taurus in being earthy and lucky in money and love.";
                                                        }
                                                        //Gemini
                                                        else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                                            $images = "assets/img/mercury.png";
                                                            echo "The Zodiac Sign Gemini is ruled by the planet Mercury which brings Geminis their ability to open their minds and absorb and process information more quickly than any other zodiac sign..";
                                                        }
                                                        //Libra
                                                        else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                                            $images = "assets/img/venus.png";
                                                            echo "The Zodiac Sign Libra is ruled by the planet Venus which is the planet of love, harmony, and relationships. Libras are a natural mediator; they appreciate fairness and honesty while working hard to protect those they love. Their relationships mean a lot to them. They take pride in being a good friend and partner and look for those qualities in others.";
                                                        }
                                                        //Pisces
                                                        else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)) {
                                                            $images = "assets/img/neptune.png";
                                                            echo "The Zodiac Sign Pisces is ruled by the planet Neptune which is the planet of dreams, the imagination and all things spiritual. They’re overflowing with creative energy and reject the hyper-realistic. They prefer to exist in the clouds, floating above the rest of the world as they toe the line between fantasy and reality. It’s existing in this dream-like state that makes them so special.";
                                                        }
                                                        //Aries
                                                        else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)) {
                                                            $images = "assets/img/mars.png";
                                                            echo "The Zodiac Sign Aries is ruled by the planet Mars which is the planet of energy, passion and self-starting. Aries, as the first sign of the zodiac, they’re the eldest child in this family. They set the pace while the rest of the world plays catch-up. The sheer force of their determination and drive gets them where they need to go, and fast. Simply put, they’re a warrior.";
                                                        }
                                                        //Cancer
                                                        else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {
                                                            $images = "assets/img/moon.png";
                                                            echo "The Zodiac Sign Cancer is ruled by the Moon which is the planet responsible for the ebbs and flows of human emotion. They can be more sensitive than the other signs and more in touch with their inner depths. Their moods may change quickly but they’re always sure of what they are. The moon also represents the celestial “mother” figure, influencing Cancers to care deeply about the ties of home and family and develop a penchant for care-taking. ";
                                                        }
                                                        //Scorpio
                                                        else if(($monthWord == "October" && $day >= 23) || ($monthWord == "November" && $day <= 21)) {
                                                            $images = "assets/img/pluto.png";
                                                            echo "The Zodiac Sign Scorpio is ruled by the planet Pluto which is the planet of darkness, the subconscious, death and rebirth. Not exactly lighthearted stuff. But they don’t like when things are lighthearted; they crave mystery and intensity. Pluto plays a part in their never-ending fascination with all things hush-hush and underground. This ability to get in touch with their unconscious self makes them one of the most powerful signs in the zodiac.";
                                                        }
                                                        //Sagittarius
                                                        else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)) {
                                                            $images = "assets/img/jupiter.png";
                                                            echo "The Zodiac Sign Sagittarius is ruled by the planet Jupiter which is the planet of luck, good fortune and exploration. It’s definitely a mouthful, but luckily they’re always hungry for more. They’re the best adventure buddy anyone could ask for — they want to see and experience it all, and odds are they’ll have fun doing so. They have an inherent energy about them.";
                                                        }
                                                        //Capricorn
                                                        else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)) {
                                                            $images = "assets/img/saturn.png";
                                                            echo "The Zodiac Sign Capricorn is ruled by the planet Saturn which is the planet of responsibility, hard work and determination. Capricorns can be very self-critical — they’re hard on themselves when things don’t go according to plan and they always try to learn from their mistakes so they don’t happen again. Saturn’s influence makes Capricorns the ones people always want to have on their team and simultaneously the ones people don’t want to let down";
                                                        }

                                                    
                                                       /*
                                                       
                                                       Dagdagan niyo dito
                                                       gayahin niyo na lang yung pagpapalit ng picture kemerut 


                                                       */



                                                       else {
                                                        $images = "assets/img/planet.png";
                                                        echo "The Ruling Planet of the different Zodiac Signs symbolizes the kind of personality, energy and drive that a person expresses. Planets greatly influence how you act based on your cosmic characteristics.";
                                                       }
                                                      
                                                      
                                                     
                                                   } else {
                                                    $images = "assets/img/planet.png";
                                                   echo "The Ruling Planet of the different Zodiac Signs symbolizes the kind of personality, energy and drive that a person expresses. Planets greatly influence how you act based on your cosmic characteristics.";
                                                       
                                                   }
                                                 
                                  
                                               }
                                            }

                                            if (isset($_COOKIE['bday'])){
                                                $cookiebday = $_COOKIE['bday'];
                                            } else {
                                                $cookiebday = ' ';
                                            }
                                           
                                            $zodiacObject = new Zodiac();
                                            $personalityObject = new Personality();
                                            $elementObject = new Elements($cookiebday);
                                            $relationshipObject = new Relationships($cookiebday);
                                            $rulingPlanetObject = new RulingPlanet($cookiebday);
                                            

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
                                        <p class="text-muted mb-0"><?php echo $elementObject -> display(); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi-bookmark-heart-fill icon-feature text-gradient d-block mb-3"></i>
                                        <a href="relationship.php" style="color: #000000 ;" ><h3 class="font-alt">Relationship</h3></a>
                                        <p class="text-muted mb-0"><?php echo $relationshipObject -> display(); ?></p>
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
                        
                        <h2 class="display-4 lh-1 mb-4">The Ruling Planet</h2>
                        <p class="text-muted mb-0"><?php echo $rulingPlanetObject -> display(); ?></p>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="px-5 px-sm-8"><img class="img-fluid rounded-circle" src= "<?php echo $images ?>" alt="..." /></div>
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
                   
                    <!--
                        
                Pachange na lang ng mga sign sign (if-else) tapos kuhanin lang yung header na description (check docs)

                     -->

                    <!-- <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a> -->
                    
                    <?php

                        //Serialization
                        if (isset($_COOKIE['fname']) && isset($_COOKIE['bday'])) {

                            //$ser = serialize(array($response, $response));
                            //file_put_contents($_COOKIE['fname'] . ".txt", $ser);
    
                            $monthWord = date("F",strtotime($_COOKIE['bday']));
                            $day =  date("d",strtotime($_COOKIE['bday']));

                        global $response;
                        global $sign;
                        global $z;

                            //Leo
                            if(($monthWord == "08" && $day >= 23) || ($monthWord == "August" && $day <= 22)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=leo&day=today";   
                            }
                            //Aquarius
                            else if(($monthWord == "January" && $day >= 20) || ($monthWord == "February" && $day <= 18)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=aquarius&day=today";
                            }
                            //Virgo
                            else if(($monthWord == "August" && $day >= 23) || ($monthWord == "September" && $day <= 22)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=virgo&day=today"; 
                            } 
                            //Taurus
                            else if(($monthWord == "April" && $day >= 20) || ($monthWord == "May" && $day <= 20)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=taurus&day=today";
                            }
                            //Gemini
                            else if(($monthWord == "May" && $day >= 21) || ($monthWord == "June" && $day <= 20)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=gemini&day=today";
                            }
                            //Libra
                            else if(($monthWord == "September" && $day >= 23) || ($monthWord == "October" && $day <= 22)) {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=libra&day=today";
                            }
                            //Cancer
                            else if(($monthWord == "June" && $day >= 21) || ($monthWord == "July" && $day <= 22)) {                                       
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=cancer&day=today";
                            }
                            //Pisces
                            else if(($monthWord == "February" && $day >= 19) || ($monthWord == "March" && $day <= 20)){
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=pisces&day=today";
                            }
                            //Aries
                            else if(($monthWord == "March" && $day >= 21) || ($monthWord == "April" && $day <= 19)){
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=aries&day=today";
                            }
                            //Scorpio
                            else if(($monthWord == "October" && $day >= 24) || ($monthWord == "November" && $day <= 21)){
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=scorpio&day=today";
                            }
                            //Sagittarius
                            else if(($monthWord == "November" && $day >= 22) || ($monthWord == "December" && $day <= 21)){
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=sagittarius&day=today";
                            }
                            //Capricorn
                            else if(($monthWord == "December" && $day >= 22) || ($monthWord == "January" && $day <= 19)){
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=capricorn&day=today";
                            }else {
                                $z = "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=aaaa&day=today";;
                            }

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => $z,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_HTTPHEADER => [
                                "x-rapidapi-host: sameer-kumar-aztro-v1.p.rapidapi.com",
                                "x-rapidapi-key: d6e39442d6msh6c1320ff4c6cd7dp1bbbc8jsn476920cee23e"
                            ],
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            $response = "hello";
                        } else {
                            $data = json_decode($response);
                            $response = "Horoscope: " . $data->description . "<br>" . "Lucky Color: " . $data->color . "<br>" . "Lucky Time: " . $data->lucky_time . "<br>" . "Lucky Number: " . $data->lucky_number . "<br>" . "Mood: " . $data->mood;
                        }        

                        }else {
                            $response = "Find out about your horoscope, lucky color, lucky time, lucky number, and mood today. Just enter your name and birthday then send it to the stars!";
                            //$response2 = "hi";
                        }

                ?>

                 <p class="text-white fw-normal text-white-50"><i>Horoscopes are automatically saved in text file</i></p>
                 <p class="text-white lead fw-normal"><?php echo $response?></p>
                 <!-- <p class="text-white lead fw-normal"><?php echo $response2?></p> -->

                    
                    <?php
                        /*global $response;
                        global $sign; 

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=aquarius&day=today",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_HTTPHEADER => [
                                "x-rapidapi-host: sameer-kumar-aztro-v1.p.rapidapi.com",
                                "x-rapidapi-key: d6e39442d6msh6c1320ff4c6cd7dp1bbbc8jsn476920cee23e"
                            ],
                        ]);

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            $response = $err;
                        } else {
                            $response;
                        } */
                ?>
                
                 <!-- <p class="btn-outline-light py-3 px-4"><?php echo $response?></p> -->
                
                </div>
            </div>
        </section>
       
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Gurlalu Productions 2021</div>
                   Dionson
                    <span class="mx-1">&middot;</span>
                   Loseñada
                    <span class="mx-1">&middot;</span>
                   Ong
                    <span class="mx-1">&middot;</span>
                   Valenzuela
                </div>
            </div>
            <div class="container px-5">
                <div class="text-white-50 small">
                   Sources
                    <span class="mx-1">&middot;</span>
                   Britannica.com
                    <span class="mx-1">&middot;</span>
                   Shapes.com
                    <span class="mx-1">&middot;</span>
                    Allure.com
                    <span class="mx-1">&middot;</span>
                   Thoughtco.com
                   <span class="mx-1">&middot;</span>
                   Space.com
                   <span class="mx-1">&middot;</span>
                   Tarot.com
                   <span class="mx-1">&middot;</span>
                   Indiatimes.com
                   <span class="mx-1">&middot;</span>
                   
        
            </div>
        </footer>
   
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
