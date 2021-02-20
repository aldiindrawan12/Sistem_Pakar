<div class="container">
    <div>
        <a href="" class="btn btn-primary m-3" data-toggle="modal" data-target="#popup-tambah-gejala"><i class="fas fa-plus"></i>Tambah Gejala</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Gejala</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $n=1;
            foreach($gejala as $value){?>
                <tr>
                    <td><?= $n?></td>
                    <td><?= $value["gejala_name"]?></td>
                    <td class="text-center">
                        <a class='btn btn-secondary btn-hapus' id=<?= $value["gejala_id"]?> onclick="hapus_gejala(this)"><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>
            <?php $n++;
            }?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="popup-tambah-gejala" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Tambah Data Gejala</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/home/insert_gejala/".$username)?>" method="POST">
                    <div class="form-group">
                        <label for="gejala-nama-insert" class="form-label">Nama Gejala</label>
                        <input autocomplete="off" type="text" class="form-control" id="gejala-nama-insert" name="gejala-nama-insert" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-3 float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hapus_gejala(a){
        var id = a.id;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/hapusgejala') ?>",
            dataType: "text",
            data: {
                id: id
            },
            success: function(data) {
                location.reload();
            }
        });
    }
</script>