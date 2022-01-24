// Validation de formulaire

/*-------------------------------------------
LES FONCTIONS
------------------------------------------*/

function valideMail (postMail) {
	console.log(postMail)
	let ok = 0
	let mail = ""
	// Verifier si le champ est vide
	if (postMail.trim() == " ") {
		mail = null
	} 
	else {
		// Verifier que mail respecte le format
		let pattern = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i
		if (pattern.test(postMail)) {
			ok = 1
			mail = postMail
		} 
		else {
			mail = false
		}
	}
	return [ok, mail]
}

function valideNumber (postNumber) {
	let ok = 0
	let number = 0

	if (postNumber.trim() == "") {
		number = 0
	} else {
		let x = 0
		x = postNumber * (-2)

		if (x) {
			number = postNumber
			ok = 1
		}
	}
	return [ok, number]
}

function valideString (postString) {
	let ok = 0
	let string = ""

	if (postString.trim() == "") {
		string = false
	} else {
		sting = postString
	}
	return [ok, string]
}


/*--------------------------------------------
Les variables
---------------------------------------------*/
let inputs 		= 	document.querySelectorAll('[data-type]')
let formulaire 	= 	document.getElementById('formulaire')
let errors 		= 	document.querySelectorAll('[data-error]')
console.log(inputs)

// MAIN

formulaire.addEventListener('submit', function (e) {

	// Définir les règles de vérification via les data-types
	// Définir les actions en fonction du type

	let nbrValidation = 0

	for (i=0; i<inputs.length; i++) {
		let type 	= 	inputs[i].getAttribute('data-type')
		let typeError 	=	errors[i].getAttribute('data-error') 

		switch (type) {
			case 'mail' : 
				let tabMail = valideMail(inputs[i].value)
				nbrValidation += tabMail[0]
				if (typeError == type) {
					if (tabMail[1] == null) {
						errors[i].classList.add('visible')
						errors[i].innerHTML = 'Le champ ne doit pas être vide !'
					} 
					else if (tabMail[1]) {
						errors[i].classList.remove('visible')
						errors[i].innerHTML = ''
					} else {
						errors[i].classList.add('visible')
						errors[i].innerHTML = 'Email invalide !'
					}
				}
				break;

			case 'number' :
				let tabNumber = valideNumber(inputs[i].value)
				nbrValidation += tabNumber[0]
				if (typeError == type) {
					if (tabNumber[1] == 0) {
						errors[i].classList.add('visible')
						errors[i].innerHTML = 'Telephone invalide !'
					}
					else {
						errors[i].classList.remove('visible')
						errors[i].innerHTML = ''
					}
				}
				break;

			case 'string' :
				let tabString = valideString(inputs[i].value)
				nbrValidation += tabString[0]
				if (typeError == type) {
					if (tabString[1]) {
						errors[i].classList.remove('visible')
						errors[i].innerHTML = ''
					}
					else {
						errors[i].classList.add('visible')
						errors[i].innerHTML = 'Le champ ne doit pas être vide !'
					}
				}
				break;
			default:break;
		}
	}

	if (nbrValidation === inputs.length) {
		
	} else {
		e.preventDefault()
	}
	console.log(nbrValidation)
})
