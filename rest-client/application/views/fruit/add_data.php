<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-3">
        <div class="card-header">
        	<a href="<?php echo site_url('fruits') ?>"><i class="fas fa-arrow-left"></i> List Fruits</a>
        </div>

        <div class="card-body">
        	<form action="<?php echo site_url('fruits/add') ?>" method="post" enctype="multipart/form-data" >
                <!-- input name -->
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control"
                    type="text" name="name" placeholder="Fruit name" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="price">Price*</label>
                    <input class="form-control"
                    type="number" name="price" placeholder="Fruit price" value="<?= set_value('price'); ?>">
                    <?= form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- input image -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <input class="form-control-file"
                    type="file" name="image" />
                    <div class="invalid-feedback">
                    <?php echo form_error('image') ?>
                    </div>
                </div>
                <!-- button save -->
                <input class="btn btn-success" type="submit" name="btn" value="Add" />
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