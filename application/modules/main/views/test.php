
        <div class="container-fluid">
            <!-- Basic Examples -->
        <center>
         <button type="button" class="btn btn-primary waves-effect" onclick="document.location='<?=site_url('main/test/add_test/')?>'">Tambah Ujian</button><hr>
        </center>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Ujian
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Tambah Ujian</a></li>
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
                                            <th>Pelajaran</th>
                                            <th>Nama Bank Soal</th>
                                            <th>Kelas</th>
                                            <th>Waktu</th>
                                            <th>Batas Akhir</th>
                                            <th>Token</th>
                                            <th>Status</th>
                                            <th>Jadwal</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelajaran</th>
                                            <th>Soal</th>
                                            <th>Kelas</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Jadwal</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php
                                    $no=0;
                                    foreach ($tests as $test):
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$test->SubjectName?></td>
                                            <td><?=$test->PackageName?></td>
                                            <td><?=$test->ClassName." - ".$test->MajorName?></td>
                                            <td><?=$test->Date." ".$test->StartTime?></td>
                                            <td><?=$test->Until?></td>
                                            <td><?=$test->Token?></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=$test->Status?>">Aktif</a></td>
                                            <td><a class="btn btn-primary waves-effect" href="<?=$test->TestID?>">Atur</a></td>
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