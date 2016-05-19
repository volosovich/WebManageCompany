<form action="edit.php" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <h4>Edit Company</h4>
                    <label for="company">Select company which you need to edit</label>
                    <select autofocus name="company" id="company" class="form-control input-sm chat-input" autocomplete="off">
                        <?php foreach ($list as $row): ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php endforeach ?>
                    </select>
                    </br>
                    <label for="companyname">If you don't input new name, company save it current name</label>
                    <input autocomplete="off" autofocus type="text" id="companyname" class="form-control input-sm chat-input" placeholder="New name of Company" name="companyname" />
                    </br>
                    <label for="parentcompany">New parent company if have</label>
                    <select autofocus name="parentcompany" id="parentcompany" class="form-control input-sm chat-input" autocomplete="off">
                        <option value="0">Dont have parent company</option>
                        <?php foreach ($list as $row): ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php endforeach ?>
                    </select>
                    </br>
                    <label for="cash">How many earn this time?</label>
                    <input autofocus class="form-control" name="cash" placeholder="How many earn this time?" type="number" min="0" id="cash" value="0"/>
                    </br>
                    <button class="btn btn-default center-block" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Edit
                    </button>
            </div>
        
        </div>
    </div>
</div>
</form>