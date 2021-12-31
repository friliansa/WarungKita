<?= $this->extend('layouts/admin'); ?>

<?= $this->section('content'); ?>
<a href="/tambah-pembelian/nama">
	<button type="button" class="btn btn-outline-primary">Tambah Pembelian</button>
</a>

<div align="center">
	<a class="navbar-brand brand-logo fs-3" style="color: #27367F;">
		<h3><b>Daftar Pembelian</b></h3>
	</a>
</div>

<?php if ($pembelian == null) : ?>
	<div align="center">
		<div class="card" style="width: 25rem;">
			<div class="card-body">
				Belum ada transaksi pembelian
			</div>
		</div>
	</div>
<?php else : ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Waktu</th>
				<th>Kode Transaksi</th>
				<th>Atas Nama</th>
				<th>Total Harga</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php $total = 0; ?>
			<?php foreach ($pembelian as $beli) : ?>
				<tr>
					<td><?php echo $i;
						$i++; ?></td>
					<td><?= $beli['created_at']; ?></td>
					<td>B<?= $beli['id']; ?></td>
					<td><?= $beli['nama']; ?></td>
					<td>Rp <?= $beli['total'];
							$total = $total + $beli['total'] ?></td>

					<td>
						<a href="/pembelian-detail/<?= $beli['id']; ?>">
							<button type="button" class="btn btn-outline-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
									<path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
								</svg>
							</button>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="4">
					Total Nilai Pembelian
				</td>
				<td colspan="2">
					Rp <?= $total; ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php endif; ?>
<?= $this->endSection(); ?>