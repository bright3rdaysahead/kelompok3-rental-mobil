<form method="post" action="<?= base_url('cart/finishTrans/'.$idtrans) ?>">
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Booking Confirmation</h4>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Nama Penyewa</label>
                            <input class="form-control" type="text" name="nama_lengkap" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>No HP</label>
                            <input class="form-control" type="text" name="no_hp" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Alamat Penyewa (Sesuai KTP) </label>
                            <input class="form-control" type="text" name="alamat" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Nomor KTP </label>
                            <input class="form-control" type="text" name="no_ktp" placeholder="Masukkan No KTP" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Nomor SIM </label>
                            <input class="form-control" type="text" name="no_sim" placeholder="Masukkan No SIM" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Tanggal Pemesanan </label>
                            <input class="form-control" type="date" name="pesan" value="<?= $detail[0]['tgl_sewa'] ?>" readonly> 
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Tanggal Pengembalian </label>
                            <input class="form-control" type="date" name="kembali" value="<?= $detail[0]['tgl_kembali'] ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Rent Detail</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Car type</h5>
                        <?php 
                            $total_akhir = 0; // Inisialisasi variabel total
                            foreach($detail as $brglist): 
                                $lama = $brglist['lama_hari'] ?? 1;
                                $subtotal = $brglist['harga'] * $lama;
                                $total_akhir += $subtotal; // Menjumlahkan ke total akhir
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?= $brglist['nama_barang'] ?> (<?= $lama ?> Hari)</p>
                            <p><?= number_to_currency($subtotal, 'IDR', 'en_ID', 2) ?></p>
                        </div>
                        <?php endforeach ?>
                        <hr class="mt-0">
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?= number_to_currency($total_akhir, 'IDR', 'en_ID', 2) ?></h5>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="total_bayar" value="<?= $total_akhir ?>">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="bank" value="Bank Transfer" checked>
                                <label class="custom-control-label" for="bank"> Bank Transfer (Virtual Code) </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="qris" value="QRIS">
                                <label class="custom-control-label" for="qris"> QRIS </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="cod" value="Payment On Spot">
                                <label class="custom-control-label" for="cod"> Payment On Spot </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" value="Place Order">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>