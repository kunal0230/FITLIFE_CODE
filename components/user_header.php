<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Fit Life<span></span></a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="about.php">about</a>
         <a href="blog.php">Blog</a>
         <a href="leaderboard.php">Leaderboard</a>
         <a href="contact.php">Messages</a>
         <span onclick="redirectToLocalhost()" style="cursor: pointer; font-weight: bold;">Try Pose Detection</span>

<script>
  function redirectToLocalhost() {
    window.location.href = 'http://localhost:8080/';
  }
</script>

         <!-- <button onclick="redirectToLocalhost()"><b>Try Pose Detection</b></button>

<script>
  function redirectToLocalhost() {
    window.location.href = 'http://localhost:8080/';
  }
</script> -->
      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <!-- <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a> -->
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" style="text-decoration: none;    text-decoration: none;
    background: cadetblue;" class="option-btn">update profile</a>
         <div class="flex-btn">




            <a href="http://127.0.0.1:5501/ETA_2_data%20output/integrated.html" style="padding: 20px;border-radius: 10px;text-decoration: none;" class="option-btn">Insights</a>
            <a href="user.php" class="option-btn" style="height: 64px;border-radius: 10px;
            text-decoration: none;">User Profile</a>
         
      
      
      
      </div>
         <a href="components/user_logout.php" style="text-decoration: none;" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>