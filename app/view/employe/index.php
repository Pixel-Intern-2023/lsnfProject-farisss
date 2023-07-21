
    <!--  Main wrapper -->
    <div class="body-wrapper">
        
        <div class="container mt-5">

            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>

            <div class="row mb-3 ms-4">
                <div class="col-lg-6">
                    <button type="button" class="btn btn-primary mt-2 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                        Add Data Employee
                    </button>
                </div>
            </div>

            <div class="row ms-4">
                <div class="col-lg-6">
                    <form action="<?= BASEURL; ?>/employe/search" method="post">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Search Member" id="search" name="search" autocomplete="off">
                            <button class="btn btn-primary" type="submit" id="btnSearch">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row me-0">
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100 ms-5 me-5 mt-3 shadow-lg">
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
                                            <h6 class="fw-semibold mb-0">Profile</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Option</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data['employe'] as $emply) :
                                        $no++;
                                    ?>
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal"><?= $no; ?></h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <img src="<?= BASEURL; ?>/img/<?= $emply['image_profile']; ?>" class="rounded-cicle <?= $emply['employee_status'] == 'FIRED' ? 'filter' : '' ?>" width="50" height="50" alt="">
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal"><?= $emply['namee']; ?></h6>
                                            </td>
                                            <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary <?= $emply['employee_status'] == 'FIRED' ? 'bg-warning' : '' ?> rounded-3 fw-semibold"><?= $emply['employee_status']; ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <a style="text-decoration:none;" href="<?= BASEURL; ?>/employe/fired/<?= $emply['id']; ?>" class="btn btn-warning ms-1">Fire</a>
                                                <a style="text-decoration:none;" href="<?= BASEURL; ?>/employe/detail/<?= $emply['id']; ?>" class="btn btn-primary ms-1">Detail</a>
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
                                        

<!-- Modal -->
<div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Add Data Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/employe/add" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="employee_status" name="employee_status" value="WORKING">
                    <input type="hidden" id="created_at" name="created_at">
                    <input type="hidden" id="updated_at" name="updated_at">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="namee" name="namee" required>
                    </div>
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Occupation</label>
                        <select class="form-select" aria-label="Default select example" name="occupation_nama" id="occupation_nama" required>
                            <?php foreach ($data['occupation'] as $ocptn) : ?>
                                <option value="<?= $ocptn['id_occupation']; ?>"><?= $ocptn['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <input type="text" class="form-control" id="detail" name="detail" required>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="salary" name="salary" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_profile" class="form-label">Profile</label>
                        <input type="file" class="form-control" id="image_profile" name="image_profile">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tombolSubmit">Add Data</button>
                </form>
            </div>
        </div>
    </div>
</div>