<form action="calcul.php" method="get">
    <div class="form-group">
        <label for=""></label>
        <input type="text" name="nombre" id="" class="form-control">
    </div>

    <!-- EXO : ajouter une balise select qui affichera les valeurs suivantes
        +
        -
        /
        *
        qui aura comme name 'operateur'
        et qui sera vide par défaut (c'est-à-dire qu'aucune valeur de sera sélectionnée par défaut)
    -->
    <select name="operateur" class="form-control">
        <option value=""></option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <div class="form-group">
        <label for=""></label>
        <input type="text" name="nombre2" id="" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
    <button type="reset" class="btn btn-secondary">Effacer</button>
</form>