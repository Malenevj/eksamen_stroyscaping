// Når hele dokumentet (DOM) er klar, starter JavaScript-koden
document.addEventListener('DOMContentLoaded', function() {

    // Finder popup-boksen og overlayet og gemmer dem i variabler
    var box = document.getElementById('bellis-box');       // Selve popup-boksen
    var overlay = document.getElementById('popup-overlay'); // Det mørke overlay bag popup’en

    /* -----------------------------------------------------
       START: Skjul popup’en fra begyndelsen
       -----------------------------------------------------
       jeg tilføjer klassen .slide-top, som (via CSS)
       flytter boksen ud af syne over toppen af skærmen.
    ----------------------------------------------------- */
    box.classList.add('slide-top');

    /* -----------------------------------------------------
       VIS POPUP AUTOMATISK EFTER 1 SEKUND
       -----------------------------------------------------
       Efter 1000 ms (1 sekund) fjernes .slide-top og
       erstattes med .slide-down → så glider boksen ned.
       Samtidig aktiveres overlayet med .active-klassen,
       som gør baggrunden mørk.
    ----------------------------------------------------- */
    setTimeout(function() {
        box.classList.remove('slide-top');
        box.classList.add('slide-down');
        overlay.classList.add('active'); // Gør overlayet synligt
    }, 1000);

    /* -----------------------------------------------------
       LUKKEKNAP (X øverst i boksen)
       -----------------------------------------------------
       Når brugeren klikker på #bellis-close:
       - Fjern .slide-down → tilføj .slide-top (boksen glider væk)
       - Fjern .active på overlayet → mørket forsvinder
    ----------------------------------------------------- */
    var closeBtn = document.getElementById('bellis-close');
    closeBtn.addEventListener('click', function() {
        box.classList.remove('slide-down');
        box.classList.add('slide-top');
        overlay.classList.remove('active');
    });

    /* -----------------------------------------------------
       KNAPFUNKTION (CTA-knap)
       -----------------------------------------------------
       Når man klikker på knappen #bellis-button,
       tages man hen til siden Bag Bellis
    ----------------------------------------------------- */
    var ctaBtn = document.getElementById('bellis-button');
    ctaBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Forhindrer evt. standardknapadfærd
        window.location.href = 'https://storyscaping.shstudio.dk/elementor-615/home/';
    });

    /* -----------------------------------------------------
       EKSTRA: Klik på overlayet lukker også popup’en
       -----------------------------------------------------
       Dette gør, at man kan klikke udenfor boksen
       for at lukke popup’en – en typisk brugerfunktion.
    ----------------------------------------------------- */
    overlay.addEventListener('click', function() {
        box.classList.remove('slide-down');
        box.classList.add('slide-top');
        overlay.classList.remove('active');
    });
});
