<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style_dashboard.css" />
    <!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stylesdash.css" /> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donation_list.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  
  <body>
    <!--navigation bar left-->
    <?php require APPROOT.'/views/inc/side_navbar_donor.php';?>
    <!--navigation bar left end-->

    <!--home section start-->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"><?php echo $data['title']; ?></span>
        </div>
        
        <div class="profile-details">
          <div class="notification">
            <i class="bx bx-bell bx-tada notification"></i>
          </div>
          
            <a href="<?php echo URLROOT; ?>/pages/profileDonor"><img src="<?php echo URLROOT; ?>/img/<?php echo $data['prof_img'];  ?>" alt="" /></a>
          <!-- <span class="admin_name"><a style="text-decoration: none; color: black" href="change_password.php">Profile</a></span> -->
          <!-- <i class='bx bx-chevron-down'></i> -->
        </div>
      </nav>
      <div class="main-container">
      
        
        <div class="filters">        
         <!-- <div class="select-menu">
            <h4>Filter By : Donation Catagory</h4>
            <div class="select-btn">
                <span class="sBtn-text">Select a Donation Category</span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options">
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/1" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text">Financial Donations</span>
                    </li>
                </a>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/0" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text">Non-Financial Donations</span>
                    </li>
                </a>
                <?php foreach($data['categories'] as $category ): ?>
                <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/<?php echo $category -> id;?>" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text"><?php echo $category -> category_name;?></span>
                    </li>
                </a>
                <?php endforeach; ?>
                
            </ul>
                </div> -->
            <!-- //item filter -->
            <div class="select-menu item-menu">
            <h4>Filter By : Item Requested</h4>
            <div class="select-btn status-btn">
                <span class="sBtn-text status_Btn-text"><?php echo $data['item_title'] ?></span>
                <i class="bx bx-chevron-down"></i>
            </div>

            <ul class="options status_options">
            <a href="<?php echo URLROOT;?>/pages/donationRequestsDonor" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text">All</span>
                    </li>
                </a>
                
            <a href="<?php echo URLROOT;?>/donor/filteredRequestDonor/1" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text">Money</span>
                    </li>
                </a>
                <?php foreach($data['items'] as $item ): ?>
                <a href="<?php echo URLROOT;?>/donor/filterRequestsByItem/<?php echo $item -> item;?>" style="text-decoration:none">
                    <li class="option">
                        <span class="option-text"><?php echo $item -> item;?></span>
                    </li>
                </a>
                <?php endforeach; ?>
                
            </ul>
        </div>
        </div>  <!-- eo filters -->
                </div>
            <div class="gigcontainer">

            <div class="box nothing_to_display" >
                    
                    <div class="easy">
                        
                        <p>There are no nearby donation requests to display at the moment</p>
                        <p><b>Please refresh the page to view all donation requests</b> </p>
                        <div class="btns">
                            <!-- <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a> -->
                            
                            <button id="refresh" onclick="refresh()">Refresh</button>
                        </div>                   
                    </div>
                </div>

            <?php foreach($data['records'] as $requests ): ?>
            
                <div class="box <?php echo $requests->zipcode;  ?>" >
                    <div class="image">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $requests->thumbnail;  ?>">
                    </div>
                    <div class="easy">
                        <div class="name_job"><?php echo $requests->request_title;  ?></div>
                        <p><b>Published Date : </b><?php echo $requests->published_date;  ?> <span  <?php if(($requests->days_left) > 0 && ($requests->days_left) < 7){ ?> style="color:red;"<?php } ?>><b>Due Date : </b><?php echo $requests->due_date;  ?></span></p>
                        <p><b>Catagory :</b> <?php echo $requests->category_name;  ?> 
                        <?php if($requests-> req_type == 0 ){ 
                            foreach($data['non_financials'] as $nfinancials ): 
                                if($requests->id == $nfinancials->req_id){ 
                                    $item = $nfinancials->item;
                         } 
                         endforeach; 
                         ?> 
                         <b>Item Requested : </b><?php echo $item;  ?> <!-- <p>Item is only for non-financials</p> -->
                         <?php } ?></p> 
                        
                         <p><?php echo $requests->description;  ?>
                        </p>
                        <?php if($requests->cat_id >1){ ?>
                       
                            <?php foreach($data['non_financials'] as $nfinancials ): ?>
                                <?php if($requests->id == $nfinancials->req_id){ ?>
                        <div class="skill-box">
                       
                            <span class="title"> <?php echo $nfinancials->received_quantity ; ?> raised out of <?php  echo $nfinancials->quantity;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($nfinancials->received_quantity * 100) / $nfinancials->quantity);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
                            <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>"><button>Donate</button></a>
                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                        <?php } else{ ?>
                            <?php foreach($data['financials'] as $financials ): ?>
                                <?php if($requests->id == $financials->req_id){ ?>
                        <div class="skill-box">
                            <span class="title">Rs.<?php echo $financials->received_amount ;  ?> raised out of Rs.<?php echo $financials->total_amount;  ?></span>
                            <div class="skill-bar">
                            <?php $percentage = (($financials->received_amount * 100) / $financials->total_amount);  ?>
                                <span class="skill-per" style ="width:<?php echo $percentage ;  ?>%;"></span>
                                
                            </div>
                        </div>
                        <div class="btns">
                            <a href="<?php echo URLROOT;?>/donor/viewmoreRequestDonor/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>" ><button>View More</button></a>
                            
                            <a href="<?php echo URLROOT;?>/donor/donate/<?php echo $requests->id;  ?>/<?php echo $requests->cat_id;  ?>"><button >Donate</button></a>
                           

                        </div>
                        <?php   } ?>
                        <?php endforeach; ?>
                         <?php } ?>
                        
                           
                        
                    </div>
                </div>
                <?php endforeach; ?>
               
            </div>

        </div>

    </section>
    <!--home section end-->
    <script src="https://js.stripe.com/v3/"></script>
    <script>

const itemsMenu = document.querySelector(".item-menu"),
  itemBtn = itemsMenu.querySelector(".status-btn"),
      statusOptions = itemsMenu.querySelectorAll(".status_option"),
      status_Btn_text = itemsMenu.querySelector(".status_Btn-text");

  itemBtn.addEventListener("click", () => itemsMenu.classList.toggle("active"));

  statusOptions.forEach(option => {
      option.addEventListener("click", () => {
          let selectedOption = option.querySelector(".status-option-text").innerText;
          status_Btn_text.innerText = selectedOption;

          statusMenu.classList.remove("active");
      });
  });
        
      // js for drop down list 
    //    const optionMenu = document.querySelector(".select-menu"),
    //         selectBtn = optionMenu.querySelector(".select-btn"),
    //         options = optionMenu.querySelectorAll(".option"),
    //         sBtn_text = optionMenu.querySelector(".sBtn-text");

    //     selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

    //     options.forEach(option => {
    //         option.addEventListener("click", () => {
    //             let selectedOption = option.querySelector(".option-text").innerText;
    //             sBtn_text.innerText = selectedOption;

    //             optionMenu.classList.remove("active");
    //         });
    //     });
        
    //     function refresh() {
    //         location.reload();
    //     }
    
       
   
        
        let userZip = <?php echo $data['user'];  ?>;
    </script>
    <script src="<?php echo URLROOT; ?>/js/toggle.js"></script>
  </body>
</html>