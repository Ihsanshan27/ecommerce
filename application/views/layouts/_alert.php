<?php
$success    = $this->session->flashdata('success');
$error      = $this->session->flashdata('error');
$warning    = $this->session->flashdata('warning');

// Reset manual flashdata setelah ditampilkan
if ($success || $error || $warning) {
	$this->session->unset_userdata('success');
	$this->session->unset_userdata('error');
	$this->session->unset_userdata('warning');
}

if ($success) {
	$alert_status    = 'alert-success';
	$status         = 'Success!';
	$message        = $success;
}

if ($error) {
	$alert_status    = 'alert-danger';
	$status         = 'Error!';
	$message        = $error;
}

if ($warning) {
	$alert_status    = 'alert-warning';
	$status         = 'Warning!';
	$message        = $warning;
}
?>

<?php if (isset($alert_status)): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
				<strong><?= $status ?></strong> <?= $message ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>

	<script>
		// Auto close alert setelah 5 detik
		$(document).ready(function() {
			setTimeout(function() {
				$('.alert').alert('close');
			}, 5000);

			// Clear session storage untuk prevent muncul lagi
			if (typeof(Storage) !== 'undefined') {
				sessionStorage.setItem('alert_shown', 'true');
			}
		});
	</script>
<?php endif ?>