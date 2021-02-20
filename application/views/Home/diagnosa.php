<div class="container">
    <div class="text-center">
        <h4>Mulai Diagnosa</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr class="text-center">
                   <td colspan="6">Apakah mengalami atau merasakan <span class="text-dark" id="gejala"><?= $gejala[0]["gejala_name"]?></span> ?<span id="gejala-id" style="display:none"><?= $gejala[0]["gejala_id"]?></span></td>
                </tr>
                <tr class="text-center">
                    <td><a class="btn btn-danger" id="0" onclick="keyakinan(this)">Tidak</a></td>
                    <td><a class="btn btn-warning" id="0.2" onclick="keyakinan(this)">Tidak Tahu</a></td>
                    <td><a class="btn btn-secondary" id="0.4" onclick="keyakinan(this)">Sedikit Yakin</a></td>
                    <td><a class="btn btn-info" id="0.6" onclick="keyakinan(this)">Cukup Yakin</a></td>
                    <td><a class="btn btn-primary" id="0.8" onclick="keyakinan(this)">Yakin</a></td>
                    <td><a class="btn btn-success" id="1" onclick="keyakinan(this)">Sakit Yakin</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    var n = 1;
    var data_diagnosa = [];
    function keyakinan(a){

        var keyakinan = a.id;
        
        var user = {};   
        user.gejala_id = $("#gejala-id").text();
        user.gejala_name = $("#gejala").text();
        user.belief = keyakinan;

        data_diagnosa.push(user);
        
        var gejala = [];
        var gejala_id = [];
        <?php for($i=0;$i<count($gejala);$i++){?>
            gejala.push('<?= $gejala[$i]["gejala_name"]?>');
            gejala_id.push('<?= $gejala[$i]["gejala_id"]?>');

        <?php }?>

        $("#gejala").text(gejala[n]);
        $("#gejala-id").text(gejala_id[n]);

        n++;
        
        if(n=='<?= count($gejala)+1?>'){
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/home/data_diagnosa') ?>",
                dataType: "JSON",
                data:{
                    data:data_diagnosa
                },
                success: function(data) {
                    alert(data["penyakit_id"]+"=="+data["penyakit_name"]+"=="+data["persentase"]+"=="+data["solusi"]);
                    window.location.replace("<?= base_url("index.php/home/hasil/").$username?>");
                    // location.reload();
                }
            });
        }
    }
</script>