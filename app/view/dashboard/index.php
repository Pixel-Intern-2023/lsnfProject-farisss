<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row d-flex gap-2">

            <div class="col-md-5">
                <div class="card overflow-hidden">
                    <div class="card-body bg-primary shadow-lg link-light p-4">
                        <h3 class=" mb-9 fw-semibold link-light">Employe Data</h3>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="fw-semibold mb-3 link-light"><?= $data['employe']['employe']; ?> Employe</h5>
                                <div class="d-flex align-items-center">
                                    <div class="me-4">
                                        <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                                        <span class="fs-2 me-1"><?= $data['working']['working']; ?></span>
                                        <span class="fs-2">Working</span>
                                    </div>
                                    <div>
                                        <span class="round-8 bg-danger rounded-circle me-2 d-inline-block"></span>
                                        <span class="fs-2 me-1"><?= $data['fired']['fired']; ?></span>
                                        <span class="fs-2">Fired</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card bg-success shadow-lg">
                    <div class="card-body p-4">
                        <h3 class=" mb-9 fw-semibold">Admin Data</h3>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="fw-semibold mb-3"><?= $data['admin']['adminn']; ?> Admin</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>