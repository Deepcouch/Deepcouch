<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deepcouch</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory').'/statics/css/materialize.min.css';?>">
    <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory').'/statics/css/style.css'; ?>">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="<?php echo bloginfo('stylesheet_directory').'/statics/js/materialize.min.js'; ?>" charset="utf-8"></script>
    <script src="<?php echo bloginfo('stylesheet_directory').'/statics/js/script.js';?>" charset="utf-8"></script>
</head>
<body class="grey lighten-4">
    <header class="navbar-fixed">
        <nav class="nav-wrapper">
            <a href="#" class="brand-logo"><img src="<?php echo bloginfo('stylesheet_directory').'/statics/img/couch.svg';?>" alt=""></a>
            <ul class="right hide-on-med-and-down orange-texte">
                <li><a href="films.html">Films</a></li>
                <li><a href="series.html">Séries</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="acteur.html">Acteurs</a></li>
                <li><a class="modal-trigger waves-effect waves-light" href="#search"><i class="material-icons">search</i></a></li>
                <li><a class="modal-trigger waves-effect waves-light" href="#signin"><i class="material-icons">person</i></a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="films.html"><i class="material-icons">movie</i>Films</a></li>
                <li><a href="series.html">Séries</a></li>
                <li><a href="news.html"><i class="material-icons">news</i>News</a></li>
                <li><a href="acteur.html"><i class="material-icons">face</i>Acteurs</a></li>
                <li class="divider"></li>
                <li><a class="modal-trigger waves-effect waves-light" href="#search"><i class="material-icons">search</i></a></li>
                <li><a class="modal-trigger waves-effect waves-light" href="#signin"><i class="material-icons">person</i></a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </nav>
    </header>
    <div id="search" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Rechercher</h4>
            <form action="" method="post">
                <div class="input-field s12">
                    <input type="text" name="search">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Rechercher</a>
        </div>
    </div>
    <div id="signin" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Se connecter</h4>
            <form action="" method="post">
                <div class="input-field s12">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div class="input-field s12">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-black btn-flat left">Créer un compte</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-black btn-flat right">Se connecter</a>
        </div>
    </div>
<script type="text/javascript">
$('.button-collapse').sideNav();
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});
$(document).ready(function(){
    $('.slider').slider();
});
</script>
