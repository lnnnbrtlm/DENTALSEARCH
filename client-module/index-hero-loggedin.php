<div class="container text-center text-md-start pt-3 pb-4">
  <div class="row text-center">

    <div class="col-md-6 col-lg-6 col-xl-6 my-auto text-light text-center text-md-end">
      <?php

      $query1 = "SELECT * FROM content WHERE content_id= 1";
      $query_run1 = mysqli_query($conn, $query1);
      while ($row = mysqli_fetch_array($query_run1)) {
      ?>
        <h1><?php echo $row['homepage_header']; ?> </h1>
        <p><?php echo $row['homepage_description']; ?></p>
        <!-- <h1>A perfect smile guaranteed.</h1> -->
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam metus eros, tempor quis nunc in, sagittis blandit risus. Maecenas sit amet leo non purus congue ultrices.</p> -->
      <?php } ?>

    </div>

    <div class="col-md-6 col-lg-6 col-xl-6 mx-auto">
      <img src="img/hero-logo.png" style="height: 300px">
    </div>

  </div>
</div>