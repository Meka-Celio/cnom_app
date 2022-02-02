
window.addEventListener("DOMContentLoaded", (event) => {

    var mesCheck = document.querySelectorAll("input")
    console.log(mesCheck)
    var newT = []

    for (let index = mesCheck.length; index >= 0; index--) {
        newT.push(mesCheck[index]) 
    }

    // for (let index = 0; index < mesCheck.length; index++) {
    //     newT.push(mesCheck[index])
    // }


    newT.forEach(input => {
        input.addEventListener('click', (e) => {
            var anneeIndex = input.getAttribute("aria-details")
            //for (let index = 0; index < anneeIndex; index++) {
            for (let index = anneeIndex; index >= 0; index--){
                if (newT[index].checked) {
                    input.checked = true
                } else {
                    input.checked = false
                    toastr.options = {
                        "closeButton": false,
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
                    var parentLabel = newT[index].previousElementSibling
                    var textAnneePrecedent = parentLabel.innerText
                    toastr.info("Veuillez d'abord payer l'année " + textAnneePrecedent)
                }
            }
        })

    });


});















// let checkboxes = document.querySelectorAll('.hide');
// let boxes  = checkboxes.some(el => {
//     return document.getElementById('id').firstChild
// });

// console.log(boxes);


// function selectAll(){
//     let checkboxes = document.querySelectorAll('.hide');
//     for (let i = 0; i < checkboxes.length; i++) {
//         checkboxes[i].checked = true;
        
//     }
// }


// function deselectAll(){
//     let checkboxes = document.getElementsByName('checkbox');
//     for (let i = 0; i < checkboxes.length; i++) {
//           checkboxes[i].checked = false;
        
//     };
// }




// var boxes = document.querySelectorAll(".hide");

// function checkAll(myCheckbox){
//     if (myCheckbox.checked == true) {
//         boxes.forEach(function (box){
//             box.checked == true;
//         });
//     }
//     else{
//         boxes.forEach(function (box){
//             box.checked == false;
//         });
//     }
// }


