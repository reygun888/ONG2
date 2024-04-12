document.addEventListener("DOMContentLoaded",()=>{
    const btnFreqDon = document.querySelectorAll(".btnFreqDon")
    
    btnFreqDon.forEach(function(btn){
        btn.addEventListener("click",function(){
            btnFreqDon.forEach(function(button){
                button.classList.remove("checkedFreqDon")
            })
            this.classList.add("checkedFreqDon")
        })
    })

    let btnsDon = document.querySelectorAll(".donValeur")

    let montantLibreInput = document.querySelector(".inputMontantLibre")

    btnsDon.forEach(function(button){
        button.addEventListener("click",function(){
            let value = button.getAttribute("data-value")

            montantLibreInput.value = value

        })
    })

    const btnMoyenDon = document.querySelectorAll(".btnMoyenDon")

    btnMoyenDon.forEach(function(btn){
        btn.addEventListener("click",function(){
            document.querySelectorAll(".moyenCheckedDivDon").forEach(function(div){
                div.classList.remove("moyenCheckedDivDon")
            })
            /* Ajouter la classe moyenCheckedDiv a la div parent du bouton cliqué */
            this.parentNode.classList.add("moyenCheckedDivDon")
        })
    })

    let switchCoor = document.querySelector(".switchCoor")
    let toggleDivCoor = document.querySelector(".toggleDivCoor")
    let switchFormSoc = document.querySelector(".switchFormSoc")
    let switchFormPers = document.querySelector(".switchFormPers")

    switchCoor.addEventListener("change",function(){
        if(toggleDivCoor.querySelector('input[type="checkbox"]').checked){
            switchFormSoc.classList.remove("hiddenSwitch")
            switchFormPers.classList.add("hiddenSwitch")
        }else{
            switchFormSoc.classList.add("hiddenSwitch")
            switchFormPers.classList.remove("hiddenSwitch")
        }
    })
})