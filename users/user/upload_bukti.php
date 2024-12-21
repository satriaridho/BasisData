<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $payment_type = $_POST['payment_type'];
    $bank = $_POST['bank'];
    $bukti_tf = $_FILES['bukti_tf']['name'];
    $bukti_tf_tmp = $_FILES['bukti_tf']['tmp_name'];

    // Move the uploaded file to the desired directory
    move_uploaded_file($bukti_tf_tmp, "../../assets/images" . $bukti_tf);

    // Update the transaction with the payment details
    $query = mysqli_query($koneksi, "UPDATE transaksi SET payment_type='$payment_type', bank='$bank', bukti_tf='../uploads/$bukti_tf', status='Payment Submitted' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($koneksi));

    if ($query) {
        echo "<script>alert('Bukti transfer berhasil diupload.');</script>";
        echo "<script>location.href='transaksi.php'</script>";
    } else {
        echo "<script>alert('Gagal mengupload bukti transfer.');</script>";
    }
}

$id_transaksi = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
$data = mysqli_fetch_array($query);
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Upload Bukti Transfer</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
            <div class="form-group">
                <label for="payment_type">Payment Type</label>
                <select name="payment_type" id="payment_type" class="form-control" required>
                    <option value="" disabled selected>Pilih Payment Type</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="E-Wallet Transfer">E-Wallet Transfer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bank">Bank</label>
                <select name="bank" id="bank" class="form-control" required>
                    <option value="" disabled selected>Pilih Bank</option>
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="BNI">BNI</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="Dana">Dana</option>
                    <option value="Ovo">OVO</option>
                    <option value="Lain-Lain">Lain-Lain</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bukti_tf">Bukti Transfer</label>
                <input type="file" name="bukti_tf" id="bukti_tf" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Upload Bukti</button>
        </form>
    </div>
</div>