<?php if($page == 'register' || $page == 'login'): ?>


<?php else: ?>
    <!-- ====   Footer  ==== -->
    <footer class="footer">
        <div class="box">
            <div class="openning-hour">
                <h2>Giờ mở cửa</h2>
                <ul>
                    <li>
                        <span>Thứ hai - Thứ sáu</span>
                        <span>08:30 - 23:00h</span>
                    </li>
                    <li>
                        <span>Thứ bảy</span>
                        <span>07:00 - 23:00h</span>
                    </li>
                    <li>
                        <span>Chủ nhật</span>
                        <span>07:00 - 23:00h</span>
                    </li>
                </ul>
            </div>
            <div class="address">
                <h2>Địa chỉ</h2>
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>273 An D. Vương, Phường 3, Quận 5,Thành phố Hồ Chí Minh, Việt Nam</p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>0123 456 789</p>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <p>infor@domain.com</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669658423672!2d106.68006961411632!3d10.75992236244198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1637559140172!5m2!1svi!2s"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="box">
            <div class="subscribe">
                <h2>Đăng ký ngay</h2>
                <p>Đăng ký ngay để nhận các bản cập nhật mới của chúng tôi và nhận các ưu đãi và nội dung thường xuyên.
                </p>
                <div class="textfield">
                    <input type="email" placeholder="Địa chỉ mail của bạn">
                    <button class="btn btn-primary">Đăng ký</button>
                </div>
            </div>

            <div class="social">
                <h2>Kết nối với chúng tôi</h2>
                <div class="list-item">
                    <a href="#">
                        <div class="item"><i class="fab fa-facebook-f"></i></div>
                    </a>
                    <a href="#">
                        <div class="item"><i class="fab fa-instagram"></i></div>
                    </a>
                    <a href="#">
                        <div class="item"><i class="fab fa-twitter"></i></div>
                    </a>
                    <a href="#">
                        <div class="item"><i class="fab fa-google-plus-g"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- -----------xx--------------- -->
    <div class="coppyright">
        <p>copyright © 2021 <span>Fast Food.</span> All rights reserved.</p>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/components/footer.blade.php ENDPATH**/ ?>