<form action="delete.php" method="post">
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <h4>Delete Company</h4>
                    <label for="company">Select company which you need to delete</label>
                    <select autofocus name="company" id="company" class="form-control input-sm chat-input" autocomplete="off">
                        <option value="">Select the company</option>
                        <?php foreach ($list as $row): ?>
                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                        <?php endforeach ?>
                    </select>
                    </br>
                    
                    <button class="btn btn-danger center-block" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Delete
                    </button>
            </div>
        
        </div>
    </div>
</div>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-5">
            <h4 class="alert alert-danger center-block" role="alert">Warning! Remember!</h4>
            <ol class="alert alert-warning center-block">
                <li>If you delete company, you delete all its child-company too</li>
                <li>If you want keep child-company, first change it parent company using <a href="edit.php">Edit tool</a></li>
            </ol>
        </div>
    </div>
</div>