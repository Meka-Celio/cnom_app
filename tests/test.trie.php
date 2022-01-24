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
   
	function switchActive (html) 
	{
		let active = false
		
		if (html.classList.contains('active'))
		{
			html.classList.remove('active')
			active = false
		}
		else
		{
			html.classList.add('active')
			active = true
		}
		return active
	}

// Le tableau des années
let tabcell 		= document.querySelectorAll('.cel')   

// Dernier element du tableau global
let globalLastElement =  	tabcell[tabcell.length-1]

// Initialisation
if (globalLastElement.classList.contains('hide'))
{
	globalLastElement.classList.remove('hide')
}

// tableau global des annees
let globalCheckTab 			= document.querySelectorAll('.hide') 
let tabCheck 				= Object.values(globalCheckTab)

let estActive = false

globalLastElement.addEventListener ('click', () =>
{
	let coche = switchActive(globalLastElement)
	if (coche)
	{
		estActive = true
	}
	else {
		estActive = false
	}
})

// Boucle pour gerer la selection
for (let i=0; i < globalCheckTab.length; i++)
{	
	// Si on click sur un checkbox
	globalCheckTab[i].addEventListener('click', () => 
	{
		let self 	= globalCheckTab[i]
		let coche 	= switchActive(self)

		tabCheck = globalCheckTab
		let index = tabCheck.length-1
		let previousElement = tabCheck[index]

		// extraction du tableau de active
		for (j=0; j < tabCheck.length; j++)
		{

		}

		if (globalLastElement.checked)
		{
			if (coche)
			{
				previousElement.classList.remove('hide')
			}
			else {
				previousElement.classList.add('hide')
			}
		}
	})
}


</script>


</body>
</html>
