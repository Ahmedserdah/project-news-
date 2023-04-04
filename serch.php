<?php
include "layouts/menu.php";
session_start();
const servername = 'localhost';
const username = 'root';
const password = '';
const dbname = 'project_news';

$conn=mysqli_connect(servername,username,password,dbname);

if(mysqli_connect_error()){
    echo "connection error";
}

$key_word = $_POST['search'];
?>





<section class="news-search text-center">
    <div class="container">


    </div>
</section>

<section class="news-search1 text-center1">
    <div class="container11">

        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $key_word?></a></h2>

    </div>
</section>


    <section class="menu1">
        <div class="container">
            <h2 class="text-center">search</h2>

            <?php



            $sql="select * from news where title LIKE '%$key_word%' or description LIKE '%$key_word%' limit 8";
           $result =mysqli_query($conn,$sql);
           if($result->num_rows){
                while ($row=$result->fetch_assoc()){
                   $id=$row['id'];
                   $title=$row['title'];
                   $description=$row['description'];
                   $featured=$row['featured'];
                   $active=$row['active'];
                   $image_name=$row['image_name'];


            ?>

            <div class="menu-box1">
                <div class="menu-img1">
                    <img src="<?php echo $image_name?>" alt="buten" class="img-responsive img-curve">
                </div>

                <div class="menu-desc1">
                    <h4><?php echo $title?></h4>

                    <p class="detail1">
                        <?php echo $description?>
                    </p>
                    <br>

                    <a href="political news.html" class="btn btn-primary">The Details</a>
                </div>
            </div>

            <?php
                }
           }
            ?>
            <div class="clearfix"></div>


        </div>

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
