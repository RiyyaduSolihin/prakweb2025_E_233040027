<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($data['title']) ? $data['title'] : 'Daftar Pemain'; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-3"><?= isset($data['title']) ? $data['title'] : 'Daftar Pemain Liverpool FC'; ?></h1>

    <a href="<?= BASEURL; ?>/player/tambah" class="btn btn-primary mb-3">Tambah Pemain</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th style="width:70px">No</th>
                <th>Nama</th>
                <th>Posisi</th>
                <th>Nomor</th>
                <th style="width:150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($data['players']) && is_array($data['players'])):
            $i = 1; 
            foreach ($data['players'] as $player):
                $nama = $player['nama'] ?? $player['name'] ?? '-';
                $posisi = $player['posisi'] ?? $player['position'] ?? '-';
                $nomor = $player['nomor_punggung'] ?? $player['number'] ?? ($player['nomor'] ?? '-');
                $id = $player['id'] ?? $player['ID'] ?? null;
        ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($nama); ?></td>
                <td><?= htmlspecialchars($posisi); ?></td>
                <td><?= htmlspecialchars($nomor); ?></td>
                <td>
                    <?php if($id !== null): ?>
                     <a href="<?= BASEURL; ?>player/detail/<?= $player['id']; ?>" class="badge bg-primary">detail</a>
                     <a href="<?= BASEURL; ?>/player/edit/<?= $player['id']; ?>" class="badge bg-success">Edit</a>
                     <a href="<?= BASEURL; ?>player/hapus/<?= $player['id']; ?>" class="badge bg-danger" onclick="return confirm('Yakin?');">hapus</a>

                    <?php else: ?>
                        <span class="text-muted">No actions</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php
            endforeach;
        else:
        ?>
            <tr><td colspan="5" class="text-center">Belum ada data pemain</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>
</html>
