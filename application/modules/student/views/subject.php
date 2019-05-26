<div class="grup">
<div class="col-md-offset-1 col-md-6">
    <div class="list-group">                 
        <div class="list-group-item top-heading">
            <h1 class="list-group-item-heading page-label">Konfirmasi Data Ujian</h1>
        </div>
        <div class="list-group-item">
            <label class="list-group-item-heading">Soal</label>
            <p class="list-group-item-text"><?=$test->PackageName?></p>
        </div>
        <div class="list-group-item">
            <label class="list-group-item-heading">Mata Pelajaran</label>
            <marquee direction="down" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
                <p class="list-group-item-text text-danger"><?=$test->SubjectName?></p>
            </marquee>
        </div>
        <div class="list-group-item">
            <label class="list-group-item-heading">Kelas</label>
            <p class="list-group-item-text"><?=$test->ClassName." - ".$test->MajorName?></p>
        </div><div class="list-group-item">
            <label class="list-group-item-heading">Tanggal Mulai</label>
            <p class="list-group-item-text"><?=date('d - m - Y', strtotime($test->Date))?></p>
        </div>
        <div class="list-group-item">
            <label class="list-group-item-heading">Waktu Mulai</label>
            <p class="list-group-item-text <?=$disabled[0]?>"><?=$test->StartTime.$disabled[2]?></p>
        </div>
        <div class="list-group-item">
            <label class="list-group-item-heading">Durasi</label>
            <p class="list-group-item-text"><?=$test->Duration?></p>
        </div>
    </div>
</div>

<div class="col-md-4">
    	<div class="alert alert-warning" style="font-size: 13px; font-weight:normal">
            <i class="glyphicon glyphicon-warning-sign"></i>  
            <font size="3px">Tombol MULAI hanya akan aktif apabila waktu sekarang sudah melewati waktu mulai tes. Tekan tombol F5 untuk merefresh halaman</font>
        </div>
        <form method="post" action="<?=site_url('student/test/')?>">
            <button type="submit" class="btn btn-danger btn-block doblockui"<?=$disabled[1]?>>MULAI</button>
        </form>
</div>

</div>