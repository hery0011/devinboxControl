<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "devinboxw3school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection échouée: " . $conn->connect_error);
}

$sql = "SELECT id, nomComplet, mail, date, tel, module, typeCours, responsable, status, notes, attestation FROM clients WHERE typeCours ='presentiel' and attestation ='non'";
$result = $conn->query($sql);

?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - Devinbox Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
       
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css"  media="screen" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">

        <link rel="stylesheet" type="text/css" href="css/custom-style.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed DB-Client">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Devinbox Dashboard</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestion client 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="tables.html">Suivi client</a><a class="nav-link" href="DB-Client.html">database clients </a>
                                </nav>
                            </div>

                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                               Gestion des étudiants
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link " href="cours-présentielle.php">
                                        Cours en présentielle
                                    </a>
                                    
                                    <a class="nav-link" href="cours-ligne.php">
                                        Cours en ligne
                                    </a>

                                    <a class="nav-link" href="DB-etudiant.php">
                                        database etudiants
                                    </a>

                                    <a class="nav-link" href="PJ.html">
                                        Pièces jointes
                                    </a>
                                </nav>
                            </div>
                            
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Database clients</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Cours en présentielle </div>
                            <div class="card-body">
                                <div class="table-responsive">
                             <?php 
                                if ($result->num_rows > 0) {
                             ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Responsable</th>
                                                <th>Statut</th>
                                                <th>Nom Complet</th>
                                                <th>Téléphone</th>
                                                <th>Mail</th>
                                                <th>Module</th>
                                                <th>Date buttoir</th>
                                                <th>Notes</th>
                                                <th>Attestation</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Responsable</th>
                                                <th>Statut</th>
                                                <th>Nom Complet</th>
                                                <th>Téléphone</th>
                                                <th>Mail</th>
                                                <th>Module</th>
                                                <th>Date buttoir</th>
                                                <th>Notes</th>
                                                <th>Attestation</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                         <?php 
                                            while($row = $result->fetch_assoc()) {
                                             
                                        ?>

                                             
                                            <tr>
                                                <td class ="resp" data-id="<?php echo $row["id"]; ?>">
                                                   <?php echo $row["responsable"]; ?>
                                                </td>
                                                <td data-id="<?php echo $row["id"]; ?>">
                                                    <label class="switch">
                                                        <?php if($row["status"]=="oui"){ ?>
                                                      <input class="statusCheck" type="checkbox" checked
                                                      >
                                                      <?php } else {?>
                                                      <input class="statusCheck" type="checkbox">
                                                  <?php } ?>
                                                      <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo $row["nomComplet"]; ?></td>
                                                <td><?php echo $row["tel"]; ?></td>
                                                <td><?php echo $row["mail"]; ?></td>
                                                <td><?php echo $row["module"]; ?></td>
                                                <td><?php echo $row["date"]; ?></td>
                                                <td class ="notes" data-id="<?php echo $row["id"]; ?>"><?php echo $row["notes"]; ?></td>
                                                <td data-id="<?php echo $row["id"]; ?>">
                                                    <label class="switch">
                                                        <?php if($row["attestation"]=="oui"){ ?>
                                                      <input class="checkedAttestation" type="checkbox" checked>
                                                      <?php } else { ?>
                                                         <input class="checkedAttestation" type="checkbox">       <?php } ?>                         <span class="slider round"></span>
                                                    </label>
                                                </td>
                                               <!--  <td>
                                                    <a href="updatePresentiel.php" class="fa fa-pen"></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="deletePresentiel.php" class="fa fa-trash-alt"></a>
                                                </td> -->
                                            </tr>
                                            <?php 
                                                  }//end while
                                    } else {
                                        echo "0 results";
                                            }
                                            $conn->close();
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modif">
                                <i class="fa fa-edit"></i>Modifier une information
                        </div>

                        <div class="remove">
                                <i class="fa fa-trash"></i>Supprimer une information
                        </div>

                        <div id="dialog-confirm" class="deleting-confirm">
                            <h2><center>Cours présentielle</center></h2>
                            <ul>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Responsable</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Resp</span>
                                    </div>
                                </li>
                                
                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Nom Complet</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Nom</span>
                                    </div>
                                </li>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Téléphone</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Tél</span>
                                    </div>
                                </li>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Mail</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Mail</span>
                                    </div>
                                </li>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Module</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Mod</span>
                                    </div>
                                </li>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Date buttoir</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">date</span>
                                    </div>
                                </li>

                                <li class="dialog-item">
                                    <div class="item-wrap">
                                        <span class="caisse-titre">Notes</span>
                                    </div>
                                    <div class="item-wrap">
                                        <span class="caisse-content">Noté</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
         
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/control.js"></script>
    </body>
</html>
