<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> FoodShala App </title>
    <style>
        .header-top{
            text-align: center;
         background-color: rosybrown;
         height: 100px;
    display: grid;
    color: white;
}
.main-content{
    height: 550px;
}
.login-register-block{
    border-right: 1px solid grey;
}
.login-register-block,.order-now{
    margin: 50px 10px 5px 40px;
}
.register-btn{
    margin-top: 20px;
}
.register-link{
    text-align: center;
    margin-top: 50px;
}
.footer{
    text-align: center;
    background-color: rosybrown;
    height: 55px;
    font-size: 20px;
    display: inline-block;
    width: 100%;
    color: white;
    padding-top: 20px;
}

    </style>
</head>
<body>
   <div class="header-top">
    <h1> FoodShala App </h1>
    </div>
<div class="nav-menu">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#e4dede;">
  <a class="navbar-brand"><?= $title ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="/registration/menu/">Menu <span class="sr-only">(current)</span></a>
      </li>
      <?php if(session()->get('account_type') == "restaurant"): ?>
        <li class="nav-item">
        <a class="nav-link" href="/registration/getFoodItems">Restaurant Dashboard</a>
      </li>
      <?php endif;?>
      <?php if (session()->get('success')): ?>
      <li class="nav-item">
        <a class="nav-link btn btn-outline-secondary" href="/registration/logout/">Logout<span class="sr-only">(current)</span></a>
      </li>
      <?php else:?>
      <li class="nav-item">
        <a class="nav-link" href="/registration/view/">Login </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/registration/view/">Register</a>
      </li>
      <?php endif;?>
    </ul>
  </div>
</nav>
    </div>
</body>
