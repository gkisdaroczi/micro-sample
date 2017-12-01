<!doctype html>
<html lang="<?= $current_lang ?>">
<head>
    <meta charset="utf-8">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
	<meta property="og:url" content="<?= $meta_url ?>" />
	<meta property="og:title" content="<?= $meta_title ?>" />
	<meta property="og:description" content="<?= $meta_description ?>" />
	<meta property="og:image" content="<?= $meta_image ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=latin-ext">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/css/common.css">
</head>
<body>
    <header class="header">
        <div class="container relative">
            <div class="logo">
                <a href="/"><i class="fa fa-paper-plane"></i> paper plane inc.</a>
            </div>
            <div class="navbar">
                <ul class="nav">
                    <?php foreach ($nav as $link) : ?>
                    <li class="nav-item"><a class="<?= $link['active'] ?>" href="<?= $link['url'] ?>"><?= $link['menu'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="top-right">
                <ul class="lang">
                    <?php foreach ($langs as $lang) : ?>
                    <li class="lang-item"><a href="<?= $lang['url'] ?>"><?= $lang['lang'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <button class="nav-btn"><i class="fa fa-bars"></i></button>
            </div>
        </div>
    </header>

    <div class="wrapper">
