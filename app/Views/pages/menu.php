<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Dashboard</title>   
    </head>
    <body>
    <h3 class="text-center mt-4"> Welcome to FoodShala </h3>
    <h5 class="m-4"> Menu </h5>
    <div class="menu-table m-4">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Image</th> 
                <th scope="col">Restaurant Name</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($food as $row):?>
            <?php if($row['is_active'] == 1): ?>
            <tr>
            <td><img style="width:100px; height:100px;" src="<?=base_url().'/'.$row['Image'] ?>"> </td>
              <td> <?=$row['restaurant_name']?></td>
                <td><?= $row['name']; ?> </td>
                <td><?= $row['description'];?></td>
                <td><?= $row['price']; ?></td>
                <td><?= $row['type']; ?> </td>
                <?php if(!session()->get('success')):?>
                <td><a href="/registration/view" class="btn btn-success" role="button"> Order now </a></td>
                <?php else:?>
                    <td><a id="order-btn" href="/registration/order" class="btn btn-success" role="button"> Order now </a></td>
                <?php endif; ?>
            </tr>
            <?php endif;?>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
    </body>
    <script>
         var accountType =  "<?php echo session()->get('account_type') ?>";
         if(accountType == "restaurant"){
            document.getElementById('order-btn').classList.add('disabled');
         }
    </script> 
</html>
