<?php 
    /** 
     * Page de monitoring : affiche pour chaque article son nombre de vues,
     * son nombre de commentaires et sa date de publication.
     * Le tableau peut être trié en cliquant sur l'en-tête d'une colonne.
     */

    // Colonnes du tableau : critère de tri => libellé affiché.
    $columns = [
        'title' => 'Titre',
        'views' => 'Vues',
        'comments' => 'Commentaires',
        'date' => 'Date de publication'
    ];
?>

<h2>Monitoring des articles</h2>

<table class="monitoring">
    <thead>
        <tr>
            <?php foreach ($columns as $column => $label) {
                $isSorted = ($column === $sort);

                // Un clic sur la colonne déjà triée en croissant la trie en décroissant.
                // Un clic sur une autre colonne la trie en croissant.
                $nextOrder = ($isSorted && $order === 'asc') ? 'desc' : 'asc';

                // Flèche : ▲ croissant, ▼ décroissant, ⇅ colonne triable mais pas triée.
                if ($isSorted) {
                    $arrow = $order === 'asc' ? '▲' : '▼';
                } else {
                    $arrow = '⇅';
                }
            ?>
                <th>
                    <a href="index.php?action=monitoring&sort=<?= $column ?>&order=<?= $nextOrder ?>" class="<?= $isSorted ? 'sorted' : '' ?>" title="Trier par <?= strtolower($label) ?>">
                        <?= $label ?> <span class="arrow"><?= $arrow ?></span>
                    </a>
                </th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= htmlspecialchars($article->getTitle()) ?></td>
                <td class="number"><?= $article->getViews() ?></td>
                <td class="number"><?= $article->getNbComments() ?></td>
                <td><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>