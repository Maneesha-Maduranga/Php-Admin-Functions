<?php include '../config/db.php' ?>

<?php 

    $sql = "SELECT id,name,price,quantity,discount FROM item";

    $result = mysqli_query($conn,$sql);

    $item = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);

?>








<?php include '../Frontend/Temp/header.php' ?>


<div class="grid md:px-8 py-2 md:grid-cols-5 gap-2">
      <?php foreach ($item as $oneItem) : ?>

        <form action="cart.php?id=<?php echo htmlspecialchars($oneItem['id']) ?>" method="post">
        <div class="card w-64 p-3 bg-base-50 shadow-xl  sm:w-48px-2">
          <figure><img src="./img/phone.jpg" alt="Shoes" /></figure>
          <div class="card-body">
            <h6><?php echo htmlspecialchars($oneItem['name']) ?></h6>
            <p class="text-sm ..."> Price : <?php echo htmlspecialchars($oneItem['price']) ?> <br>
              Discount :<?php echo htmlspecialchars($oneItem['discount']) ?> <br>
              Quantity :<?php echo htmlspecialchars($oneItem['quantity']) ?> <br>


            </p>
            <div class="card-actions justify-end">
              
                <input type="submit" name="Update" value="Add To Cart" class="btn  btn-info btn-xs">
             
            </div>
          </div>
        </div>
        </form>
      <?php endforeach; ?>
      </div>





<?php include '../Frontend/Temp/footer.php' ?>


