AltoWithCSS3
============
Le configurateur permet de choisir d'afficher ou non le menu (simpleMenu ou Menu requis) et quelle largeur de page vous voulez (880px ou 1024px).

Dimensions pour les images de bannière :
- affichage 880 : 723px x 150px
- affichage 1024 : 866px x 150px

Si vous voulez en ajouter d'autres, il est impératif de se conformer aux règles suivantes :
- les nommer de manière identique "roundX.ext" où X est un chiffre
- en cas d'ajout (et non de remplacement), il faut modifier :
  * le fichier tpl/user_head.html et indiquer en ligne 3 (```var round = parseInt(Math.random()*3);```) le nombre total d'image de bannière (3 par défaut)
  * le fichier css correspondant à la largeur de page choisi (css/880.css ou css/1024.css) en prenant exemple sur la déclaration css en ligne 29 : ```.round0 { background : transparent url(../img/1024/round0.jpg) no-repeat top left; }```
