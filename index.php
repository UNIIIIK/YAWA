<?php include('admin/auth_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">BOAKAN NI MALTO</h2>
    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="searchUser" class="form-control w-50" placeholder="Search user...">
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
            <button class="btn btn-danger" id="logoutBtn">Logout</button>
        </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Age</th>
                <th>Course</th>
                <th>Profile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="userTable"></tbody>
    </table>
</div>

<!-- Updated Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Insert User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form class="row g-3" id="newUserForm" enctype="multipart/form-data">
                  <input type="hidden" id="user_id" name="user_id">
                  <div class="col-sm-6">
                      <label for="firstName" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="firstName" name="first_name" required>
                  </div>
                  <div class="col-sm-6">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="lastName" name="last_name" required>
                  </div>
                  <div class="col-sm-6">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="Email" name="email" required>
                  </div>
                  <div class="col-sm-6">
                      <label for="Gender" class="form-label">Gender</label>
                      <select class="form-select" id="Gender" name="gender" required>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                  </div>
                  <div class="col-sm-6">
                      <label for="Address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="Address" name="address" required>
                  </div>
                  <div class="col-sm-6">
                      <label for="Birthdate" class="form-label">Birthdate</label>
                      <input type="date" class="form-control" id="Birthdate" name="birthdate" required>
                  </div>
                  <div class="col-sm-6">
                    <label for="Course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="Course" name="course" required>
                </div>                
                  <div class="col-sm-6">
                      <label for="ProfileImage" class="form-label">Profile</label>
                      <input type="file" class="form-control" id="ProfileImage" name="profileImage" accept="image/*" required>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btnSaveUser">Save changes</button>
          </div>
      </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="main.js"></script>
</body>
</html>
