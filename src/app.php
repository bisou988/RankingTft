<?php

declare(strict_types = 1);

require_once(__DIR__ . '/Player.php');

$silver= [
    new Player('ludo'),
    new Player('yami'),
    new Player('bizoux'),
    new Player('hazu'),
    new Player('kouik'),
    new Player('stark'),
    new Player('pedro'),
    new Player('ade'),
    new Player('karen'),
    new Player('azyazy')
];

$gold = [];

function findPositionForPlayer(array $currentDivision, string $nickname): int {
    foreach ($currentDivision as $position => $player) {
        if ($nickname === $player->getName()) {
            return $position;
        }
    }
}

function removePlayerFromDivision(array $oldDivision, string $nickname): array {
    unset($oldDivision[findPositionForPlayer($oldDivision, $nickname)]);
    $oldDivision = array_values($oldDivision);
    return $oldDivision;
}

function movePlayerAcrossDivisions(array $oldDivision, string $nickname, array $newDivision): array {
    $player = $oldDivision[findPositionForPlayer($oldDivision, $nickname)];
    $newDivision[] = $player;
    removePlayerFromDivision($oldDivision, $nickname);

    return $newDivision;
}


/*
movePlayerAcrossDivisions($silver, 'ade', $gold)
removePlayerFromDivision($silver,'bizoux')
*/
