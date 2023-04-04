<?php

session_start();
const servername = 'localhost';
const username = 'root';
const password = '';
const dbname = 'project_news';

$conn=mysqli_connect(servername,username,password,dbname);

if(mysqli_connect_error()){
    echo "connection error";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news site</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container1">

            <div class="menu text-right" style="background: #C80000">
                <ul>
                    <li>
                        <a href="Home.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="serch.php">Search</a>
                    </li>
                    <li>
                        <a href="Home.php">Back</a>
                    </li>
                </ul>
            </div>



            <div class="clearfix"></div>
        </div>
    </section>

    <section class="news-search text-center">
        <div class="container">

        </div>
    </section>
    <section class="search1 text-center">
        <div class="container1">

            <form action="serch.php" method="POST">

                <input type="search" name="search" placeholder="Search For News.." required size="100px" width="80px" class="container3">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->

<?php $sql="select * from news where featured='Yes' and active='Yes' limit 1";
$result=mysqli_query($conn,$sql);
if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $featured = $row['featured'];
        $active = $row['active'];
        $image_name = $row['image_name'];
    }
}
?>


    <section class="news-menu">
        <div class="container">
            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/buten.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">political news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>Putin's Victory Day speech</h4>

                    <p class="detail1">
                        Putin in his Victory Day speech that NATO represents a "clear threat" .
                    </p>
                    <br>

                    <a href="detalis_polistical.html" class="btn btn-primary">The Details</a>
                </div>
            </div>


            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/sports news/alahlay.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">sports news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>African Champions League</h4>

                    <p class="detail1">
                        Al-Ahly of Egypt demands that the final match be held on a neutral ground
                    </p>
                    <br>

                    <a href="detalis_sports.html" class="btn btn-primary">The Details</a>
                </div>
            </div>

            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/business news/btkuin.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">business news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>Bitcoin</h4>

                    <p class="detail1">
                        The largest digital currency loses half its value in seven months
                    </p>
                    <br>

                    <a href="detalis_business.html" class="btn btn-primary">The Details</a>
                </div>
            </div>

            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/cultural news/ctr1.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">cultural news</h3>
                </div>
                <div class="menu-desc1">
                    <h4>Canaanite goddess statue</h4>
                    <p class="detail1">
                        A farmer in Gaza finds a 4,500-year-old statue of a Canaanite goddess
                    </p>
                    <br>

                    <a href="detalis_cultural.html" class="btn btn-primary">The Details</a>
                </div>
            </div>

            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/art news/art1.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">art news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>Wrongly drawn on it...</h4>

                    <p class="detail1">
                        Two visitors deface a painting worth about $500,000
                    </p>
                    <br>

                    <a href="detalis_art.html" class="btn btn-primary">The Details</a>
                </div>
            </div>

            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/religious news/rg1.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">religious news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>amnat wadud</h4>

                    <p class="detail1">
                        Who is the Islamic thinker that has challenged for decades?
                    </p>
                    <br>

                    <a href="detalis_religious.html" class="btn btn-primary">The Details</a>
                </div>
            </div>
            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/Health news/hel1.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">Health news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>Corona Virus</h4>

                    <p class="detail1">
                        A medical laboratory reaches hundreds in Sydney, Australia, false negative results
                    </p>
                    <br>

                    <a href="detalis_Health.html" class="btn btn-primary">The Details</a>
                </div>
            </div>
            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="images/scinse/sin1.jpg" alt="buten" class="img-responsive img-curve">
                    <h3 style="font-size: 2rem;margin-left:15px">science news</h3>
                </div>

                <div class="menu-desc1">
                    <h4>DNA structure</h4>

                    <p class="detail1">
                        How did the discovery of the structure of DNA lead about 70 years ago?
                    </p>
                    <br>

                    <a href="detalis_scinse.html" class="btn btn-primary">The Details </a>
                </div>
            </div>



            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="categories.php"> <u style="background: #900d0c;color: #ffffff;font-size: 20px;border-radius: 5px;font-size: 2rem">Browse Categories</u></a>
        </p>
    </section>

    <section class="social">
        <div class="container5 text-center">
            <ul>
                <li>
                    <a href="https://www.facebook.com/BBCnewsArabic/"><img src="images/scoialmedya/pngegg55.png" width="50px" height="45px"/></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/bbcarabic/"><img src="images/scoialmedya/pngegg (1).png" width="40px" height="40px"/></a>
                </li>
                <li>
                    <a href="https://twitter.com/bbcarabic?lang=ar-x-fm"><img src="images/scoialmedya/ffg.png" width="40px" height="40px"/></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UCelk6aHijZq-GJBBB9YpReA"><img src="images/scoialmedya/pngegg11.png" width="40px" height="45px"/></a>
                </li>
            </ul>
        </div>
    </section>


</body>
</html>