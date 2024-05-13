<?php
use app\models\User;
use app\models\Role;

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


?>

<?
// // var_dump(Yii::$app->user)
// echo '<pre>'; 
// //var_dump(Yii::$app->user);
//  print_r(Yii::$app->user->identity); 
// echo '</pre>';

?>
<div class="site-profile">
    <div class="profile">
        <div class="profile__card__conainer">
            <div class="profile__card">
                <div class="card__left">
                    <img class="profile__photo" src="../web/files/profilePhoto.png" alt="Фото профиля"></img>
                    <div class="photo__change"><a class='link'>изменить фото</a></div>
                </div>
                <div class="card__right">
                    <div class="profile__nickname"><?=User::getInfoById(1)->nickname?></div>
                    <div class="profile__info">
                        <div class="profile__status info__item">
                            <div class="status__title info__title">Статус профиля: </div>
                            <div class="status__value info__value"><?=Role::getRoleNameById(1)?></div>
                            <div class="status__change"><a class='link'>изменить</a></div>

                        </div>
                        <div class="profile__reviews__count info__item">
                            <div class="review__title info__title">Количество оставленных рецензий: </div>
                            <div class="review__count info__value">2</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile__review__conainer">
            <div class="profile__review">
                <div class="riview__top">
                    <img class="review__photo" src="../web/files/reviewPhoto.png" alt="Фото книги"></img>
                    <div class="review__main">
                        <div class="book__title">Тело помнит все</div>
                        <div class="author__name">Бессел Ван дер Колк</div>
                        <div class="review__container">
                            <div class="review">
                                <div class="review__top">
                                    <div class="review__author">Blackcandy01</div>
                                    <div class="review__date">22.02.2023</div>
                                </div>
                                <div class="review__value">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review__status">
                    <div class="status__title">Статус: </div>
                    <div class="status__value">на проверке</div>
                </div>
            </div>
        </div>
    </div>

</div>