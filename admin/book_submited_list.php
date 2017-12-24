<?php 
  include_once('../classes/Database.php'); 
  $db = new Database();
  $sql = "SELECT * FROM book_return LEFT JOIN book_issue ON book_return.issue_id=book_issue.id";  
  $books = $db->getQuery($sql);  
?>
<?php require_once('inc/header.php'); ?> 
<?php include_once('inc/sidebar.php'); ?>     

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="text-success">Submitted Books List </h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-responsive table-bordered"> 
              <!-- single item for looping  -->
                <tr class="success">
                  <th>Sr No.</th>
                  <th>Issue ID</th>
                  <th>User Name</th> <!-- user name -->
                  <th>Book Name</th> <!-- book name --> 
                  <th>Issue Date</th>
                  <th>Submit Date</th>
                  <th>Fine</th>
                  <th>Action</th> 
                </tr>
              <?php if($books != false): ?>
                <?php
                    $serial = 1; 
                    while($book = $books->fetch_assoc()):  
                ?>
                <tr>
                  <td><?= $serial++; ?></td>
                  <td><?= $book['issue_id']; ?></td> 

                  <td>
                  <?php if($book['user_id'] != false) : ?>
                    <?php 
                      $uid = $book['user_id']; 
                      $userSql = "SELECT username FROM users WHERE id='$uid' ";
                      $udata = $db->getQuery($userSql);
                      $user_row = $udata->fetch_assoc();
                      echo $user_row['username'];
                    ?>
                  </td>
                  <?php else: ?>
                    <td class="text-danger">Data not found!</td>
                  <?php endif; ?>

                  <td>
                  <?php  if($book['book_id']) : ?>
                    <?php
                        $bid = $book['book_id']; 
                        $bookSql = "SELECT title FROM books WHERE id='$bid' ";
                        $bdata = $db->getQuery($bookSql);
                        $b_row = $bdata->fetch_assoc();
                        echo $b_row['title']; 
                    ?>
                  </td>
                  <?php else: ?>
                    <td class="text-danger">Data not found!</td>
                  <?php endif; ?>

                  <td><?= date('d-m-Y',strtotime($book['issue_date'])); ?></td>
                  <td><?= date('d-m-Y',strtotime($book['submit_date'])); ?></td>
                  <td>
                    <?php
                        if($book['fine'] != 0) {
                          echo '<b class="text-danger">'.$book['fine'].' TK</b>';  
                        }else if($book['paid'] == 1){
                            echo '<b class="text-success">Paid</b>';
                        } else {
                            echo '00.00 TK';  
                        }
                    ?>
                  </td>   
                  <td>
                   <a href="pay.php?id=<?= $book['id']; ?>" class="btn btn-xs btn-success" onclick="return confirm('Are you sure you want to payout this item?');" ><i class="fa fa-money"></i> Pay</a> 
                  </td> 
                </tr> 
              <?php endwhile; ?> 
            <?php else: ?>
                <h4 class="text-danger font-weight-bold">Data not found!</h4>
            <?php endif; ?>                 
          </table>  
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once('inc/footer.php'); ?> 