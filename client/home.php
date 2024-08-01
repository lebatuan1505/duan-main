<style>
  .product .overlay {
    display: none;
    transition: opacity 0.5s;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .product:hover .overlay {
    display: flex;
    opacity: 1;


  }

  .product .overlay .content button {
    display: none;
  }


  .product:hover .overlay .content button {
    display: block;
  }
</style>

<body>

  <div class="container">
    <!-- Phần banner  -->
    <div class="row">
      <div class="col">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-interval="2000">

          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
          </ol>
          <div class="carousel-inner" style="height: 520px">
            <div class="carousel-item active" style="">
              <img src="https://i.ytimg.com/vi/OEKq7nQ9cZQ/maxresdefault.jpg" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
              <a href="index.php?act=all-product "> <img
                  src="https://img.zcool.cn/community/0199b35785d16e0000018c1b27c982.jpg@1280w_1l_2o_100sh.jpg"
                  class="d-block w-100" alt="Image 2"></a>
            </div>
            <div class="carousel-item">
              <img src="https://socalskateshop.com/mm5/graphics/00000001/37/Vans.jpg" class="d-block w-100"
                alt="Image 3">
            </div>
            <div class="carousel-item h-100">
              <img src="https://file.hstatic.net/1000230642/collection/3_da9a91027cd0488581c18e767bd6e453.jpg"
                class="d-block w-100 h-100" alt="Image 4">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>

    </div>

    <hr>
  </div> <br>
  <br>
  <!-- hết banner  -->


  <div class="service-area">
    <div class="container">
      <div class="service-nav">
        <div class="row">
          <div class="col">
            <div class="service-item">
              <div class="content text-center">
                <h4>Miễn phí vận chuyển</h4>
                <p>Miễn phí vẫn chuyển cho mọi đơn hàng</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="service-item">
              <div class="content text-center">
                <h4>Hoàn tiền</h4>
                <p>Bạn có 30 ngày đổi trả miễn phí</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="service-item">
              <div class="content text-center">
                <h4>Hỗ trợ trực tuyến</h4>
                <p>Hỗ trợ 24/24</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="container">
  <div class="product-area ">
    <div class="container ">

      <div class="row d-flex ">
        <div class="col-lg-12">
          <div class="section-title ">
            <h3 class="text-center">Sản phẩm nổi bật</h3>
            <div class="product-arrow"></div>
          </div>
        </div>
        <?php
        require_once '../model/List.php';
        $listProduct = top6Product();
        foreach ($listProduct as $sp) { ?>
          <div class="col-3  mt-3 mb-3 d-flex justify-content-center ">
            <a href="?act=viewProduct&id_sp=<?= $sp['id_sp'] ?>&id_dm=<?= $sp['id_dm'] ?>" class="text-black"
              style="text-decoration: none;">
              <form action="?act=add-to-cart" method="POST" enctype="multipart/form-data" class="position-relative">
                <div class="product me-2">
                  <input type="hidden" name="id_sp" value="<?= $sp['id_sp'] ?>">
                  <div class="overflow-hidden w-100" style="height: 300px;">
                    <img src="../img/<?= $sp['image_sp'] ?>" alt="Product 1" 
                      class="justify-content-center w-100 h-100">
                  </div>
                  <input type="hidden" name="image_sp" value="<?= $sp['image_sp'] ?>">
                  <input type="hidden" name="soluongcart" value="1">
                  <div class="overlay">
                    <div class="content">
                      <p><?= $sp['name_sp'] ?></p>
                      <input type="hidden" name="name_sp" value="<?= $sp['name_sp'] ?>">
                      <p class="text-danger fw-bold"><?= number_format((int) $sp['price_sp'], 0, ",", ".") ?>₫ </p>
                      <input type="hidden" name="price_sp" value="<?= $sp['price_sp'] ?>">
                      <button type="submit" name="addToCart"
                        class="border-0 p-3 position-absolute text-black  top-0 start-0 translate-middl"><i
                          class="fa-solid fa-cart-plus fa-xl"></i>
                      </button>


                    </div>
                  </div>
                </div>
              </form>
            </a>
          </div>
        <?php } ?>

      </div>
      <hr class="container mb-5">
      <div class="row d-flex ">
        <div class="col-lg-12">
          <div class="section-title ">
            <h3 class="text-center">Sản phẩm mới</h3>
            <div class="product-arrow"></div>
          </div>
        </div>
        <?php
        require_once '../model/List.php';
        $listProduct = NewProduct();
        foreach ($listProduct as $sp) { ?>
          <div class="col-3  mt-3 mb-3 d-flex justify-content-center" style="">
            <a href="?act=viewProduct&id_sp=<?= $sp['id_sp'] ?>&id_dm=<?= $sp['id_dm'] ?>" class="text-black"
              style="text-decoration: none;">
              <form action="?act=add-to-cart" method="POST" enctype="multipart/form-data" class="position-relative">
                <div class="product me-2">
                  <input type="hidden" name="id_sp" value="<?= $sp['id_sp'] ?>">
                  <img id="image" src="../img/<?= $sp['image_sp'] ?>" alt="Product 1" class="w-100 "
                    style="height: 250px;">
                  <input type="hidden" name="image_sp" value="<?= $sp['image_sp'] ?>">
                  <input type="hidden" name="soluongcart" value="1">
                  <input type="hidden" name="selectedSize" value="0">
                  <div class="overlay">
                    <div class="content">
                      <p><?= $sp['name_sp'] ?></p>
                      <input type="hidden" name="name_sp" value="<?= $sp['name_sp'] ?>">
                      <p class="text-danger fw-bold"><?= number_format((int) $sp['price_sp'], 0, ",", ".") ?>₫ </p>
                      <input type="hidden" name="price_sp" value="<?= $sp['price_sp'] ?>">
                      <button type="submit" name="addToCart"
                        class="border-0 p-3 position-absolute text-black  top-0 start-0 translate-middl"><i
                          class="fa-solid fa-cart-plus fa-xl"></i> </button>
                      <a name="" class="btn btn-danger   position-absolute text-white  top-0 end-0 "><span>Mới ra mắt
                        </span></a>


                    </div>
                  </div>
                </div>
              </form>
            </a>
          </div>
        <?php } ?>




      </div>

      <br>
      <br>
    </div>

    <div class="container">
      <hr>
      <h3 class="text-center">KHÁCH HÀNG CỦA 8 FOOTBALL</h3>
      <img src="../img/banner-giua.jpg" alt="" width="100%">
    </div>

</body>