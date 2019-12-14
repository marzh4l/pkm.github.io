<?php  
    require_once("../koneksi.php");
    session_start();  
	ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		h4{margin-bottom: 0px;}
		h6{margin-top: 10px;}
		table{font-size: 8pt; width: 50%;}
		p{font-size: 9pt; margin-left: 500px;}
	</style>
</head>
<body>
	<table align="center">
		<tr>
			<td align="left" width="95"><img src="../img/uin.png" alt="uin.png" width="75" height="75"></td>
			<td>
				<h4 align="center">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>UNIVERSITAS ISLAM NEGERI RADEN FATAH PALEMBANG<br>PEKAN KREATIVITAS MAHASISWA 2018</h4>
				<h6 align="center">Jln. Prof K. H. Zainal Abidin Fikry No. 1 KM. 3.5 Palembang 30126<br>Telp. (0711) 353360 Website: www.radenfatah.ac.id<br>pkm.radenfatah.ac.id</h6>				
			</td>
			<td align="right" width="95"><img src="../img/logoPKM.png" alt="logoPKM.png" width="75" height="75"></td>
		</tr>
	</table>
	<hr>
	<h5 align="center">DATA PANITIA Koordinator PEKAN KREATIVITAS MAHASISWA UIN RADEN FATAH 2018</h5>
	<table border="1" cellspacing="0" >

		
            <tr align="center" bgcolor="#5974FA">
                <th width="20" height="20">No</th>
                <th width="180">Nama</th>
                <th width="120">NIP</th>
                <th width="80">No Hp</th>
                <th width="140">Jabatan</th>
                <th width="170">Panitia Koordinator</th>
            </tr>
        
        
			<?php
				$query = mysqli_query($koneksi,"SELECT nm_koor,nip,no_hp,jabatan,koordinator FROM pnt_koor");
				$no = 1;
				while($data = mysqli_fetch_array($query)) {
				$ketua = 'xxxxxxxxxxxxxx';
			?>
			<tr>
            	<td align="center" height="15"><?php echo $no++; ?></td>
            	<td><?php echo $data['nm_koor']; ?></td>
            	<td align="center"><?php echo $data['nip']; ?></td>
            	<td align="center"><?php echo $data['no_hp']; ?></td>
            	<td align="center"><?php echo $data['jabatan']; ?></td>
            	<td><?php echo $data['koordinator']; ?></td>
            </tr>
			<?php 
				} 
			?>        
	</table>
	<br><br><br><br>
	<p align="center">Ketua Pelaksana<br><br><br><br><br><br><b><?php echo $ketua; ?></b></p>
</body>
</html>
<?php  
	$filename="Daftar kontingen.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
	//==========================================================================================================  
	//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
	//==========================================================================================================  
	$content = ob_get_clean();  
	$content = '<page style="font-family: freeserif">'.($content).'</page>';  
	require_once(dirname(__FILE__).'./../html2pdf/html2pdf.class.php');  
	try {  
	 	$html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(8,9));  
	 	$html2pdf->setDefaultFont('arial','10');  
	 	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
	 	$html2pdf->Output($filename);  
	} catch(HTML2PDF_exception $e) { 
		echo $e; 
 	}  
?>  