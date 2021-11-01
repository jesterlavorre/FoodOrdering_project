
<div class="container" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);width:40%">
    <br/>
    <div class="col-sm-12 align-items-stretch ">
    <form name="dodajJelo" action="<?= site_url("Restaurant/dodajJelo") ?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Ime</label>
            <input type="text" class="form-control" name="name"  placeholder="Ime" value="<?= set_value('name') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['name']))
                echo $errors['name'];
            ?></font>
        </div>

        <div class="form-group">
            <label for="price">Cena</label>
            <input type="number" class="form-control" name="price"  placeholder="Cena" value="<?= set_value('price') ?>">
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['price']))
                echo $errors['price'];
            ?></font>
        </div>

        <div class="form-group">
            <label for="ingredient">Sastojci</label>
            <textarea type="text" class="form-control" name="ingredient"  placeholder="Sastojci" value="<?= set_value('ingredient') ?>"></textarea>
        </div>
        
        <div class="col-sm-5">
            <font color='red'>
            <?php
            if (!empty($errors['ingredient']))
                echo $errors['ingredient'];
            ?></font>
        </div>
        <div class="form-group">
        <label>Dodajte sliku</label>
        <input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control-file" name="image" required id="exampleFormControlFile1">         
                        <font color='red'>
                              <?php if(!empty($errors['image'])) 
                                  echo $errors['image'];
                              ?></font>
        </div>
        

        <center>
            <button class="btn btn-warning">Ubaci jelo</button>
        </center>
    </form>
        </div>
</div>