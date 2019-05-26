
        <div class="container-fluid">
            <!-- Basic Examples -->
        <center>
         <button type="button" class="btn btn-primary waves-effect" onclick="document.location='<?=site_url('main/package/add_package/')?>'">Tambah Bank Soal</button><hr>
        </center>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Bank Soal
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Tambah Siswa</a></li>
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
                                            <th>Nama Paket Soal</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Pilihan Ganda</th>
                                            <th>Acak</th>
                                            <th>Soal</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($tests as $test):
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$test->PackageName?></td>
                                            <td><?=$test->SubjectName?></td>
                                            <td><?=$test->ClassName." - ".$test->MajorName?></td>
                                            <td><?=$test->AnswerCount?></td>
                                            <td><?=$test->Random?></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=site_url('main/package/question/'.$test->PackageID)?>">Aktif</a></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=$test->PackageID?>">Aktif</a></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=$test->PackageID?>">Aktif</a></td>
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