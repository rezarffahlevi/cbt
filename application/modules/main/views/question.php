
        <div class="container-fluid">
            <!-- Basic Examples -->
        <center>
         <button type="button" class="btn btn-primary waves-effect" onclick="window.location='<?=site_url('main/package/add_question/')?>'">Tambah Soal</button><hr>
        </center>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Soal
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Tambah Soal</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>Jenis Soal</th>
                                            <th>Acak</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($results as $result):
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$result->Question?></td>
                                            <td><?=$result->Type?></td>
                                            <td><?=$result->Random?></td>
                                            <td><a class="btn btn-primary waves-effect" href="">Aktif</a></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=$result->PackageID?>">Aktif</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>