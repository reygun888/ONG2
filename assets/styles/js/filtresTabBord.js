// Sélectionner les boutons de navigation
// const boutonMembres = document.querySelector('.nav-link span:contains("Membres")');
const membresLink = Array.from(document.querySelectorAll('.nav-link')).find(link => link.textContent.trim() === 'Membres');
const boutonArticles = Array.from(document.querySelectorAll('.nav-link')).find(link => link.textContent.trim() === 'Articles');
const boutonDons = Array.from(document.querySelectorAll('.nav-link')).find(link => link.textContent.trim() === 'Dons');
const boutonForfaits = Array.from(document.querySelectorAll('.nav-link')).find(link => link.textContent.trim() === 'Forfaits');
const boutonCustoms = Array.from(document.querySelectorAll('.nav-link')).find(link => link.textContent.trim() === 'Custom');

// Sélectionner les sections à masquer/afficher
const sectionAdherents = document.querySelector('.adh');
const sectionArticles = document.querySelector('.art');
const sectionDons = document.querySelector('.don');
const sectionForfaits = document.querySelector('.for');
const sectionCustoms = document.querySelector('.cus');

// Ajouter un événement "click" sur les boutons de navigation
membresLink.addEventListener('click', function() {
    // Afficher les sections
    sectionAdherents.style.display = 'block';
    // Masquer les sections
    sectionArticles.style.display = 'none';
    sectionDons.style.display = 'none';
    sectionForfaits.style.display = 'none';
    sectionCustoms.style.display = 'none';
});


boutonArticles.addEventListener('click', function() {
    // Masquer les sections
    sectionAdherents.style.display = 'none';
    sectionDons.style.display = 'none';
    sectionForfaits.style.display = 'none';
    sectionCustoms.style.display = 'none';
    // Afficher les sections
    sectionArticles.style.display = 'block';
    });

boutonDons.addEventListener('click', function() {
    // Masquer les sections
    sectionAdherents.style.display = 'none';
    sectionForfaits.style.display = 'none';
    sectionCustoms.style.display = 'none';
    sectionArticles.style.display = 'none';
    // Afficher les sections
    sectionDons.style.display = 'block';
});

boutonForfaits.addEventListener('click', function() {
    // Masquer les sections
    sectionAdherents.style.display = 'none';
    sectionDons.style.display = 'none';
    sectionCustoms.style.display = 'none';
    sectionArticles.style.display = 'none';
    // Afficher les sections
    sectionForfaits.style.display = 'block';
});

boutonCustoms.addEventListener('click', function() {
    // Masquer les sections
    sectionAdherents.style.display = 'none';
    sectionForfaits.style.display = 'none';
    sectionDons.style.display = 'none';
    sectionArticles.style.display = 'none';
    // Afficher les sections
    sectionCustoms.style.display = 'block';
});
