<?php 
    /** 
     * Page de monitoring : affiche pour chaque article son nombre de vues,
     * son nombre de commentaires et sa date de publication.
     */
?>

<h2>Monitoring des articles</h2>

<table class="monitoring">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Vues</th>
            <th>Commentaires</th>
            <th>Date de publication</th>
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