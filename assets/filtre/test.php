<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=devicewidth, initialscale=1">
	<title>Filtre sur année</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

    <form action="#">
        <label for="">2021</label>
        <input type="checkbox" aria-details="4">
        <label for="">2020</label>
        <input type="checkbox" aria-details="3">
        <label for="">2019</label>
        <input type="checkbox" aria-details="2">
        <label for="">2018</label>
        <input type="checkbox" aria-details="1">
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</script>
<script src="box.js"></script>
</body>
</html>


<!-- JAVASCRIPT -->
<!-- window.addEventListener("DOMContentLoaded", (event) => {

    var mesCheck = document.querySelectorAll("input[aria-details]")
    var newT = []

    for (let index = mesCheck.length-1; index >= 0; index--) {
        newT.push(mesCheck[index]) 
    }

    // for (let index = 0; index < mesCheck.length; index++) {
    //     newT.push(mesCheck[index])
    // }

    // var reverseT = newT.reverse()

    console.log('Tableau')
    console.log(newT)

    newT.forEach(input => {
        input.addEventListener('click', (e) => {
            var anneeIndex = input.getAttribute("id")
            var firstNewT = newT[0]
            //for (let index = newT.length-1; index >= 0; index--) {
            //for (let index = 0; index < newT.length; index++) {
            for (let index = anneeIndex; index >= 0; index--){
                console.log(newT[index])
                if (newT[index].checked) {
                    // if (firstNewT.checked) {
                        
                    // }
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


 -->