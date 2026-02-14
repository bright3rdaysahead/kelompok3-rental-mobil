<!DOCTYPE html>
<html>
<head>
    <title>Invoice #TRX-<?= $transaksi['id_transaksi'] ?></title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; }
        table { width: 100%; text-align: left; border-collapse: collapse; }
        .header { margin-bottom: 20px; }
    </style>
</head>
<body onload="window.print()"> <div class="invoice-box">
        <div class="header">
            <h2>INVOICE RENTAL MOBIL</h2>
            <p>ID Transaksi: #TRX-<?= $transaksi['id_transaksi'] ?><br>
               Tanggal: <?= $transaksi['tgl_transaksi'] ?><br>
               Metode: <?= $transaksi['metode_pembayaran'] ?></p>
        </div>

        <h4>Data Penyewa:</h4>
        <p>Nama: <?= $shipping['nama_lengkap'] ?? '-' ?><br>
           Alamat: <?= $shipping['alamat'] ?? '-' ?><br>
           KTP/SIM: <?= $shipping['kota'] ?> / <?= $shipping['kodepos'] ?></p> <table border="1" cellpadding="10">
            <thead>
                <tr style="background: #f4f4f4;">
                    <th>Mobil</th>
                    <th>Lama Sewa</th>
                    <th>Harga/Hari</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($items as $item): ?>
                <tr>
                    <td><?= $item['nama_barang'] ?></td>
                    <td><?= $item['lama_hari'] ?> Hari</td>
                    <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($item['harga'] * $item['lama_hari'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">TOTAL BAYAR</th>
                    <th>Rp <?= number_format($transaksi['total_bayar'], 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>