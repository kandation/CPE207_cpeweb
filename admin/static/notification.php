<div class="row">
    <div class="col-lg-12">
        <?php
        if($errorNSL) {
            foreach ($errorNSL as $a) {
                ?>
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> <?= $a; ?>
                </div>
            <?php }
        }
        ?>
        <?php
        if($errorWN) {
            foreach ($errorWN as $a) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> <?= $a; ?>
                </div>
            <?php }
        }
        ?>
    </div>
</div>
