<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?=$identity->School?></title><!-- 

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/siswa.css')?>"> -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/student.css')?>">
    <link rel="icon" href="<?=base_url('assets/img/'.$identity->Logo)?>">
</head>
<body onkeydown="return c()">
<div class="header">
    <div class="logo">
        <img src="<?=base_url('assets/img/'.$identity->Banner)?>" class="img">
    </div>
    <div class="nav-right">
        <div class="photo">
            <img src="<?=base_url('assets/img/avatar.gif')?>">
        </div>
        <h3>Selamat Datang..</h3>
        <?php
        echo (empty($this->session->userdata('StudentName'))) ? "<h2 class='student-name-null'>Siswa Peserta Ujian</h2>" : "
            <h2 id='log' style='padding-top:5px'><a href='".site_url('student/login/logout/')."' class='hidden-md hidden-sm hidden-lg'>Logout &nbsp;<span class='glyphicon glyphicon-log-out'></span></a></h2>
            <h2 class='student-name'>".$this->session->userdata('StudentName')."</h2>
            <h2 id='log' class='hidden-xs'><a href='".site_url('student/login/logout/')."'>Logout &nbsp;<span class='glyphicon glyphicon-log-out'></span></a></h2>";
        ?> 
    </div>
</div>

<div class="container">
    <div class="box">
        <?php $this->load->view($content)?>
    </div>
</div>

<div id="down">
    <div class="version">
        CBT.Web.HMVC:<strong>1.0</strong>
    </div>
    <footer>
        <p> Copyright &copy; rezarffahlevi@gmail.com | Supported by <?=$identity->School?></p>
    </footer>
</div>
<script type="text/javascript">
    function c(){
        var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();
        if(event.ctrlKey && (pressedKey == "m" || pressedKey == "n")){
           window.close();
           event.returnValue = false;
        }
    }
</script>

</body>
</html>