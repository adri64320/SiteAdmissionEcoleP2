<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Affiche</title>
    <style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <?php
      if (($handle = fopen("infoElevesMarie.csv", "r"))){
        $hpdam = 0;
        $bim = 0;
        $csm = 0;
        $iacm = 0;
        $iapm = 0;
        $iccm = 0;
        $inemm = 0;
        $visuam = 0;
          $hpda = 0;
          $bi = 0;
          $cs = 0;
          $iac = 0;
          $iap = 0;
          $icc = 0;
          $inem = 0;
          $visua = 0;
          $dernierHpda = 20;
          $dernierBi = 20;
          $dernierCs = 20;
          $dernierIac = 20;
          $dernierIap = 20;
          $dernierIcc = 20;
          $dernierInem = 20;
          $dernierVisua = 20;
          $rangmhpda = 0;
          $rangmbi = 0;
          $rangmcs = 0;
          $rangmiac = 0;
          $rangmiap = 0;
          $rangmicc = 0;
          $rangminem = 0;
          $rangmvisua = 0;

        $i=0;
        while (($data = fgetcsv($handle, 1000, ";"))){
          $option = $data[13];
          switch ($option) {
            case 'HPDA ':
              $hpdam=$hpdam+$data[4];
              $hpda++;
              if ($data[4]<$dernierHpda){
                $dernierHpda=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmhpda++;
              }

              break;
            case 'BI ':
              $bim=$bim+$data[4];
              $bi++;
              if ($data[4]<$dernierBi){
                $dernierBi=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmbi++;
              }


              break;
            case 'CS ':
              $csm=$csm+$data[4];
              $cs++;
              if ($data[4]<$dernierCs){
                $dernierCs=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmcs++;
              }

              break;
            case 'IAC ':
              $iacm=$iacm+$data[4];
              $iac++;
              if ($data[4]<$dernierIac){
                $dernierIac=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmiac++;
              }

              break;
            case 'IAP ':
              $iapm=$iapm+$data[4];
              $iap++;
              if ($data[4]<$dernierIap){
                $dernierIap=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmiap++;
              }

              break;
            case 'ICC ':
              $iccm=$iccm+$data[4];
              $icc++;
              if ($data[4]<$dernierIcc){
                $dernierIcc=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmicc++;
              }

              break;
            case 'INEM ':
              $inemm=$inemm+$data[4];
              $inem++;
              if ($data[4]<$dernierInem){
                $dernierInem=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangminem++;
              }

              break;
            case 'VISUA ':
              $visuam=$visuam+$data[4];
              $visua++;
              if ($data[4]<$dernierVisua){
                $dernierVisua=$data[4];
              }
              $j=0;
              while($data[5+$j]==null){
                $j++;
                $rangmvisua++;
              }
              switch ($j) {
                case 1:
                  $rang1v++;
                  break;
                case 2:
                  $rang2v++;
                  break;
                case 3:
                  $rang3v++;
                  break;
                case 4:
                  $rang4v++;
                case 5:
                  $rang5v++;
                  break;

                default:
                  // code...
                  break;
              }
              break;

            default:
              echo 'erreur';
              exit();
              break;
          }
      }
      fclose ($handle);
      }
      echo "<h1>Moyenne par option :</h1>
        <li>
          <ul>HPDA : ".$hpdam/$hpda."/20  Moyenne du dernier admis : ".$dernierHpda." Moyenne des rangs : ".intval($rangmhpda/$hpda)."</ul>
          <ul>BI : ".$bim/$bi."/20  Moyenne du dernier admis : ".$dernierBi." Moyenne des rangs : ".intval($rangmbi/$bi)."</ul>
          <ul>CS : ".$csm/$cs."/20  Moyenne du dernier admis : ".$dernierCs." Moyenne des rangs : ".intval($rangmcs/$cs)."</ul>
          <ul>IAC : ".$iacm/$iac."/20  Moyenne du dernier admis : ".$dernierIac." Moyenne des rangs : ".intval($rangmiac/$iac)."</ul>
          <ul>IAP : ".$iapm/$iap."/20  Moyenne du dernier admis : ".$dernierIap." Moyenne des rangs : ".intval($rangmiap/$iap)."</ul>
          <ul>ICC : ".$iccm/$icc."/20  Moyenne du dernier admis : ".$dernierIcc." Moyenne des rangs : ".intval($rangmicc/$icc)."</ul>
          <ul>INEM : ".$inemm/$inem."/20  Moyenne du dernier admis : ".$dernierInem." Moyenne des rangs : ".intval($rangminem/$inem)."</ul>
          <ul>VISUA : ".$visuam/$visua."/20  Moyenne du dernier admis : ".$dernierVisua." Moyenne des rangs : ".intval($rangmvisua/$visua)."</ul>
        </li>"
     ?>
  </body>
  </html>