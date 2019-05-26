
        <div class="container-fluid">
            <div class="block-header">
                <h2>Tambah Ujian</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ujian
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
                                        <select name="PackageID" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <?php
                                            foreach ($package as $key) { ?>
                                            <option value="<?=$key->PackageID?>"><?=$key->PackageName?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <label>Tanggal Ujian</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" class="datepicker form-control" placeholder="Please choose a date...">
                                    </div>
                                </div>
                                <label>Waktu Mulai</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" class="timepicker form-control" placeholder="Please choose a time...">
                                    </div>
                                </div>
                                <label>Maksimum Keterlambatan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" class="timepicker form-control" placeholder="Please choose a time...">
                                    </div>
                                </div>
                                <label>Durasi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="time" class="timepicker form-control" placeholder="Please choose a time...">
                                    </div>
                                </div>
                                <label>Token</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <label>Status</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="Raandom" class="form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="1">Aktif</option>
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


    <!-- Moment Plugin Js -->
    <script src="<?=base_url('assets/plugins/momentjs/moment.js')?>"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?=base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')?>"></script>
