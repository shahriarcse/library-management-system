<?php  
  include_once('../classes/Admin.php');
  $db = new Database; 
   $role_id = $_SESSION['user_role_id'];
   $sql = "SELECT image From admin WHERE id='$role_id' ";
   $data = $db->getQuery($sql);
   $image = $data->fetch_assoc();  
?>
<!-- sidebar start -->
  <style>
    li.sub:hover{
    background:#0D1214;    
  }
  </style> 
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print" >
        <section class="sidebar">
          <div class="user-panel"> 
            <div class="pull-left image">
             
              <img class="img-circle" src="images/Admin/<?= $image['image']; ?>" alt="User Image">
            </div>  
            <div class="pull-left info">
              <p><?php if(isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?></p>
              <p class="designation"><?php if(isset($_SESSION['user_username'])) { echo $_SESSION['user_username']; } ?></p> 
            </div>
          </div>
          <!-- Subment Menu-->
          <ul class="sidebar-menu">
            <li class="active" style="border-bottom: 1px solid #000 !important;">
              <a href="book_list.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
            <!-- users-->
            <li class="treeview " style="border-bottom: 1px solid #000 !important;">
              <a href="users_list.php"><i class="fa fa-users"></i><span>Users</span><i class="fa fa-angle-right"></i></a>    
              <ul class="treeview-menu">
                 <li class="sub">
                  <a href="users_admin_list.php">
                    <i class="fa fa-eye" aria-hidden="true"></i>Admin List
                  
                <li class="sub">
                  <a href="users_list.php" tutle="Student and Teacher"> 
                    <i class="fa fa-eye" aria-hidden="true"></i>Users List
                  </a>
                </li>
               <!--  <li class="sub">
                  <a href="#">
                    <i class="fa fa-minus" aria-hidden="true"></i> Delete User Data 
                     </a>
                </li> -->
      
              </ul>
            </li> 

            <!-- books -->
            <li class="treeview " style="border-bottom: 1px solid #000 !important;">
              <a href="book_list.php"><i class="fa fa-book"></i><span>Books</span><i class="fa fa-angle-right"></i></a>     
              <ul class="treeview-menu">
                <!-- <li class="sub">
                  <a href="book_add.php">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add Book
                  </a>
                </li> -->
                <li class="sub">
                  <a href="book_list.php">
                    <i class="fa fa-eye" aria-hidden="true"></i> Book List
                  </a>
                </li>

                 <li class="sub">
                  <a href="book_issue_list.php">
                    <i class="fa fa-eye" aria-hidden="true"></i> Book Issue List
                  </a>
                </li>

                 <li class="sub"> 
                  <a href="book_submited_list.php">   
                    <i class="fa fa-eye" aria-hidden="true"></i> Book Submited List
                  </a>
                </li>
                &nbsp; 
              </ul>
            </li>  
             <!-- Settings -->
            <li class="treeview " style="border-bottom: 1px solid #000 !important;">
               <a href=""><i class="fa fa-cogs" aria-hidden="true"></i><span>Settings</span><i class="fa fa-angle-right"></i></a> 

              <ul class="treeview-menu">
                <li class="sub">
                  <a href="settings_student2.php">
                    <i class="fa fa-cog" aria-hidden="true"></i>Settings for Students
                  </a>
                </li> 
                <li class="sub"> 
                  <a href="settings_teachers.php">
                    <i class="fa fa-cog" aria-hidden="true"></i>Settings for Teachers
                  </a>
                </li>
                &nbsp;
              </ul>
            </li> 
        
            <li style="border-bottom: 1px solid #000 !important;">
              <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
            </li>
          </ul>
        </section>
      </aside>
<!-- sidebar end --> 