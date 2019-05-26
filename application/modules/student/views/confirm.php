<div class="col-md-6 col-md-offset-3">
        <form action="<?=site_url('student/confirm/token_check/')?>" method="post"> 
            <div class="list-group">   
                <div class="list-group-item top-heading">
                    <h1 class="list-group-item-heading page-label">Konfirmasi Data Peserta</h1>
                </div>
                <div class="list-group-item">
                    <label class="label">Nomer Peserta</label>
                    <h3><?=$student->Username?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">NIS</label>
                    <h3><?=$student->NIS?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">Nama Lengkap</label>
                    <h3><?=$student->Name?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">Tempat, Tanggal Lahir</label>
                    <h3><?=$student->BornCity.", ".$student->Born?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">Kelas</label>
                    <h3><?=$student->ClassName." - ".$student->MajorName?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">Jenis Kelamin</label>
                    <h3><?=$student->Gender?></h3>
                </div>
                <div class="list-group-item">
                    <label class="label">Token</label><br>
                    <input type="text" name="Token" required="" class="form-control" maxlength="20" style="max-width:190px; display:inline;" placeholder="Masukan Token"<?=$disabled[0]?>>
                     <button type="submit" class="btn btn-success"<?=$disabled[0]?>>Submit</button>
                     <?=$disabled[1]?>
                     <?=$this->session->flashdata('mess')?>
                </div>
            </div>
        </form>
    </div>