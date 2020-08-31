<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/'.$fruit['image']); ?>" class="img-fluid">
                    </div>
                    <div class="col-md-4">
                        <h5 class="card-title">Fruit Name : <?= $fruit['name']; ?></h5></li>
                        <h6 class="card-subtitle mb-2 text-muted">Price : <?= $fruit['price']; ?></h6></li>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="<?= site_url('fruits'); ?>" class="btn btn-info btn-circle">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->