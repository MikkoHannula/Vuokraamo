<?php
function luoInputKentta
($otsikko, $muuttujaNimi, $muuttujaArvo, $virheTeksti, $kentanTyyppi = 'text'){

    $html = '';
    $is_invalid = '';

    if(!empty($virheteksti)){
        $is_invalid = 'is_invalid';
    }


    $html = "<div class='mb-3'>";
    $html .= "<label for='muuttujaNimi' class='form-label col-sm-3'>$otsikko</label>";
    $html .= "<div class='col-sm-9'>";
    $html .= "<input name='$muuttujaNimi' value='$muuttujaArvo' type = 'kentanTyyppi' 
            class='form-control $is_invalid'>";
    $html .= "<div class='invalid-feedback'>";
    $html .= "<small>$virheTeksti</small>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "</div>";

    return $html;
}