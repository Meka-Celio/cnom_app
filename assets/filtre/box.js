// FILTRE SUR ANNEES

// Initialisation
window.addEventListener("DOMContentLoaded", (event) => {

    var mesCheck    = document.querySelectorAll("input[aria-details]")
    var newT        = []
    var msgTab      = []

    for (let index = 0; index < mesCheck.length; index++) {
        msgTab.push(mesCheck[index]) 
    }

    for (let index = mesCheck.length-1; index >= 0; index--) {
        newT.push(mesCheck[index]) 
    }

    var firstElement = newT[0];

    newT.forEach(input => {
        input.addEventListener('click', (e) => {
            var anneeIndex = input.getAttribute("aria-details")
            for (let index = anneeIndex; index < newT.length; index++){
                if (firstElement.checked) {
                    if (newT[index].checked) {
                        input.checked = true
                    } else {
                        input.checked = false
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "5000",
                            "hideDuration": "5000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        var parentLabel = msgTab[index].previousElementSibling
                        var textAnneePrecedent = parentLabel.innerText
                        toastr.info("Veuillez d'abord payer l'année " + textAnneePrecedent)
                    }
                }  
                else {
                    input.checked = false
                } 
            }
        })
    });
});