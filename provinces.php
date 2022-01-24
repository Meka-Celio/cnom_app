<?php 
	require 'model.collection.php';

	$id_region = $_GET['id'];

	$provinces = getProvinceByRegion($id_region);

 ?>

<?php foreach ($provinces as $province) { ?>
	<option value="<?php echo $province->ID_Province ?>"><?php echo $province->Nom_Province ?></option>
<?php } ?>
