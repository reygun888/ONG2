document.addEventListener("DOMContentLoaded",()=>{
    const btnFreqDon = document.querySelectorAll(".btnFreqDon")
    let btnsDon = document.querySelectorAll(".donValeur")
    btnsDon.forEach(function(button){
        button.addEventListener("click",function(){
            let value = button.getAttribute("data-value")
            montantLibreInput.value = value
        })
    })
})
// Créez un client Stripe
var stripe = Stripe('VOTRE_CLE_PUBLISHABLE_STRIPE', {
    // Spécifiez la devise par défaut
    currency: 'eur'
});
// Créez un élément de carte
var elements = stripe.elements();
var card = elements.create('card');
card.mount('#card-element-container');
// Ajoutez un écouteur d'événements au champ de civilité
var civiliteInput = document.querySelector('.civiliteDon');
civiliteInput.addEventListener('change', function() {
    // Récupérez la valeur sélectionnée
    var civilite = this.value;
    // Stockez la valeur dans un champ caché dans votre formulaire
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'civilite');
    hiddenInput.setAttribute('value', civilite);
    document.getElementById('payment-form').appendChild(hiddenInput);
});
// Ajoutez des écouteurs d'événements aux autres champs du formulaire
var nomInput = document.querySelector('.nomDon');
var prenomInput = document.querySelector('.prenomDon');
var adresseInput = document.querySelector('.adresseDon');
var codePostalInput = document.querySelector('.codePostalDon');
var paysInput = document.querySelector('.selectPaysDon');
var emailInput = document.querySelector('.emailDon');
[nomInput, prenomInput, adresseInput, codePostalInput, paysInput, emailInput].forEach(function(input) {
    input.addEventListener('input', function() {
        // Récupérez la valeur saisie
        var value = this.value;
        // Stockez la valeur dans un champ caché dans votre formulaire
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', this.name);
        hiddenInput.setAttribute('value', value);
        document.getElementById('payment-form').appendChild(hiddenInput);
    });
});
// Ajoutez un écouteur d'événements aux boutons de don
var donButtons = document.querySelectorAll('.donValeur');
donButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupérez le montant sélectionné
        var amount = this.dataset.value * 100; // Convertissez en centimes
        // Mettez à jour l'élément d'affichage du montant
        document.getElementById('montant-selectionne').textContent = 'Montant du don : ' + amount / 100 + ' €';
        // Stockez le montant dans un champ caché dans votre formulaire
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'amount');
        hiddenInput.setAttribute('value', amount);
        document.getElementById('payment-form').appendChild(hiddenInput);
    });
});

// Ajoutez un écouteur d'événements à l'input de montant libre
var montantLibreInput = document.querySelector('.inputMontantLibre');
montantLibreInput.addEventListener('input', function() {
    // Récupérez le montant saisi
    var amount = this.value * 100; // Convertissez en centimes
    // Mettez à jour l'élément d'affichage du montant
    document.getElementById('montant-selectionne').textContent = 'Montant du don : ' + amount / 100 + ' €';
    // Stockez le montant dans un champ caché dans votre formulaire
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'amount');
    hiddenInput.setAttribute('value', amount);
    document.getElementById('payment-form').appendChild(hiddenInput);
});
// Récupérez le sélecteur de mode de paiement
var paymentMethodSelect = document.getElementById('payment-method');
// Ajoutez un écouteur d'événements pour le changement de mode de paiement
paymentMethodSelect.addEventListener('change', function() {
    // Récupérez le conteneur de l'élément de carte Stripe
    var cardElementContainer = document.getElementById('card-element-container');
    // Si le mode de paiement sélectionné est la carte, affichez l'élément de carte Stripe
    if (paymentMethodSelect.value === 'card') {
        cardElementContainer.style.display = 'block';
    } else {
        // Sinon, masquez l'élément de carte Stripe
        cardElementContainer.style.display = 'none';
    }
});

// Gérez la soumission du formulaire
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();
    // Récupérez le mode de paiement sélectionné
    var paymentMethod = paymentMethodSelect.value;
    // Récupérez le montant du don
    var amount = document.querySelector('input[name="amount"]').value;
    // Si le mode de paiement sélectionné est la carte, créez un jeton de paiement avec le montant du don
    if (paymentMethod === 'card') {
        // Créez un jeton de paiement avec le montant du don
        stripe.createToken(card, { amount: amount }).then(function(result) {
            if (result.error) {
                // En cas d'erreur, affichez le message dans l'élément #card-errors
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Envoyez le jeton à votre serveur
                stripeTokenHandler(result.token);
            }
        });
    } else {
        // Sinon, affichez un message d'erreur
        alert('Mode de paiement non pris en charge.');
    }
});
// Envoyez le jeton à votre serveur
function stripeTokenHandler(token) {
    // Ajoutez le jeton à votre formulaire
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    // Ajoutez les valeurs des champs cachés au formulaire
    var hiddenInputs = form.querySelectorAll('input[type="hidden"]');
    hiddenInputs.forEach(function(input) {
        form.appendChild(input.cloneNode(true));
    });
    form.submit();
}
