<!--  Main wrapper -->
<div class="body-wrapper mt-5">
    <div class="row me-0 mt-5">
        <div class="col-md-12 d-flex align-items-stretch">
            <div class="card w-100 ms-5 me-5 shadow-lg">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Username</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data['admin'] as $admin) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal"><?= $no; ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal"><?= $admin['username']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal"><?= $admin['name']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal"><?= $admin['email']; ?></h6>
                                        </td>
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