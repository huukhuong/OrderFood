<!-- ====   Navigation  ==== -->
<?php if($page == 'register' || $page == 'login'): ?>


<?php else: ?>

    <header <?php echo $page != 'home' ? 'class="fixed"' : ''; ?>>
        <a href="#" class="logo">
            <img src="client/images/logo.svg" alt="logo">
        </a>
        <ul class="navigation">
            <span id="close-nav"><i class="fas fa-times"></i></span>
            <li><a href="/" <?php echo $page == 'home' ? 'class="active"' : ''; ?>>Trang chủ</a></li>
            <li><a href="shop" <?php echo $page == 'shop' ? 'class="active"' : ''; ?>>Cửa hàng</a></li>
            <li><a href="coming-soon" <?php echo $page == 'support' ? 'class="active"' : ''; ?>>Hỗ trợ</a></li>
            <li><a href="coming-soon" <?php echo $page == 'notification' ? 'class="active"' : ''; ?>>Thông báo</a></li>
<<<<<<< HEAD









=======
            <?php if(auth()->guard()->check()): ?>
                <li class="user">
                    <img src="img/users/<?php echo e(auth()->user()->img); ?>" alt="img" class="user-avatar">
                    <div class="user_detail">
                        <h3><?php echo e(auth()->user()->name); ?></h3>

                    </div>
                </li>

                <li><a href="logout">Đăng xuất</a></li>
            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
                <li><a href="register">Đăng ký</a></li>
                <li><a href="login">Đăng nhập</a></li>
            <?php endif; ?>
>>>>>>> f7111c058a45f640343bee650d317218507bcfa1

        </ul>

        <div class="icon">
            <a href="cart">
                <div class="cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="142.25" height="189.333"
                        viewBox="0 0 142.25 189.333">
                        <g id="shopping-bag-svgrepo-com" transform="translate(-55.3 -1.5)">
                            <path id="Path_9" data-name="Path 9"
                                d="M190.014,162.8l-10.1-121.435a5,5,0,0,0-4.836-4.737H154.286C154,16.368,138.48,0,119.425,0S84.852,16.368,84.564,36.627H63.777a4.974,4.974,0,0,0-4.836,4.737L48.836,162.8c0,.154-.036.308-.036.462,0,13.827,11.873,25.073,26.489,25.073h88.272c14.616,0,26.489-11.246,26.489-25.073A2,2,0,0,0,190.014,162.8ZM119.425,10.4c13.678,0,24.829,11.708,25.118,26.228H94.308C94.6,22.107,105.747,10.4,119.425,10.4Zm44.136,167.536H75.289c-9.166,0-16.6-6.47-16.745-14.443L68.216,47.064H84.528V62.855a4.882,4.882,0,1,0,9.744,0V47.064h50.271V62.855a4.882,4.882,0,1,0,9.744,0V47.064H170.6l9.708,116.428C180.162,171.464,172.692,177.935,163.561,177.935Z"
                                transform="translate(7 2)" fill="#fff" stroke="#fff" stroke-width="3" />
                        </g>
                    </svg>
                    <span>1</span>
                </div>
            </a>
            <span id="navbar-toggler">
                <i class="fas fa-stream"></i>
            </span>
        </div>

    </header>
    <!-- ---------------xx-------------- -->

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/components/header.blade.php ENDPATH**/ ?>