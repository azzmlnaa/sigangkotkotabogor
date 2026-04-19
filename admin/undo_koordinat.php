 <?php
include "../config/koneksi.php";

$id=$_GET['id'];

mysqli_query($conn,"
DELETE FROM koordinat
WHERE id = (
SELECT id2 FROM (
SELECT id as id2
FROM koordinat
WHERE trayek_id='$id'
ORDER BY urutan DESC
LIMIT 1
) x
)");
?>