<a href='index.php' class='btn btn-primary'>Back To Users</a>
<div style="margin: 10px;">
    <form action='' method='POST'>
        <div class="control-group">
            <label class="control-label" for="name">Name:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" name='name' value='<?php echo stripslashes($row['name']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">E-Mail:</label>
            <div class="controls">
                <input class="input-xlarge" type="email" name='email'
                    value='<?php echo stripslashes($row['email']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" name='password' value='' />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="salary">Salary:</label>
            <div class="controls">
                <input class="input-xlarge" type="text" name='salary'
                    value='<?php echo stripslashes($row['salary']) ?>' />
            </div>
        </div>
        <div class="control-group">
            <input class="btn btn-large btn-success" type='submit' value='Save' />
            <input type='hidden' value='1' name='submitted' />
        </div>
    </form>
</div>