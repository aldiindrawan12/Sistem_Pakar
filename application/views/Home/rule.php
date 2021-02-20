<div class="container">
    <div>
        <a href="" class="btn btn-primary m-3" data-toggle="modal" data-target="#popup-tambah-rule"><i class="fas fa-plus"></i>Tambah Rule</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">No</th>
                    <th>Jika</th>
                    <th>Maka</th>
                    <th>Keyakinan Pakar</th>
                    <th>Ketidakyakinan Pakar</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $n=1;
            foreach($rule as $value){?>
                <tr>
                    <td><?= $n?></td>
                    <td><?= $value["gejala_name"]?></td>
                    <td><?= $value["penyakit_nama"]?></td>
                    <td><?= $value["belief"]?></td>
                    <td><?= $value["disbelief"]?></td>
                    <td class="text-center">
                        <a class='btn btn-secondary btn-edit' data-toggle='modal' data-target='#popup-update-rule' id="<?= $value["rule_id"]?>" onclick="edit_rule(this)"><i class='fas fa-pen-square'></i></a> ||
                        <a class='btn btn-secondary btn-hapus' id="<?= $value["rule_id"]?>" onclick="hapus_rule(this)"><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>
            <?php $n++;
            }?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="popup-update-rule" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Update Data Rule</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/home/update_rule/".$username)?>" method="POST">
                    <input type="text" name=rule-id-edit id=rule-id-edit hidden>
                    <div class="form-group">
                        <label for="gejala-nama-edit" class="form-label">Nama Gejala</label>
                        <select name="gejala-nama-edit" id="gejala-nama-edit" class="form-control" required>
                            <option class="font-w700" disabled="disabled" selected value="">Nama Gejala</option>
                            <?php foreach($gejala as $value){?>
                                <option value="<?=$value["gejala_id"]?>"><?=$value["gejala_name"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penyakit-nama-edit" class="form-label">Nama Penyakit</label>
                        <select name="penyakit-nama-edit" id="penyakit-nama-edit" class="form-control" required>
                            <option class="font-w700" disabled="disabled" selected value="">Nama Penyakit</option>
                            <?php foreach($penyakit as $value){?>
                                <option value="<?=$value["penyakit_id"]?>"><?=$value["penyakit_nama"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="belief-edit" class="form-label">Nilai Kepercayaan</label>
                        <input autocomplete="off" type="text" class="form-control" id="belief-edit" name="belief-edit" required>
                    </div>
                    <div class="form-group">
                        <label for="disbelief-edit" class="form-label">Nilai ketidakpercayaan</label>
                        <input autocomplete="off" type="text" class="form-control" id="disbelief-edit" name="disbelief-edit" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-3 float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-tambah-rule" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Tambah Data Rule</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/home/insert_rule/".$username)?>" method="POST">
                    <input type="text" name=rule-id-edit id=rule-id-edit hidden>
                    <div class="form-group">
                        <label for="gejala-nama-insert" class="form-label">Nama Gejala</label>
                        <select name="gejala-nama-insert" id="gejala-nama-insert" class="form-control" required>
                            <option class="font-w700" disabled="disabled" selected value="">Nama Gejala</option>
                            <?php foreach($gejala as $value){?>
                                <option value="<?=$value["gejala_id"]?>"><?=$value["gejala_name"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penyakit-nama-insert" class="form-label">Nama Penyakit</label>
                        <select name="penyakit-nama-insert" id="penyakit-nama-insert" class="form-control" required>
                            <option class="font-w700" disabled="disabled" selected value="">Nama Penyakit</option>
                            <?php foreach($penyakit as $value){?>
                                <option value="<?=$value["penyakit_id"]?>"><?=$value["penyakit_nama"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="belief-insert" class="form-label">Nilai Kepercayaan</label>
                        <input autocomplete="off" type="text" class="form-control" id="belief-insert" name="belief-insert" required>
                    </div>
                    <div class="form-group">
                        <label for="disbelief-insert" class="form-label">Nilai ketidakpercayaan</label>
                        <input autocomplete="off" type="text" class="form-control" id="disbelief-insert" name="disbelief-insert" required>
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
    function edit_rule(a){
        var id = a.id;
        $('#rule-id-edit').val(id);
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/detailrule') ?>",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {   
                    $('#penyakit-nama-edit').val(data["penyakit_id"]);
                    $('#gejala-nama-edit').val(data["gejala_id"]);
                    $('#belief-edit').val(data["belief"]);
                    $('#disbelief-edit').val(data["disbelief"]);
            }
        });
    }
    function hapus_rule(a){
        var id = a.id;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/home/hapusrule') ?>",
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