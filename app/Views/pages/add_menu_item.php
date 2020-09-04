<h2 class="display-4"> Add Food Items </h2>
<form class="m-4" action="/registration/saveFood" method="post" enctype="multipart/form-data" >
<div class="form-group">
    <lable for="item-name">Name</lable>
    <input type="text" class="form-control" name="food-name">
</div>
<div class="form-group">
    <lable for="item-description">Description</lable>
    <input type="textarea" class="form-control" name="food-description">
</div>
<div class="form-group">
    <lable for="item-price">Price</lable>
    <input type="text" class="form-control" name="food-price">
</div>
<div class="form-group">
    <lable for="item-img">Image</lable>
    <input type="file" class="form-control" name="food-img" />
</div>
<div class="form-group">
    <lable for="item-type">Type</lable>
    <input type="text" class="form-control" name="food-type">
</div>
<div class="form-group">
<select class="custom-select" name="food-status">
  <option selected>Status</option>
  <option value="1">Enable</option>
  <option value="0">Disable</option>
</select>
</div>
<button type="submit" class="btn btn-success"> Add food item </button>
</form>