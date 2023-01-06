<?php

 include 'koneksi.php';

 // lakukan query
 $query  = "SELECT * FROM kamar";


 $result = $koneksi->query($query);

?>
<?php while ($fetch = $result->fetch_assoc()) : ?>
   <table border="1" class="table table-bordered table-hover">
            <tr>
                <!-- Menggunakan Nullable Operator (??) -->
                <td><?= $fetch["id_kamar"] ?? '-' ?></td>
                <!-- Metode Tenary -->
                <td><?= $fetch['paket_kamar'] == null ? '-' : $fetch['paket_kamar'] ?></td>
                <td><?= $fetch['harga'] ?? '-' ?></td>
                <td><?= $fetch['luas_kamar']?? '-'?></td>
                <td><img src="img/<?= $fetch['gambar'] ?? '-' ?>" width="100"></td> 
                <td>
                    <a href="formedit.php?id=<?= $fetch['id'] ?>" class="btn btn-success">
                        Edit
                    </a>

                    <form action="hapususer.php" method="post">
                        <input type="hidden" name="id" value="<?= $fetch['id'] ?>">
                        <input type="submit" value="Hapus User" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        <?php endwhile ?>
     </table>