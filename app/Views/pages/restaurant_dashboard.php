<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Dashboard</title>
    </head>
    <body>
    <h3 class="text-center mt-4"> Welcome to FoodShala </h3>
    <div>
    <a class="btn btn-success " href="/registration/view/add_menu_item"> Add Food Item </a></br></br></br>
    <a class="btn btn-success" href="/registration/view/"> View orders </a></br></br></br>
    </div>
    <div class="dash-table m-4">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Restaurant Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Type</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($food as $row):?>
            <tr>
                <td><?= $row['name'];?></td>
                <td><?= $row['restaurant_name']?></td>
                <td><?= $row['description'];?></td>
                <td><?= $row['price']; ?></td>
                <td><img style="width:100px; height:100px;" src="<?=base_url().'/'.$row['Image'] ?>"> </td>
                <td><?= $row['type']; ?> </td>
                <td><?= $row['is_active'];?> </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
    </body>
</html>