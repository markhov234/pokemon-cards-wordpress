<?php
/*
Template Name: Set Details
*/

get_header();

function displaySetInfo($setInfoData)
{
    echo '<div class="set-details">';
    echo '<h1>' . $setInfoData['name'] . '</h1>';
    echo '<h2>' . $setInfoData['series'] . '</h2>';
    echo '<div class="set-details-info-container">';
    echo '<p>' . $setInfoData['printedTotal'] . '</p>';
    echo '<p>' . $setInfoData['total'] . '</p>';
    echo '<p>' . $setInfoData['releaseDate'] . '</p>';
    echo '<p>' . $setInfoData['updatedAt'] . '</p>';
    echo '</div>';
    echo '<div class="set-details-image-container">';
    echo '<img  src="' . $setInfoData['images']['logo'] . '" ></img>';
    echo '<img  src="' . $setInfoData['images']['symbol'] . '" ></img>';
    echo '</div>';
    echo '</div>';
}

function displayCardInfo($card)
{
    echo '<div class="pokemon-card">';
    echo '<h2>' . esc_html($card['name']) . '</h2>';
    echo '<img src="' . esc_url($card['images']['large']) . '" alt="' . esc_attr($card['name']) . '">';

    // Display prices
    echo '<div>';
    echo '<h3>Prices</h3>';
    echo '<ul>';
    echo '<li> <a target="_blank" href="' . esc_html($card['tcgplayer']['url']) . '"> Voir les le prix des cartes sur TCgPLAYER </a></li>';
    foreach ($card['tcgplayer']['prices'] as $priceCategory => $priceList) {
        echo '<li>' . esc_html($priceCategory) . ':';
        echo '<ul>';
        foreach ($priceList as $cardPrice) {
            echo '<li class="pokemon-type">' . esc_html($cardPrice) . '</li>';
        }
        echo '</ul>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}

$setId = isset($_GET['id']) ? sanitize_text_field($_GET['id']) : '';

if (!empty($setId)) {
    $setSetsInfo = make_pokemon_api_request('sets/' . $setId);
    $setCards = make_pokemon_api_request('cards', ['q' => 'set.id:' . $setId]);

    if (!empty($setSetsInfo) && !empty($setSetsInfo['data'])) {
        $setSetsInfoData = $setSetsInfo['data'];
        displaySetInfo($setSetsInfoData);
    }

    if (!empty($setCards) && !empty($setCards['data'])) {
        echo '<div class="card">';
        echo '<h1>Cards from the Set</h1>';
        echo '<div class="cards-container">';
        foreach ($setCards['data'] as $card) {
            displayCardInfo($card);
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p>No cards found for this set.</p>';
    }
} else {
    echo '<p>No Set ID provided.</p>';
}

get_footer();
