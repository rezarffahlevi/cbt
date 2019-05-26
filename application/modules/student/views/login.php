        <div style="font-size: 13px;">
            <?=$this->session->flashdata('mess')?>
        </div>
        <div class="col-md-4 col-md-offset-4 login-wrapper col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size:22px; font-weight:bold">
                    User Login
                </div>
                <div class="inner-content" style="height:290px">
                    <form action="<?=site_url('student/login/validate/')?>" method="post">
                        <div class="form-horizontal"><br>
                            <div class="form-group <?=$this->session->flashdata('erruser')?>">
                                <label class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-8 input-wrapper">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <input class="form-control-login" style="height:37px;" name="Username" placeholder="Username" type="text" required="" autofocus value="<?=$this->session->flashdata('user')?>">
                                </div>
                            </div>
                            <div class="form-group <?=$this->session->flashdata('errpass')?>" style="padding-bottom:5px;">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-8 input-wrapper">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                    <input class="form-control-login" style="height:37px;" name="Password" placeholder="Password" type="password" required="">
                              </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8 text-right">
                                    <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                                </div>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>
        </div>