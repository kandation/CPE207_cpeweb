<?php $year_class = strval(getdate()['year']+(int)543);
$year_class = intval($year_class[2].$year_class[3])-1;
?>

<nav id="menuBar" class="navbar navbar-default lightHeader" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php">
                <img style="width:260px" src="img/cpe1.png" alt="CPE"></a>
            </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown singleDrop color-1">
                    <a href="index.php">
                        <i class="fa fa-home bg-color-1" aria-hidden="true"></i> <span>หน้าหลัก</span>
                    </a>
                </li>
                <li class="dropdown singleDrop color-3">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-ul bg-color-3" aria-hidden="true"></i> <span>นักศึกษา</span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="student.php?y=<?=$year_class?>">นักศึกษาปีที่ 1</a></li>
                        <li><a href="student.php?y=<?=$year_class-1?>">นักศึกษาปีที่ 2</a></li>
                        <li><a href="student.php?y=<?=$year_class-2?>">นักศึกษาปีที่ 3</a></li>
                        <li><a href="student.php?y=<?=$year_class-3?>">นักศึกษาปีที่ 4</a></li>
                    </ul>
                </li>
                <li class=" dropdown megaDropMenu color-2">
                    <a href="teacher.php" class="dropdown-toggle" >
                        <i class="fa fa-file-text-o bg-color-2" aria-hidden="true"></i>
                        <span>คณาจารย์</span>
                    </a>
                </li>

                <li class="dropdown singleDrop color-5">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-calendar bg-color-5" aria-hidden="true"></i>
                        <span>ผลงาน</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="photo-gallery.php">Photo Gallery</a></li>
                        <li><a href="all-events.php">ข่าวสาร</a></li>
                    </ul>
                </li>

                <li class="dropdown singleDrop color-6">
                    <a href="contact-us.php"><i class="fa fa-gg bg-color-6" aria-hidden="true"></i> <span>ติดต่อเรา</span></a>

                </li>

            </ul>
        </div>
    </div>
</nav>
