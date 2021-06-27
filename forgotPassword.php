<!-- Modal -->
<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Recover Password</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="idModalBody" class="modal-body">
                <!--<form id="resetPassword" action="" method="">-->
                    <p>Write tou email</p>
                    <div class="input-group pb-md-2 pt-md-2">
                        <span class="input-group-prepend">
                            <div class="input-group-text bg-transparent border-right-0">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                        </span>
                            <input class="form-control py-2 border-left-0 border" type="search" id="recoverPasswordEmailInput">
                    </div>
                    <button type="submit" id="resetPasswordButton" class="btn btn-primary float-right">Reset Password</button>
<!--                </form>-->
            </div>
<!--            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div>
    </div>
</div>