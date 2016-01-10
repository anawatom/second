<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form><!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <span>ตารางรหัส</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <?= Html::a('CLN0I010 บันทึกชนิดกีฬา',
                                    ['/cln-sport'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN0I020 บันทึกบริเวณที่บาดเจ็บ',
                                    ['/cln-boundary-inj'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN0I030 บันทึกสาเหตุการบาดเจ็บ',
                                    ['/cln-cause-inj'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN0I040 บันทึกวิธีการรักษา',
                                    ['/cln-cure'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN0I050 บันทึกคำนำหน้านาม',
                                    ['/cln-title'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN0I060 บันทึกเวลามาตรฐานการให้บริการ',
                                    ['/cln-standard-time'],
                                    []); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <span>บันทึก</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <?= Html::a('CLN1I010 บันทึกระเบียนผู้ป่วย',
                                    ['/cln-register'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1I020 บันทึกการบาดเจ็บ',
                                    ['/cln-diagnose'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1I030 บันทึกกิจกรรมย่อย',
                                    ['/cln-sub-activity'],
                                    []); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <span>รายงาน</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <?= Html::a('CLN1R010 รายงานเวชระเบียนคนไข้',
                                    ['/report-cln1r010'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R020 รายงานผู้ใช้บริการและระยะเวลาให้บริการ',
                                    ['/report-cln1r020'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R030 รายงานประจำเดือน',
                                    ['/report-cln1r030'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R040 รายงานกราฟต่างๆ',
                                    ['/report-cln1r040'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R050 พิมพ์รายงานสรุปจำนวนผู้ใช้บริการเปรียบเทียบเวลามาตรฐาน',
                                    ['/report-cln1r050'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R060 รายงานประวัติการได้รับบาดเจ็บ/แพ้ยา',
                                    ['/report-cln1r060'],
                                    []); ?>
                    </li>
                    <li>
                        <?= Html::a('CLN1R070 รายงานทะเบียนประวัติคนไข้',
                                    ['/report-cln1r070'],
                                    []); ?>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->

    </section>

</aside>
