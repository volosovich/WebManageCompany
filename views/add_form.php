<form action="add.php" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <h4>Add New Company</h4>
                    <input autocomplete="off" autofocus type="text" id="companyname" class="form-control input-sm chat-input" placeholder="Name of Company" name="companyname" />
                    </br>
                    <select autofocus name="parentcompany" id="parentcompany" class="form-control input-sm chat-input" autocomplete="off">
                        <option value="0">Dont have parent company</option>
                        <?php foreach ($list as $row): ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php endforeach ?>
                    </select>
                    </br>
                    <input autofocus class="form-control" name="cash" placeholder="How many money company earn?" type="number" min="0" id="cash"/>
                    </br>
                    <button class="btn btn-default center-block" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Add Company
                    </button>
            </div>
        
        </div>
    </div>
</div>
</form>