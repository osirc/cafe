<!-- Modal -->
<div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Registro de Usuario</h5>
                <button id="closeRegisterUser" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <!-- was-validated   -->
                    <form id="registerForm">
                        <div class="form-group">
                            <label for="nameInput">Name</label>
                            <div class="input-group pb-md-2 pt-md-2">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </span>
                                <input class="form-control" type="text" id="nameInput"/>
                                <div id="nameToolTip" class=""></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nameInput">Lastname</label>
                            <div class="input-group pb-md-2 pt-md-2 is-invalid">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </span>
                                <input class="form-control" type="text" id="lastnameInput">
                                <div id="lastnameToolTip" class=""></div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="cellphoneInput">Cellphone</label>
                            <div class="input-group pb-md-2 pt-md-2 is-invalid">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                </span>
                                <input class="form-control" type="text" id="cellphoneInput">
                                <div id="cellphoneToolTip" class=""></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nameInput">Email</label>
                            <div class="input-group pb-md-2 pt-md-2">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                </span>
                                <input class="form-control" type="text" id="registerEmailInput">
                                <div id="emailToolTip" class=""></div>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nameInput">Password</label>
                            <div class="input-group pb-md-2 pt-md-2">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-right-0">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                </span>
                                <input class="form-control" type="password" id="registerPasswordInput">
                                <div id="passwordToolTip" class=""></div>
                            </div>
                        </div>


                        <button id="signUpButtonText" type="text" class="btn btn-primary float-right">Sign up</button>
                    </form>
                </div>
            </div>
<!--            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div>
    </div>
</div>