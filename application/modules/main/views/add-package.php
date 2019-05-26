
        <div class="container-fluid">
            <div class="block-header">
                <h2>Tambah Paket Soal</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Paket Soal
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" action="<?=site_url('main/package/')?>">
                                <label>Nama Paket Soal</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="PackageName" class="form-control" placeholder="Masukan Nama Paket Soal">
                                    </div>
                                </div>
                                <label>Mata Pelajaran</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="SubjectID" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <?php
                                            foreach ($subject as $key) { ?>
                                            <option value="<?=$key->SubjectID?>"><?=$key->SubjectName?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label>Kelas</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="ClassID" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <?php
                                            foreach ($class as $key) { ?>
                                            <option value="<?=$key->ClassID?>"><?=$key->ClassName?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label>Jumlah Pilihan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="AnswerCount" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <label>Acak</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="Raandom" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <br><button type="reset" class="btn btn-danger m-t-15 waves-effect">Reset</button>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>