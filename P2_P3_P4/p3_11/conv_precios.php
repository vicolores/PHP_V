<?php
// conv_precios.php

/**
 * Convierte pesetas a euros.
 *
 * @param float $pesetas Cantidad en pesetas.
 * @return float Cantidad en euros.
 */
function pesetas($pesetas) {
    $euros = $pesetas / 166.386;
    return $euros; 
}

/**
 * Convierte euros a pesetas.
 *
 * @param float $euros Cantidad en euros.
 * @return float Cantidad en pesetas.
 */
function euros($euros) {
    $pesetas = $euros * 166.386;
    return $pesetas; 
}
?>