<script src="<?= base_url() ?>public/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url() ?>public/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>public/js/popper.min.js"></script>
<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>public/js/jquery.stellar.min.js"></script>
<script src="<?= base_url() ?>public/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>public/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>public/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>public/js/aos.js"></script>
<script src="<?= base_url() ?>public/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php foreach($scripts as $script): ?>
	<script src="<?= base_url() ?>public/js/<?= $script ?>.js"></script>
<?php endforeach ?>

</body>
</html>