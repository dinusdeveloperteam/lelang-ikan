<!DOCTYPE html>
<html><head>
    <title></title>
<style type="text/css">
body { font-family: Calibri, Helvetica, Arial, sans-serif; }
h2 { font-family: Cambria,"Times New Roman",serif; }
h3 { font-family: Cambria,"Times New Roman",serif; }  
</style>
</head><body>
        <center><h2>LELANG IKAN</h2><br><h3>DATA PESERTA LELANG</h3></center><hr> 
    <table border="1" width="100%" style="text-align:center;">
        <tr>
            <th style="background-color:green; color: white;">No</th>
            <th style="background-color:green; color: white;">Nama Peserta</th>
            <th style="background-color:green; color: white;">NIK</th>
            <th style="background-color:green; color: white;">Nomor Telepon/HP</th>
            <th style="background-color:green; color: white;">Status Peserta</th>
        </tr>
            <?php
            $no = 1;
            foreach ($peserta as $u) :
            ?> 
<tr>
            <td><?= $no++; ?></td>
            <td><?= $u['nama'] ?></td>
            <td><?= $u['nik'] ?></td>
            <td><?= $u['telp'] ?></td>
	    <td><?php 
			if ($u['status'] == 0) {
                            echo '<span class="badge bg-warning">Belum Diverifikasi</span>';
                        } else if ($u['status'] == 1) {
                            echo '<span class="badge bg-success">Terverifikasi</span>';
                        } else if ($u['status'] == 2) {
                            echo '<span class="badge bg-danger">Ditolak</span>';
                        } else if ($u['status'] == 3) {
                            echo '<span class="badge bg-secondary">Dibanned</span>';
                        } else {
                            echo "status tidak diketahui";
                        }
                ?>
	   </td>
        </tr>

        <?php endforeach; ?>
    </table>

</body></html>