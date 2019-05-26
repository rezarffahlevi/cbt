<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{identity}{School}{/identity}</title>
    <link href="{base_url}{identity}assets/img/{Logo}{/identity}" rel="icon" type="image/x-icon"/>
    <link rel="stylesheet" href="{base_url}assets/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" id="theme" href="{base_url}assets/css/login.css"/>
</head>
<body>
    <div class="login-container">
        <div class="login-box animated fadeInDown">   
            <div class="login-body">
                <div align="center" style="padding-bottom:12px;">
                    <img style="max-height:70px; border-radius: 10px;" src="{base_url}assets/img/{identity}{Logo}{/identity}">
                </div>
                    <div class="login-title"><strong>Selamat Datang</strong>, di {identity}{School}{/identity}
                    <h4 style="padding-top:7px; color: #efefef;">Silahkan <i>Log in</i> terlebih dahulu.</h4>
                    </div>
                    {mess}
                    <form action="{site_url}/main/login/validate" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="hidden" name="Token" value="{token}">
                            <input type="text" class="form-control" name='Username' autofocus placeholder="Masukan Username Anda" required value="{user}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name='Password' placeholder="Masukan Kata Sandi Anda" required/>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-info btn-block">Masuk</button>
                        </div>
                        <div class="col-md-12">
                        <br>
                        <h4 align="center"><a href="#add" data-toggle="modal">Lupa Kata Sandi?</a></h4>
                        </div>
                    </div>
                    </form>
                    <div class="pull-left">
                       {identity}{Address}{/identity}
                    </div>
                    <div class="pull-right">
                       No. Telp: {identity}{Phone}{/identity}
                    </div>
                </div>
<!--                 <div class="login-footer col-md-12">
                    <div class="pull-left">
                        &copy; 2018 - Reza Fahlevi.
                    </div>
                    <div class="pull-right">
                        <a href="#">Versi 1.0.</a>
                    </div>
                </div> -->
            </div>
            
        </div>
        <!-- Modal -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Lupa Kata Sandi</h4>
                  </div>
                  <form method="post" action="{site_url}Main/Login/Forgot" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                          <label class="control-label">Email Anda</label>
                          <input type="email" name="email" class="form-control" required placeholder="Masukan Email" maxlength="150">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Kirim</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


        <script type="text/javascript" src="{base_url}assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="{base_url}assets/js/bootstrap.min.js"></script>  
        <!-- END PLUGINS -->

    </body>
</html>
