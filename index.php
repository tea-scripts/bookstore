<!-- || DB || -->
<?php include "includes/db.php"; ?>

<!-- || Header || -->
<?php include "includes/header.php"; ?>      

<!-- || Navigation || -->
<?php include "includes/navigation.php"; ?>      

<div class="hero">
  <div class="hero-banner">
    <h1>Books are freedom</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque
            exercitationem molestias tempora quisquam in aspernatur.
          </p>
          <a href="#featured" class="btn hero-btn scroll-link">explore</a>
        </div>
      </div>
</header>
<div class="container">
  <!-- Books -->
    <section class="section books">
      <!-- section title -->
      <div class="section-title">
        <h1>our <span>bookshelf</span></h1>
        <!-- <div class="underline"></div> -->
      </div>
      <div class="section-center books-page-center">
      <!-- end of section title -->
      <?php
      $stmt = "SELECT * FROM books WHERE book_status = 'published'";
      $result = mysqli_query($connection, $stmt);
      
      while($row = mysqli_fetch_assoc($result)) {
        $book_id = $row['book_id'];
        $book_name = $row['book_name'];
        $book_publisher = $row['book_publisher'];
        $book_author = $row['book_author'];
        $book_price = $row['book_price'];
        $book_status = $row['book_status'];
        $book_image = $row['book_image'];
        $book_category_id = $row['book_category_id'];
        
        ?>

        <!-- single book -->
        <?php echo "<article class='single-book'>"; ?>
          <div class="book-container">
            <img src="./images/<?php echo $book_image; ?>" alt="<?php echo $book_name; ?>" />
          </div>
          <div class="book-details">
            <h4><a href="single-book.php?b_id=<?php echo $book_id; ?>"><?php echo $book_name; ?></a></h4>
            <p>by <?php echo $book_author; ?></p>
            <p><?php echo $book_publisher; ?></p>
            
            <!-- Category Query -->
            <?php
            $stmt = "SELECT * FROM categories WHERE category_id = {$book_category_id}";
            $select_categories = mysqli_query($connection, $stmt);

            while($row = mysqli_fetch_assoc($select_categories)) {
              $cat_id = $row['category_id'];
              $cat_title = $row['category'];
            }
            ?>
            <p><?php echo $cat_title; ?></p>

            <p>price: $<?php echo $book_price; ?></p>
          </div>
          <a href="single-book.php?b_id=<?php echo $book_id; ?>" class="btn book-btn">view book</a>
        </article>
        <!-- end of single book -->
        
        
        
        
        <?php } ?>
        
      </div> <!-- enf of section-center books-page-center -->
    </section>
    <!-- end of books -->

    <!-- sidebar -->
    <?php include "includes/sidebar.php"; ?>
    <!-- end of sidebar -->

<!-- end of container -->

    <!-- featured -->
    <section id="featured" class="section">
      <!-- section title -->
      <div class="section-title">
        <h1>featured <span>books</span></h1>
        <!-- <div class="underline"></div> -->
        <br><br>
        <h2>Coming Soon...</h2>
      </div>
      <!-- end of section title -->
    </section>
    <!-- end of featured -->
    
  <!-- || Footer|| -->
    <?php include "includes/footer.php"; ?>