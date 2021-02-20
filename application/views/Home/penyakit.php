<div class="container">
    <div class="card-body p-0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Penyakit</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $n=1;
            foreach($penyakit as $value){?>
                <tr>
                    <td><?= $n?></td>
                    <td><?= $value["penyakit_nama"]?></td>
                    <td class="text-center">
                        <a class='btn btn-secondary btn-detail' id="<?= $value["penyakit_id"]?>" onclick="detail_penyakit(this)"><i class='fas fa-eye'></i></a> || 
                        <a class='btn btn-secondary btn-edit' data-toggle='modal' data-target='#popup-update-penyakit' id="<?= $value["penyakit_id"]?>" onclick="edit_penyakit(this)"><i class='fas fa-pen-square'></i></a> ||
                        <a class='btn btn-secondary btn-hapus' id="<?= $value["penyakit_id"]?>" onclick="hapus_penyakit(this)"><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>
            <?php $n++;
            }?>
            </tbody>
        </table>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tbody>
                <tr class="text-bold text-center text-dark">
                    <td colspan=2><span id="nama-penyakit">nama penyakit</span></td>
                </tr>
                <tr>
                    <td width="15%">Penyebab</td>
                    <td><span id="penyebab-penyakit">Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda autem minima ut quia, sint blanditiis cum nulla delectus, repudiandae dolor dignissimos. Quisquam corrupti atque alias sed suscipit ipsa odit!</span></td>
                </tr>
                <tr>
                    <td width="15%">Solusi</td>
                    <td><span id="solusi-penyakit">Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda autem minima ut quia, sint blanditiis cum nulla delectus, repudiandae dolor dignissimos. Quisquam corrupti atque alias sed suscipit ipsa odit!</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="popup-update-penyakit" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Update Data Penyakit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/home/update_penyakit/".$username)?>" method="POST">
                    <input type="text" name=penyakit-id-edit id=penyakit-id-edit hidden>
                    <div class="form-group">
                        <label for="penyakit-nama-edit" class="form-label">Nama Penyakit</label>
                        <input autocomplete="off" type="text" class="form-control" id="penyakit-nama-edit" name="penyakit-nama-edit" required>
                    </div>
                    <div class="form-group">
                        <label for="penyakit-penyebab-edit" class="form-label">Sebab Penyakit</label>
                        <textarea class="form-control" name="penyakit-penyebab-edit" id="penyakit-penyebab-edit" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penyakit-solusi-edit" class="form-label">Solusi Penyakit</label>
                        <textarea class="form-control" name="penyakit-solusi-edit" id="penyakit-solusi-edit" rows="3"></textarea>
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
    function detail_penyakit(a){
        var id=a.id;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/detailpenyakit') ?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $('#nama-penyakit').text(data["penyakit_nama"]);
                $('#penyebab-penyakit').text(data["penyakit_penyebab"]);
                $('#solusi-penyakit').text(data["penyakit_solusi"]);
            }
        });
    }
    function edit_penyakit(a){
        var id = a.id;
        $('#penyakit-id-edit').val(id);
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/detailpenyakit') ?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                    $('#penyakit-nama-edit').val(data["penyakit_nama"]);
                    $('#penyakit-penyebab-edit').val(data["penyakit_penyebab"]);
                    $('#penyakit-solusi-edit').val(data["penyakit_solusi"]);
            }
        });
    }
    function hapus_penyakit(a){
        var id = a.id;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/hapuspenyakit') ?>",
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