<?php
/*
 * Plugin Name: bellis plugin
 * Plugin URI: https://github.com/Malenevj/eksamen_stroyscaping
 * Description: Popup med kørende slogan-bånd øverst og mørk baggrund (overlay).
 * Version: 0.6
 * Author: Malene Jonassen
 * Author URI: https://portfolio.mjwebdesigns.dk
 * License: GPL2
 */

 // Sikkerhed: Stop direkte adgang til filen
if (!defined('ABSPATH')) exit;

/* 
-------------------------------------------------------
 INDLÆS CSS OG JAVASCRIPT
-------------------------------------------------------
Dette afsnit sørger for, at WordPress automatisk henter
min style.css og script.js fra plugin-mappen, når siden
indlæses. 
-------------------------------------------------------
*/
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('bellis-style', plugin_dir_url(__FILE__).'css/style.css'); // Tilføjer CSS
    wp_enqueue_script('bellis-script', plugin_dir_url(__FILE__).'js/script.js', ['jquery'], null, true); // Tilføjer JS
});


/* 
-------------------------------------------------------
 HOVEDFUNKTION: bellis_popup_box()
-------------------------------------------------------
Dette er selve indholdet af min popup — alt HTML’en,
-------------------------------------------------------
*/
function bellis_popup_box() {
    $url = plugin_dir_url(__FILE__); // Henter plugin-stien (bruges til billeder mm.)

    // START HTML INDHOLD
    // Laver mørkt overlay bag popup-boksen
    $content  = '<div id="popup-overlay"></div>'; 

    // Selve containeren der centrerer boksen på skærmen
    $content .= '<div id="bellis-container">';

    // Popup-boksen (starter skjult med "slide-top")
    $content .= '  <div class="bellis-box slide-top" id="bellis-box">';

    // ---------------------------------------------
    // KØRENDE BANNER (øverst i popup-boksen)
    // ---------------------------------------------
    $content .= '    <div id="promotion-header">';
    $content .= '      <div class="marquee"><div class="marquee__track">';
    $content .= '        <div class="marquee__block">
                          CONNECT • CREATE • CELEBRATE • CONNECT • CREATE • CELEBRATE • 
                          CONNECT • CREATE • CELEBRATE • CONNECT • CREATE • CELEBRATE
                        </div>';
    $content .= '      </div></div>';
    $content .= '    </div>';

    // ---------------------------------------------
    // LUKKEKNAP (det lille kryds i hjørnet)
    // ---------------------------------------------
    $content .= '    <div class="bellis-close-button" id="bellis-close">&#10006;</div>';

    // ---------------------------------------------
    // BILLEDE (vises i midten af boksen)
    // ---------------------------------------------
    $content .= '    <img src="'.$url.'img/bellis_plugin_billede.png" alt="Bellis billede">';

    // ---------------------------------------------
    // TEKSTER (beskrivende tekst i boksen)
    // ---------------------------------------------
    $content .= '    <p>Hos Bellis er du ikke bare gæst, du er en del af noget større.
    				Vi connect’er, create’er og celebrate’er livet, præcis som det er.</p>';

    // ---------------------------------------------
    // KNAP (CTA – "Bliv en del af fællesskabet")
    // ---------------------------------------------
    $content .= '    <div class="button-holder">
                        <button id="bellis-button">Bliv en del af fællesskabet</button>
                     </div>';

    // Lukker boksen og containeren
    $content .= '  </div>'; // luk .bellis-box
    $content .= '</div>';   // luk .bellis-container

    // Returnér HTML’en, så WordPress kan vise den
    return $content;
}

/* 
-------------------------------------------------------
 SHORTCODE-REGISTRERING
-------------------------------------------------------
Her fortæller jeg WordPress, at [bellis_popup] skal vise
funktionen ovenfor (bellis_popup_box).
-------------------------------------------------------
*/
add_shortcode('bellis_popup', 'bellis_popup_box');
