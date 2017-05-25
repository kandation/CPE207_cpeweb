<?php
    function title_person($type)
    {
        ?>
        <section class="pageTitleSection">
            <div class="container">
                <div class="pageTitleInfo">
                    <h2><?php echo ($type == "student") ? "รายละเอียดนักศึกษา" : "รายละเอียดอาจารย์"; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">หน้าแรก</a></li>
                        <li class="active"><?php echo ($type == "student") ? "รายละเอียดนักศึกษา" : "รายละเอียดอาจารย์"; ?></li>
                    </ol>
                </div>
            </div>
        </section>
        <?php
    }
    ?>