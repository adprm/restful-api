<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-3">
        <div class="card-header">
        	<a href="<?php echo site_url('fruits') ?>"><i class="fas fa-arrow-left"></i> List Fruits</a>
        </div>

        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $fruit['id']; ?>" />
                <!-- edit name -->
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $fruit['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- edit price -->
                <div class="form-group">
                    <label for="price">Price*</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?= $fruit['price']; ?>">
                    <?= form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url('assets/img/'.$fruit['image']); ?>" width="100" />
                </div>
                <div class="form-group">
                    <label for="image">Photo</label>
                    <input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
                     type="file" name="image" />
                    <input type="hidden" name="old_image" value="<?php echo $fruit['image'] ?>" />
                    <div class="invalid-feedback">
                    	<?php echo form_error('image') ?>
                    </div>
                </div>
                <!-- button save -->
                <input class="btn btn-success" type="submit" name="btn" value="Edit" />
            </form>
        </div>

        <div class="card-footer small text-muted">
            * required fields
        </div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->