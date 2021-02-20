
<?php
$data_user = json_decode($histori["data"],true);
$cf_singgle = [];

for($i=0;$i<count($penyakit);$i++){
    $cf_individu = [];
    $cf = [];
    for($j=0;$j<count($rule);$j++){
        if($penyakit[$i]["penyakit_id"] == $rule[$j]["penyakit_id"]){
            $data_cf=[
                "gejala_id"=> $rule[$j]["gejala_id"],
                "cf"=>$rule[$j]["belief"]
            ];
            $cf[]=$data_cf;
        }
    }
    $data = [
        "penyakit_id" => $penyakit[$i]["penyakit_id"],
        "data-cf" => $cf
    ];
    $cf_singgle[]=$data;
    echo "<br>";
}

$cf_awal = [];
for($i=0;$i<count($cf_singgle);$i++){
    $data = $cf_singgle[$i]["data-cf"];
    $cf_isi=[];
    for($j=0;$j<count($data);$j++){
        for($k=0;$k<count($data_user);$k++){
           if($data_user[$k]["gejala_id"] == $data[$j]["gejala_id"]){
               $cf= $data_user[$k]["belief"] * $data[$j]["cf"];
               $cf_isi[] = $cf;
           }
        }       
    }
    $data_isi = [
        "penyakit_id" => $cf_singgle[$i]["penyakit_id"],
        "cf-awal"=>$cf_isi
    ];
    $cf_awal[]=$data_isi;
}

echo print_r($cf_awal[0])."<br>";
echo print_r($cf_awal[1])."<br>";

$cf_akhir = [];
for($i=0;$i<count($cf_awal);$i++){
    $cf=0;
    for($j=0;$j<count($cf_awal[$i]["cf-awal"])-1;$j++){
        $cf = $cf_awal[$i]["cf-awal"][$j] + ($cf_awal[$i]["cf-awal"][$j+1]*(1-$cf_awal[$i]["cf-awal"][$j]));
    }   
    $data = [
        "penyakit_id" => $cf_awal[$i]["penyakit_id"],
        "cf" => $cf*100
    ];
    $cf_akhir[]=$data;
}

echo print_r($cf_akhir[0])."<br>";
echo print_r($cf_akhir[1])."<br><br>";

if($cf_akhir[0]>$cf_akhir[1]){
    echo "hasil diagnosa adalah = ".$penyakit[0]["penyakit_nama"]." dengan presentase = ".$cf_akhir[0]["cf"]."%";
}else if($cf_akhir[0]<$cf_akhir[1]){
    echo "hasil diagnosa adalah = ".$penyakit[1]["penyakit_nama"]." dengan presentase = ".$cf_akhir[1]["cf"]."%";
}else if($cf_akhir[0]==$cf_akhir[1]){
    echo "hasil diagnosa adalah = ".$penyakit[0]["penyakit_nama"]." atau ".$penyakit[1]["penyakit_nama"]." dengan presentase sama yaitu = ".$cf_akhir[0]["cf"]."%";
}
?>