<?php
session_start();

include("../config/db.php");
include("functions.php");

$user_data = checkLogin($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    unset($_SESSION["user_id"]);
    header("Location: /GalaxyStore/index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GalaxyStore</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.43.2/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="flex flex-col justify-between h-screen">
<div class="navbar bg-base-100">
  <div class="flex-1">
    <a href="/GalaxyStore/index.php"><img src="https://cdn-icons-png.flaticon.com/512/2991/2991473.png" alt="" class="w-8">
    <h1 class="text-2xl px-2">Galaxy Store</h1>
    </a>
  </div>
  <div>
    <form method="post">
      <div class="w-full px-3 mb-1">
          <button type="submit"
              class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold cursor-pointer">
              Logout</button>
      </div>
    </form>
  </div>
</div>

<?php

//To Load The Store Item 

$sql = "SELECT id,name,price,quantity,discount FROM item";

$result = mysqli_query($conn, $sql);

$item = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>


<div class="grid md:px-8 py-2 md:grid-cols-5 gap-2">
  <?php foreach ($item as $oneItem): ?>

    <form action="cart.php" method="POST">

      <div class="card w-64 p-3 bg-base-50 shadow-xl  sm:w-48px-2">

        <figure><img src="./img/phone.jpg" alt="Shoes" /></figure>
        <div class="card-body">
          <h6>
            <?php echo htmlspecialchars($oneItem['name']) ?>
          </h6>
          <p class="text-sm ..."> Price : <?php echo htmlspecialchars($oneItem['price']) ?> <br>
            Availble Item : <?php echo htmlspecialchars($oneItem['quantity']) ?> <br>
            Item Discount : <?php echo htmlentities($oneItem['discount']) ?>
          </p>
          <input type="text" placeholder="Enter Quantity" name="quantity"
            class="input input-bordered input-sm w-full max-w-xs" />
          <input type="hidden" name="id" value="<?php echo $oneItem['id'] ?>">
          <input type="hidden" name="Name" value="<?php echo $oneItem['name'] ?>">
          <input type="hidden" name="Price" value="<?php echo $oneItem['price'] ?>">
          <input type="hidden" name="Discount" value="<?php echo $oneItem['discount'] ?>">


          </p>
          <div class="card-actions justify-end">

            <input type="submit" name="Update" value="Add To Cart" class="btn  btn-info btn-xs">

          </div>
        </div>
      </div>
    </form>
    <?php endforeach; ?>
</div>

<?php include '../Temp/footer.php' ?>