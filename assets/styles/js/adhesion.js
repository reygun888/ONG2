    // Sélectionnez les éléments à masquer/afficher
    const adherentFields = document.querySelectorAll('#user_civilite, #user_prenom');
    const entrepriseFields = document.querySelectorAll('#user_siren, #user_formeJuridique');

    // Masquez les champs pour le type "entreprise" par défaut
    entrepriseFields.forEach(field => {
        field.style.display = 'none';
    });

    // Ajoutez un écouteur d'événement sur le champ "type"
    const typeSelect = document.querySelector('#user_type');
    typeSelect.addEventListener('change', function() {
        if (this.value === 'adherent') {
            // Affichez les champs pour le type "adhérent"
            adherentFields.forEach(field => {
                field.style.display = 'block';
            });
            // Masquez les champs pour le type "entreprise"
            entrepriseFields.forEach(field => {
                field.style.display = 'none';
            });
        } else if (this.value === 'entreprise') {
            // Masquez les champs pour le type "adhérent"
            adherentFields.forEach(field => {
                field.style.display = 'none';
            });
            // Affichez les champs pour le type "entreprise"
            entrepriseFields.forEach(field => {
                field.style.display = 'block';
            });
        }
    });
    
    const divBtnAdh = document.querySelector(".divBtnAdh")
    const divBtnZone = document.querySelector(".divBtnZone")

    divBtnAdh.querySelectorAll(".btnCotisation").forEach(function(btn){
        btn.addEventListener("click",function(){
            divBtnAdh.querySelectorAll(".btnCotisation").forEach(function(btn){
                btn.classList.remove("checkedCotisation")
            })
            this.classList.add("checkedCotisation")

            updatePrix()
        })
    })

    divBtnZone.querySelectorAll(".btnCotisation").forEach(function(btn){
        btn.addEventListener("click",function(btn){
            divBtnZone.querySelectorAll(".btnCotisation").forEach(function(btn){
                btn.classList.remove("checkedCotisation")
            })
            this.classList.add("checkedCotisation")

            updatePrix()
        })
    })

    const adhPrixDiv = document.getElementById("adhPrixDiv")

    const prix ={
        adhSimple:{
            zoneAfrique:"9.000 frcfa",
            zoneEurope:"13,73 €"
        },
        adhCadre:{
            zoneAfrique:"50.000 frcfa",
            zoneEurope:"76,28 €"
        }
    }

    function updatePrix(){
        const simpleSelected = document.getElementById("simpleBtn").classList.contains("checkedCotisation")
        const afriqueSelected = document.getElementById("afriqueBtn").classList.contains("checkedCotisation")

        const selectedPrice = simpleSelected ? prix.adhSimple : prix.adhCadre

        const priceText = afriqueSelected ? selectedPrice.zoneAfrique : selectedPrice.zoneEurope

        adhPrixDiv.querySelector("span").textContent = priceText
    }

    updatePrix()

    const btnMoyen = document.querySelectorAll(".btnMoyen")

    btnMoyen.forEach(function(btn){
        btn.addEventListener("click",function(){
            document.querySelectorAll(".moyenCheckedDiv").forEach(function(div){
                div.classList.remove("moyenCheckedDiv")
            })
            /* Ajouter la classe moyenCheckedDiv a la div parent du bouton cliqué */
            this.parentNode.classList.add("moyenCheckedDiv")
        })
    })






