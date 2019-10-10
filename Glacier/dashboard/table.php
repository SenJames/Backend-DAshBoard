<?php 
    include('includes\header.php');
    include('includes\nav.php');
?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Mentees</h1>
          <p class="mb-4">This is a Dashboard for Mentors that track Mentees</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

            <?php 
                require '../includes/dbh.inc.php';
                $query = "SELECT * FROM `users` ";
                $query_run = mysqli_query($conn, $query);

            ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>EMAIL</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>EMAIL</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                        if(mysqli_num_rows($query_run)> 0){

                            while ($row = mysqli_fetch_assoc($query_run)) {

                            echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['fullname']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['email']."</td>
                                <td></td>
                                <td></td>
                              </tr>";
                            }
                        }else{
                            echo "No records found";
                        }
                      ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>


<?php 
    include('includes\footer.php');
    include('includes\scripts.php');
?>