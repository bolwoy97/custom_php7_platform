<div class="header">
    <div class="header-title">
        <div class="header-menu">
            <img src="/assets/img/menu.svg" alt="">
        </div>
        <h1 class="title"><?=$p_header?></h1>
    </div>




    <div class="profile">
        <a href="/landing" class="back"><img src="/assets/img/left-arrow.svg" alt=""><?= $lng['txt179'] ?></a>

        <img src="/assets/img/profile.svg" alt="" class="profile-img">
        <div class="name"><?=$_SESSION['user']['login']?></div>
        <a href="/logout" class="logout"><img src="/assets/img/logout.svg" alt=""></a>
        <div class="nav-item dropdown" style="z-index:2;">
                    <a class="nav-link dropbtn" href="#">
                        <img src="/assets/land/image/<?=strtolower(Language::curLang())?>.png">
                    </a>
                    <div class="dropdown-content">
                        <a href="/language-ru"><img src="/assets/land/image/ru.png"></a>
                        <a href="/language-en"><img src="/assets/land/image/en.png"></a>
                    </div>
        </div>
    </div>

    
</div>