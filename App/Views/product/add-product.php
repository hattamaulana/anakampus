<?php
# Testing Code
// die(print_r($data)); ?>

<?php require_once __DIR__.'/../templates/header-seller.php' ?>
<?php require_once __DIR__.'/../templates/left-sidebar-seller.php' ?>

<div class="dashboard-wrapper">
  <div class="container-fluid dashboard-content">
    <div class="row">
      <div class="col-xl-10">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Tambah Produk Baru</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Produk</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end pageheader  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- basic form  -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Produk Baru</h5>
                        <div class="card-body">
                            <form method="post" action="/product-add" enctype="multipart/form-data">
                              <div class="form-group">
                                <label>Photo Produk</label>
                                <div class="custom-file mb-3">
                                  <input type="file" name="photo" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Photo Produk</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputText3" class="col-form-label">Nama Produk</label>
                                <input id="inputText3" name="name" type="text" class="form-control" placeholder="Nama">
                              </div>

                              <div class="form-group">
                                <label for="input-select">Jenis Produk</label>
                                <select class="form-control" id="input-select" name="type" value="sticker">
                                    <option value="sticker">Sticker</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="hoodie">Hoodie</option>
                                </select>
                              </div>
                                
                                <div class="form-group">
                                  <label> Harga Produk </label>
                                  <div class="input-group mb-3">
                                    <span class="input-group-prepend">
                                      <span class="input-group-text">
                                        Rp. 
                                      </span>
                                    </span>
                                    
                                    <input type="text" name="price" class="form-control">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <h5> Ukuran yang disediakan </h5>

                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" value="XXL" name="size[]" class="custom-control-input"><span class="custom-control-label">XXL</span>
                                  </label>

                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="size[]" value="XL"class="custom-control-input"><span class="custom-control-label">XL</span>
                                  </label>

                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="size[]" value="L" class="custom-control-input"><span class="custom-control-label">L</span>
                                  </label>

                                  <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="size[]" value="M" class="custom-control-input"><span class="custom-control-label">M</span>
                                  </label>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
                                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <button tabindex="-1" type="submit" class="btn btn-secondary">
                                  Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- sidenavbar -->
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
            <div class="sidebar-nav-fixed">
                <ul class="list-unstyled">
                    <li><a href="#overview" class="active">Bio Toko</a></li>
                    <li><a href="#alamat-toko">Alamat Toko</a></li>
                    <li><a href="#top">Back to Top</a></li>
                </ul>
            </div>
        </div>
        <!-- end sidenavbar -->
        <!-- ============================================================== -->
    </div>
</div>

<?php require_once __DIR__.'/../templates/footer-seller.php' ?>