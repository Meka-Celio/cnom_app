<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=devicewidth, initialscale=1">
	<title>Filtre sur année</title>

	<style type="text/css">
	.hide {
		visibility: hidden;
	}	


</style>

</head>
<body>

	2021<input class="cel hide" type="checkbox" name="" id="37" value="37">
	2020<input class="cel hide" type="checkbox" name="" id="36" value="36">
	2019<input class="cel hide" type="checkbox" name="" id="35" value="35">
	2018<input class="cel hide" type="checkbox" name="" id="34" value="34">
	2017<input class="cel hide" type="checkbox" name="" id="33" value="33">

<script>

// Le tableau des années
let checkBoxTabGlobal 		= document.querySelectorAll('.cel')   

// Dernier element du tableau global
let lastCheckBoxElement =  	checkBoxTabGlobal[checkBoxTabGlobal.length-1]	
// Initialisation
if (lastCheckBoxElement.classList.contains('hide'))
{
	lastCheckBoxElement.classList.remove('hide')
}
// Initialisation tableau de tous les inputs
let checkBoxTab 		=	Object.values(checkBoxTabGlobal)

for (let i=0; i < checkBoxTab.length; i++)
{
	let checkbox = checkBoxTab[i]
	checkbox.addEventListener('change', function(){
		if (lastCheckBoxElement.checked)
		{
			let last = checkBoxTab[length-1]
			if (checkbox.classList.contains('hide')) {
				checkbox.classList.remove('hide')
			}
		}
		else {
			for (j=0; j < checkBoxTab.length; j++)
			{
				if ()
			}
		}
	})
}



</script>


</body>
</html>
