<?php

namespace humhub\modules\phonebook\views\index;

use humhub\modules\user\widgets\Image;
use humhub\modules\user\models\Profile;
use humhub\modules\user\models\User;
use humhub\widgets\FooterMenu;
use yii\helpers\Html;

// Register our module assets, this could also be done within the controller
\humhub\modules\phonebook\assets\Assets::register($this);

$users = User::find()
            ->addSelect(['*', 'user.*', 'profile.*'])
            ->joinWith('profile')
            ->where(['<>','id', 1])
            ->addOrderBy(['firstname' => SORT_ASC]) //sort by field
            ->active()
            ->limit(100) //how many users should be shown on one page
            ->all();

$global_number = ''; //change this to your needs

$label_field1 = 'User'; //change this to your needs
$label_field2 = 'Name'; //change this to your needs
$label_field3 = 'Phone'; //change this to your needs
$label_field4 = 'Mobile'; //change this to your needs
$label_field5 = 'Skype'; //change this to your needs
$label_field5b = 'E-mail'; //change this to your needs
$label_field6 = 'Job Title'; //change this to your needs
$label_field7 = 'Country'; //change this to your needs
$label_field8 = 'Timezone'; //change this to your needs

//also change the variables = $field1 - $field9, i want to improve that later
?>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading">
            <p><i class="fa fa-phone"></i> Company <strong>Phone Directory</strong></p>
        </div>
        <?= Html::beginForm('', 'get', ['class' => 'form-search']); ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group form-group-search">
                    <input type="text" id="search" class="form-control form-search" value="" onkeyup="filter_table()" autocomplete="off" placeholder="Search for users, country, job title...">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <?= Html::endForm(); ?>
        <br>
        <div class="table-responsive">
            <table id="table" class="main-table" style="width:100%">
                <thead>
                    <tr class="thead">
                        <th style="width:5%"><?= $label_field1 ?></th>
                        <th style="width:10%"><?= $label_field2 ?></th>
                        <th style="width:17%"><?= $label_field3 ?></th>
                        <th style="width:17%"><?= $label_field4 ?></th>
                        <th style="width:5%"><?= $label_field5 ?></th>
                        <th style="width:10%"><?= $label_field5b ?></th>
                        <th style="width:16%"><?= $label_field6 ?></th>
                        <th style="width:10%"><?= $label_field7 ?></th>
                        <th style="width:10%"><?= $label_field8 ?></th>
                    </tr>
                </thead>
                <tbody id="table-data">
                <?php foreach ($users as $user) :
                    $field1 = $user->getProfileImage()->getUrl();
                    $field2 = Html::encode($user->profile->firstname);
                    $field3 = Html::encode($user->profile->lastname);
                    $field4 = Html::encode($user->profile->phone_work);
                    $field5 = Html::encode($user->profile->phone_private);
                    $field5b = Html::encode($user->profile->im_skype);
                    $field6 = Html::encode($user->email);
                    $field7 = Html::encode($user->profile->title);
                    $field8 = Html::encode($user->profile->country);
                    $field9 = Html::encode($user->time_zone);
                ?>
                    <tr class="tbody" style="text-align:center; border-top: 1px solid #eee;">
                        <td style="padding:10px;">
                            <a href="<?= $user->getUrl(); ?>">
                                <img src="<?= $field1 ?>" class="img-rounded tt img_margin"
                                    height="40" width="40" alt="40x40" style="width: 40px; height: 40px; "
                                    data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="<?= $field2 ?>&nbsp;<?= $field3 ?>">
                             </a>
                         </td>
                         <td><a href="<?= $user->getUrl(); ?>"><?= $field2 ?>&nbsp;<?= $field3 ?></a></td>
                         <td><?php if ($field4 != null) : ?><a href="tel:<?= $field4 ?>"><?= $field4 ?></a><?php else : ?><em>N/A</em><?php endif; ?></td>
                         <td><?php if ($field5 != null) : ?><a href="tel:<?= $field5 ?>"><?= $field5 ?></a><?php else : ?><em>N/A</em><?php endif; ?></td>
                         <td><?php if ($field5b != null) : ?>
                             <a style="font-size:22px" class="tt" title="" href="skype:<?= $field5b ?>?chat"
                                 data-original-title="Call or chat with Skype"><i class="fa fa-skype" style="color:#00b0f3" aria-hidden="true"></i></a>
                             <?php else : ?><em>N/A</em>
                             <?php endif; ?>
                         </td>
                         <td><a style="color:#f60" href="mailto:<?= $field6 ?>"><?= $field6 ?></a></td>
                         <td><?= $field7 ?></td>
                         <td><?= $field8 ?></td>
                         <td><?= $field9 ?></td>
                     </tr>
                 <?php endforeach; ?>
                 </tbody>
             </table>
         </div>
     </div>
     <?= FooterMenu::widget(); ?>
</div>
