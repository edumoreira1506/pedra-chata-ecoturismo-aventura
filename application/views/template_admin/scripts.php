<script src="<?= base_url() ?>public/js/core/jquery.min.js"></script>
<script src="<?= base_url() ?>public/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>public/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="<?= base_url() ?>public/js/plugins/chartjs.min.js"></script>
<script src="<?= base_url() ?>public/js/plugins/bootstrap-notify.js"></script>
<script src="<?= base_url() ?>public/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php foreach($scripts as $script): ?>
	<script src="<?= base_url() ?>public/js/<?= $script ?>.js"></script>
<?php endforeach ?>
</body>

</html>