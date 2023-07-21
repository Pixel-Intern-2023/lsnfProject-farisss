<div class="body-wrapper ">

  <div class="row me-0">
    <div class="col-lg-12">
      <?= Flasher::flash(); ?>
    </div>
  </div>

  <div class="row me-0 mt-3">
    <div class="col-lg-12 mt-5">
      <div class="card w-100 ">

        <div class="card-body row mt-4">

          <div class="profile-image col-md-4 d-flex flex-column justify-content-center align-items-center">
            <img class="shadow <?= $data['employe']['employee_status'] == 'FIRED' ? 'filter' : '' ?>" src="<?= BASEURL; ?>/img/<?= $data['employe']['image_profile']; ?>" width="250" height="280" alt="">
            <div class="btn-box mt-4">
              <a id="delete" style="text-decoration:none; float:right;" href="<?= BASEURL; ?>/employe/delete/<?= $data['employe']['id']; ?>" class="btn btn-danger ms-1">Delete</a>
              <a style="text-decoration:none; float:right;" href="<?= BASEURL; ?>/employe/update/<?= $data['employe']['id']; ?>" class="btn btn-success ms-1 tampilModalEdit" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $data['employe']['id'] ?>">Edit</a>
              <a href="<?= BASEURL; ?>/employe/" class="btn btn-info">Back</a>
            </div>
          </div>

          <div class="show-detail col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Name :</label>
                <input type="text" autocomplete="true" readonly required="true" value="<?= $data['employe']['namee'] ?>" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Occupation :</label>
                <input type="text" autocomplete="true" readonly required="true" class="form-control" value="<?= $data['employe']['name'] ?>">
              </div>

              <div class="mb-3">
                <label class="form-label">Description :</label>
                <textarea class="form-control" readonly required rows="2"><?= $data['employe']['detail'] ?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Salary :</label>
                <input type="number" readonly required class="form-control" value="<?= $data['employe']['salary'] ?>">
              </div>

              <div class="mb-3">
                <label class="form-label">Status :</label>
                <input type="text" readonly required class="form-control" value="<?= $data['employe']['employee_status'] ?>">
              </div>
            </form>
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
                        <label for="namee" class="form-label">Name</label>
                        <input type="text" class="form-control" id="namee" name="namee" required>
                    </div>
                    <div class="mb-3">
                        <label for="occupation" class="form-label">Occupation</label>
                        <select class="form-select occupation" aria-label="Default select example" name="occupation_nama" id="occupation_nama" required>
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