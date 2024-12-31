
    <footer>

        <div class="footer-content">

            <p>&copy; <?php echo date('Y') ?> Stuart Boutique</p>

            <ul class="footer-links">
                <?php if (isset($_SESSION['authenticated'])): ?>
                    <li>
                        <a href="<?= base_url('view-customer.php') ?>">
                            <i class="fas fa-home"></i> 
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('view-landing.php') ?>">
                            <i class="fa-solid fa-bag-shopping"></i> 
                            Shopping
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100064031860548" target="_blank">
                        <i class="fa-brands fa-facebook"></i> 
                        Facebook
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-location-dot"></i>
                        Torallba St. Poblacion, Iligan City
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-phone"></i>
                        (063) 221 3543
                    </a>
                </li>
            </ul> 

        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="js/cart2.js"></script>
    <!-- <script src="js/contain.js"></script> -->
    <script src="js/custom1.js"></script>
    <script src="js/link5.js"></script>
    <script src="js/nav4.js"></script>
    <script src="js/password-contain1.js"></script>
    <script src="js/qty2.js"></script>
    <script src="js/show-password1.js"></script>
    <!-- <script src="js/size1.js"></script> -->
</body>
</html>