<?php 

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=laporan.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pariwisata</title>
</head>
<body>

      <div> <h5>Urusan Pilihan Pariwisata</h5>
      </div>
      <table border="1px solid" width="100%">
        <thead>
          <tr>
            <th >#</th>
            <th colspan="1">Element</th>

            <?php foreach($tahun as $th){?>
            <th>  <?php echo $th['tahun']; ?> </th>
            <?php }; ?>
            <th > Satuan</th> 
            <th > Kewenangan</th> 
            <th > Data</th> 
            <th > Data</th>   
          </tr>
        </thead>
        
 
        <tbody id="kebudayaan">  
        <?php 
         $i = 0;
        foreach($datapariwisata[$tahun[0]['tahun']] as $tmp){?>
          <tr>
            <td><?php echo  $tmp['id_elemen'];?> </td>
            <td><?php echo $tmp['nama_elemen'];?> </td>
              
              <?php 
             
              foreach($tahun as $th){?>
                    <td style="width: 50px;"><?php echo $datapariwisata[$th['tahun']][$i]['value']?> </td>          
              <?php };
              $i++;
              ?>
              
              <td><?php echo $tmp['satuan'];?> </td>
              <td><?php echo $tmp['kewenangan'];?> </td>
              <td><?php echo $tmp['data_tunggal'];?> </td>
              <td><?php echo $tmp['data_sektoral'];?> </td>
          </tr>
         
        <?php }; ?>
        </tbody>
      </table>
 
 <br>
 <br>
 <div> 
      <h5>Urusan Kewajiban Kebudayaan</h5>
      </div>
      <table border="1px solid" width="100%">
        <thead>
          <tr>
            <th >#</th>
            <th colspan="1">Element</th>

            <?php foreach($tahun as $th){?>
            <th>  <?php echo $th['tahun']; ?> </th>
            <?php }; ?>
            <th > Satuan</th> 
            <th > Kewenangan</th> 
            <th > Data</th> 
            <th > Data</th>   
          </tr>
        </thead>
        
 
        <tbody id="kebudayaan">  
        <?php 
         $i = 0;
        foreach($datakebudayaan[$tahun[0]['tahun']] as $tmp){?>
          <tr>
            <td><?php echo  $tmp['id_elemen'];?> </td>
            <td><?php echo $tmp['nama_elemen'];?> </td>
              
              <?php 
             
              foreach($tahun as $th){?>
                    <td style="width: 50px;"><?php echo $datakebudayaan[$th['tahun']][$i]['value']?> </td>          
              <?php };
              $i++;
              ?>
              
              <td><?php echo $tmp['satuan'];?> </td>
              <td><?php echo $tmp['kewenangan'];?> </td>
              <td><?php echo $tmp['data_tunggal'];?> </td>
              <td><?php echo $tmp['data_sektoral'];?> </td>
          </tr>
         
        <?php }; ?>
        </tbody>
      </table>
 
 <br>
 <br>


</body>
</html>
<script>
