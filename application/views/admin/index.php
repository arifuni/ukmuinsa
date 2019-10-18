        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">
                <div class="col-lg-6">
                    <h5>UKM Aktif</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ketua</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($ukm_aktif as $r) : ?>
                                <tr>
                                    <th scope="row"> <?= $i; ?> </th>
                                    <td>
                                        <?= $r['Nama']; ?>
                                    </td>
                                    <td>
                                        <?= $r['Ketua']; ?>
                                    </td>
                                    <td>
                                        <?php $data = $r['is_active'];
                                            if ($data == 1) {
                                                $data = "aktif";
                                                echo $data;

                                                if ($data == 1) {
                                                    # code...
                                                }
                                            } else {
                                                $data = "nonaktif";
                                                echo $data;
                                            }
                                            ?>


                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/nonaktifkan/') . $r['id']; ?>" class="badge badge-danger">Nonaktifkan</a>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <h5>UKM Nonaktif</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ketua</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($ukm_nonaktif as $r) : ?>
                                <tr>
                                    <th scope="row"> <?= $i; ?> </th>
                                    <td>
                                        <?= $r['Nama']; ?>
                                    </td>
                                    <td>
                                        <?= $r['Ketua']; ?>
                                    </td>
                                    <td>
                                        <?php $data = $r['is_active'];
                                            if ($data == 1) {
                                                $data = "aktif";
                                                echo $data;

                                                if ($data == 1) {
                                                    # code...
                                                }
                                            } else {
                                                $data = "nonaktif";
                                                echo $data;
                                            }
                                            ?>


                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/aktifkan/') . $r['id']; ?>" class="badge badge-primary">Aktifkan</a>

                                    </td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- /.container-fluid -->


        </div>
        <!-- End of Main Content -->

        <!-- Modal -->
        <div class="modal fade" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="editStatusJudulModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStatusJudulModal">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('admin/index/'); ?>" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" class="form-control" id="status" name="status" placeholder="Status UKM">
                            </div>

                            <div class="form-group">
                                <label for="statusUKM">Status</label>
                                <select class="form-control" id="statusUKM" name="statusUKM">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">1 Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">2 Nonaktif</label>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>