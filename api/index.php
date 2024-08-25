<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gold Calculator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .custom-bg {
    background-color: #f8f9fa;
    }
  </style>
</head>

<body>
  <?php
  $weight_in_pae = null;
  $actual_price = null;
  $service_charges = null;

  if (isset($_POST['gram_weight']) && isset($_POST['selling_price']) && isset($_POST['market_price'])) {
    $gram_weight = (float)$_POST['gram_weight'];
    $selling_price = (float)$_POST['selling_price'];
    $market_price = (float)$_POST['market_price'];

    $weight_in_pae = $gram_weight / 1.0205;
    $actual_price = $weight_in_pae * ($market_price / 16);
    $service_charges = $selling_price - $actual_price;

    $weight_in_pae = number_format($weight_in_pae, 2);
    $actual_price = number_format($actual_price);
    $service_charges = number_format($service_charges);
  }
  ?>
  <div class="container-md">
    <h2 class="text-center my-3">Gold Calculator</h2>
    <div class="row justify-content-center">
      <div class="col col-4">
        <form action="index.php" method="post" class="custom-bg p-3">
          <div class="my-3">
            <label for="gram-weight" class="form-label">ရွှေအလေးချိန် (ဂရမ်ဖြင့်)</label>
            <input name="gram_weight" type="number" class="form-control" id="gram-weight" step="0.01" value="<?php echo $gram_weight; ?>">
          </div>
          <div class="mb-3">
            <label for="selling-price" class="form-label">ပစ္စည်းတန်ဖိုး (ကျပ်)</label>
            <input name="selling_price" type="number" class="form-control" id="selling-price" value="<?php echo $selling_price; ?>">
          </div>
          <div class="mb-3">
            <label for="market-price" class="form-label">ဈေးကွက်ပေါက်ဈေး (ကျပ်)</label>
            <input name="market_price" type="number" class="form-control" id="market-price" value="<?php echo $market_price; ?>">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">တွက်ရန်</button>
          </div>
          <div class="mb-3">
            <div class="card">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">ရွှေအလေးချိန် = <?php echo $weight_in_pae; ?> ပဲ</li>
                <li class="list-group-item">ရွှေတန်ဖိုး = <?php echo $actual_price; ?> ကျပ်</li>
                <li class="list-group-item">လက်ခ = <?php echo $service_charges; ?> ကျပ်</li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>