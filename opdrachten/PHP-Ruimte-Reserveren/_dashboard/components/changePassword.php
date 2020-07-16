<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Verander Gebruikersnaam</h4>
            <p class="card-category">Edit Profile</p>
        </div>
        <div class="card-body">
            <form action="index.php?action=instellingen" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Oud wachtwoord.." name="old_password">
                        <input type="password" class="form-control" placeholder="Nieuw Wachtwoord.." name="new_password">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger pull-left">Cancel</button>
            <button type="submit" class="btn btn-danger pull-right" name="changePassword">Update</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
</div>