-- 1) Afficher le nombre de membres
SELECT COUNT(*) FROM MEMBRE;

-- 2) Afficher le titre, et le nom des recettes du membre qui a été précédemment créé
SELECT titre, auteur FROM recette r, membre m WHERE r.id_membre = m.id_membre

-- 3) Afficher le nom, la quantité, l’unité des ingrédients de la recette Tartiflette
SELECT
i.nom, 
i.quantite, 
i.unite 
FROM recette AS r
INNER JOIN ingredient AS i ON i.id_recette = r.id_recette
WHERE r.titre LIKE "%Tartiflette%";

-- 4) Afficher l’id et le titre des recettes de la catégorie Plat principale
SELECT
r.id_recette,
r.titre
FROM categorie AS c
INNER JOIN categorie_recette AS cr ON cr.id_categorie = c.id_categorie
INNER JOIN recette AS r ON r.id_recette = cr.id_recette
WHERE c.id_categorie = 2;

-- 5) Afficher l’auteur, le contenu et la note des commentaires de la recette du Velouté de carottes au cumin
SELECT
c.auteur,
c.note,
c.contenu
FROM recette AS r
INNER JOIN commentaire AS c ON r.id_recette = c.id_recette
WHERE r.id_recette = 2

-- 6) Afficher la moyenne des notes pour les 2 recettes (utiliser la fonction AVG)
SELECT AVG(note) FROM commentaire