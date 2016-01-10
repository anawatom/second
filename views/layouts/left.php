<?php
use yii\helpers\Url;
use yii\helpers\Html;

$currentController = Yii::$app->controller->id;
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> --> <!-- Sidebar user panel -->

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> --><!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview <?= ($currentController == 'cln-sport'
                                    || $currentController == 'cln-boundary-inj'
                                    || $currentController == 'cln-cause-inj'
                                    || $currentController == 'cln-cure'
                                    || $currentController == 'cln-title'
                                    || $currentController == 'cln-standard-time')? 'active':''; ?>">
                <a href="#">
                    <span>ตารางรหัส</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($currentController == 'cln-sport')? 'active': ''; ?>">
                        <?= Html::a('CLN0I010 บันทึกชนิดกีฬา',
                                    ['/cln-sport'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-boundary-inj')? 'active': ''; ?>">
                        <?= Html::a('CLN0I020 บันทึกบริเวณที่บาดเจ็บ',
                                    ['/cln-boundary-inj'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-cause-inj')? 'active': ''; ?>">
                        <?= Html::a('CLN0I030 บันทึกสาเหตุการบาดเจ็บ',
                                    ['/cln-cause-inj'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-cure')? 'active': ''; ?>">
                        <?= Html::a('CLN0I040 บันทึกวิธีการรักษา',
                                    ['/cln-cure'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-title')? 'active': ''; ?>">
                        <?= Html::a('CLN0I050 บันทึกคำนำหน้านาม',
                                    ['/cln-title'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-standard-time')? 'active': ''; ?>">
                        <?= Html::a('CLN0I060 บันทึกเวลามาตรฐานการให้บริการ',
                                    ['/cln-standard-time'],
                                    []); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview <?= ($currentController == 'cln-register'
                                    || $currentController == 'cln-diagnose'
                                    || $currentController == 'cln-activity')? 'active':''; ?>">
                <a href="#">
                    <span>บันทึก</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($currentController == 'cln-register')? 'active': ''; ?>">
                        <?= Html::a('CLN1I010 บันทึกระเบียนผู้ป่วย',
                                    ['/cln-register'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-diagnose')? 'active': ''; ?>">
                        <?= Html::a('CLN1I020 บันทึกการบาดเจ็บ',
                                    ['/cln-diagnose'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'cln-activity')? 'active': ''; ?>">
                        <?= Html::a('CLN1I030 บันทึกกิจกรรมย่อย',
                                    ['/cln-sub-activity'],
                                    []); ?>
                    </li>
                </ul>
            </li>
            <li class="treeview <?= ($currentController == 'report-cln1r010'
                                    || $currentController == 'report-cln1r020'
                                    || $currentController == 'report-cln1r030'
                                    || $currentController == 'report-cln1r040'
                                    || $currentController == 'report-cln1r050'
                                    || $currentController == 'report-cln1r060'
                                    || $currentController == 'report-cln1r070')? 'active':''; ?>">
                <a href="#">
                    <span>รายงาน</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= ($currentController == 'report-cln1r010')? 'active': ''; ?>">
                        <?= Html::a('CLN1R010 รายงานเวชระเบียนคนไข้',
                                    ['/report-cln1r010'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r020')? 'active': ''; ?>">
                        <?= Html::a('CLN1R020 รายงานผู้ใช้บริการและระยะเวลาให้บริการ',
                                    ['/report-cln1r020'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r030')? 'active': ''; ?>">
                        <?= Html::a('CLN1R030 รายงานประจำเดือน',
                                    ['/report-cln1r030'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r040')? 'active': ''; ?>">
                        <?= Html::a('CLN1R040 รายงานกราฟต่างๆ',
                                    ['/report-cln1r040'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r050')? 'active': ''; ?>">
                        <?= Html::a('CLN1R050 พิมพ์รายงานสรุปจำนวนผู้ใช้บริการเปรียบเทียบเวลามาตรฐาน',
                                    ['/report-cln1r050'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r060')? 'active': ''; ?>">
                        <?= Html::a('CLN1R060 รายงานประวัติการได้รับบาดเจ็บ/แพ้ยา',
                                    ['/report-cln1r060'],
                                    []); ?>
                    </li>
                    <li class="<?= ($currentController == 'report-cln1r070')? 'active': ''; ?>">
                        <?= Html::a('CLN1R070 รายงานทะเบียนประวัติคนไข้',
                                    ['/report-cln1r070'],
                                    []); ?>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->

    </section>

</aside>
