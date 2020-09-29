<?$lng=Language::get();?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169618338-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-169618338-1');
    </script>

    <?require_once(ROOT.'/views/layouts/chat.php');?>
    <title>Grid Group</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="текст, текст, текст">

    <meta property="og:title" content="Grid Group">
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://gridgroup.cc/res/url_img/img_1.png">
    <meta property="og:description" content="<?=$lng['txt1']?>">
    <meta property="og:url" content="https://gridgroup.cc/res/url_img/img_1.png">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- css from landing -->
    <link rel="stylesheet" href="/assets/land/css/style.css?v=prod">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png">
    <!-- css from landing -->

    <link rel="stylesheet" type="text/css" href="/assets/css/assets.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/media.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">

    <link rel="stylesheet" href="/res/custom/css/style.css">

</head>
<script>
document.addEventListener('DOMContentLoaded', function(){ // Аналог $(document).ready(function(){
    console.log("memory = <?=memory_get_usage()/1000000 .' Mb'?>");
    console.log("exec_time = <?=(microtime(true)-START).' s'?>");
});

</script>