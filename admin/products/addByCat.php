<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form class="mt-4 d-flex flex-column gap-2" id="add-product" action="index.php?act=add-product" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
        <br>
        <h2 class="text-center text-primary">Thêm sản phẩm</h2>
        <div class="form-group">
            <label>Category</label>
            <select name="category" id="">
                <?php
                require_once '../model/category.php';
                if(isset($_GET['id_dm'])){
                    $id_dm = $_GET['id_dm'];
                    $cat = LoadById($id_dm);
                    ?>
                    <option value="<?=$id_dm?>"> <?=$cat[0]['name_dm']?></option>
                    <?php } ?>
            </select>
        </div> <br>
       
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Enter product name" id="product_name" name="product_name">
            <span id="nameError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" class="form-control" placeholder="Enter product price" id="product_price" name="product_price">
            <span id="priceError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea type="text" class="form-control" placeholder="Enter product desc" id="product_desc" name="product_desc"></textarea>
            <span id="descError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" class="form-control" placeholder="Enter product image" id="product_avatar" name="product_avatar">
            <span id="avatarError" class="error"></span>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" class="form-control" placeholder="Enter product quantity" id="product_quantity" name="product_quantity">
            <span id="quantityError" class="error"></span>
        </div>

        <div class="d-flex justify-content-between"> 
            <button type="submit" class="btn btn-primary w-25 mt-4" name="submit">Submit</button>
            <button type="reset" class="btn btn-warning text-white w-25 mt-4">Reset</button>
        </div>
    </form>

    <script>
        function validateForm() {
            var name = document.getElementById("product_name").value;
            var price = document.getElementById("product_price").value;
            var desc = document.getElementById("product_desc").value;
            var avatar = document.getElementById("product_avatar").value;
            var quantity = document.getElementById("product_quantity").value;

            var nameError = document.getElementById("nameError");
            var priceError = document.getElementById("priceError");
            var descError = document.getElementById("descError");
            var avatarError = document.getElementById("avatarError");
            var quantityError = document.getElementById("quantityError");

            nameError.textContent = "";
            priceError.textContent = "";
            descError.textContent = "";
            avatarError.textContent = "";
            quantityError.textContent = "";

            if (name === "") {
                nameError.textContent = "Tên sản phẩm không được để trống";
                return false;
            }

            if (price === "") {
                priceError.textContent = "Giá sản phẩm không được để trống";
                return false;
            }

            if (desc === "") {
                descError.textContent = "Mô tả sản phẩm không được để trống";
                return false;
            }

            if (avatar === "") {
                avatarError.textContent = "Ảnh sản phẩm không được để trống";
                return false;
            }

            if (quantity === "") {
                quantityError.textContent = "Số lượng sản phẩm không được để trống";
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
