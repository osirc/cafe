<!doctype html>
<html lang="en">

<head>
    <?php include('./header.php') ?>
    <?php include('./checkLogin.php') ?>
    <?php ?>
</head>
   <body>
       <div class="wrapper">
           <?php include('./sideBar/leftSideBar.php') ?>

           <!-- Page Content -->
           <div id="content">
               <!-- We'll fill this with dummy content -->

               <?php include('./sideBar/topSideBar.php') ?>

               <main>
                   <div class="jumbotron-fluid py-md-5 px-md-5">
                   <div class="jumbotron-fluid py-md-5 px-md-5">
                       <div id="wrapper" class="mainWrapper">

                           <?php
                                $id = $_GET['id'];
                                switch($_SESSION["type"]) {
                                    case 0:
                                        switch ($id) {
                                            case 1:
                                                 include ('./users/productsGallery.php');
                                                break;
                                            case 2:
                                                 include ('./users/orders.php');
                                                break;
                                            case 3:
                                                include ('./users/shoppingCar.php');
                                                break;
                                            case 4:
                                                include ('./users/transactions.php');
                                                break;
                                            case 5:
                                                include ('./admin/allTransactions.php');
                                                break;
                                        }
                                    break;
                                    case 1:
                                        switch ($id) {
                                            case 1:
                                                include ('./chef/chefOrders.php');
                                                break;
                                        }
                                    break;
                                    case 2:
                                        switch ($id) {
                                            case 1:
                                                 include ('./admin/adminMenu.php');
                                                break;
                                            case 2:
                                                 include ('./admin/allOrders.php');
                                                break;
                                            case 3:
                                                include ('./admin/summary.php');
                                                break;
                                            case 4:
                                                include ('./admin/allTransactions.php');
                                                break;
                                            case 5:
                                                include ('./admin/dailyReport.php');
                                                break;
                                        }
                                    break;
                                }
                           ?>
                        </div>
                   </div>
                   </div>
               </main>
           </div>
       </div>
   </body>

</html>