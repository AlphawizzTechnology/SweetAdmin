<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?php echo base_url($this->config->item("new_theme")."/assets/img/sidebar-1.jpg"); ?> ">
    <!--
    Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
    Tip 2: you can also add an image using data-image tag
    Tip 3: you can change the color of the sidebar with data-background-color="white | black"-->
    <div class="logo">
        <a href="/" class="simple-text">
            Ganguram
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="https://demo.gogrocer.app" class="simple-text">
            GG
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <?php 
                    $z = _get_current_user_id($this);
                    $img=$this->db->query("SELECT * FROM `users` where user_id='".$z."' ") ;
                    $image= $img->result();
                    //echo $z;
                    foreach($image as $row){
                ?>
                <img src="<?php echo $this->config->item('base_url').'/uploads/profile/'.$row->user_image ?>" />
                <?php } ?>
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <?php echo ""._get_current_user_name($this)."" ; ?>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav active">
                        <!--li>
                            <a href="#">My Profile</a>
                        </li-->
                        <li>
                            <a href="<?php echo site_url("users/edit_user/"._get_current_user_id($this)); ?>" >Edit Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("admin/signout") ?>" >Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
                <a href="<?php echo site_url("admin/dashboard"); ?>">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="registers"){echo "active";}?>">
                <a href="<?php echo site_url("admin/registers"); ?>">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>App Users</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="listcategories"){echo "active";}?>">
                <a href="<?php echo site_url("admin/listcategories"); ?>">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <p>Categories</p>
                </a>
            </li>
            <!-- <li class="">
                <a href="<?php echo site_url("admin/socity"); ?>">
                    <i class="material-icons"> Society</i>
                    <p>Society</p>
                </a>
            </li> -->
            <li class="<?php if($this->uri->segment(2)=="products"){echo "active";}?>">
                <a href="<?php echo site_url("admin/products"); ?>">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    <p>Products</p>
                </a>
            </li>
            <!-- <li>
                <a data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">Delivery</i>
                    <p>Delivery Schedule Hours
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="<?php if($this->uri->segment(2)=="time_slot"){echo "active";}?>">
                            <a href="<?php echo site_url("admin/time_slot"); ?>"> Time Slot</a>
                        </li>
                        <li class="<?php if($this->uri->segment(2)=="closing_hours"){echo "active";}?>">
                            <a href="<?php echo site_url("admin/closing_hours"); ?>"> Closing Hours</a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <li class="<?php if($this->uri->segment(2)=="add_purchase"){echo "active";}?>">
                <a href="<?php echo site_url("admin/add_purchase"); ?>">
                    <i class="material-icons">S</i>
                    <p>Stock Update</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="orders"){echo "active";}?>">
                <a href="<?php echo site_url("admin/orders"); ?>">
                    <i class="fa fa-first-order" aria-hidden="true"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#StoreManagement">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <p>Store Management
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="StoreManagement">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo site_url("users"); ?>"> List Store Users</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="<?php if($this->uri->segment(2)=="allpageapp"){echo "active";}?>">
                <a data-toggle="collapse" href="#Pages">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <p>Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="Pages">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo site_url("admin/allpageapp"); ?>"> List</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- <li class="">
                <a href="<?php echo site_url("admin/declared_rewards"); ?>">
                    <i class="material-icons"> Orders</i>
                    <p>Declared Reward Value</p>
                </a>
            </li>
            <li class="<?php if($this->uri->segment(2)=="setting"){echo "active";}?>">
                <a href="<?php echo site_url("admin/setting"); ?>">
                    <i class="material-icons"> Orders</i>
                    <p>Order Limit Setting</p>
                </a>
            </li> -->
            <li class="<?php if($this->uri->segment(2)=="stock"){echo "active";}?>">
                <a href="<?php echo site_url("admin/stock"); ?>">
                    <i class="fa fa-sort" aria-hidden="true"></i>
                    <p>Stock</p>
                </a>
            </li>
            <!-- <li class="">
                <a href="<?php echo site_url("admin/notification"); ?>">
                    <i class="material-icons"> Orders</i>
                    <p>Notification</p>
                </a>
            </li> -->
            <!-- <li>
                <a data-toggle="collapse" href="#Slider">
                    <i class="material-icons">image</i>
                    <p>Slider
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="Slider">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo site_url("admin/listslider"); ?>">Main Slider</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("admin/banner"); ?>">Secondery Slider</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url("admin/feature_banner"); ?>">Feature Brand Slider</a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <li class="<?php if($this->uri->segment(2)=="coupons"){echo "active";}?>">
                <a href="<?php echo site_url("admin/coupons"); ?>">
                    <i class="material-icons">timeline</i>
                    <p>Coupons</p>
                </a>
            </li>

            <li >
                <a href="<?php echo site_url("admin/offers"); ?>">
                    <i class="material-icons">timeline</i>
                    <p>Offers</p>
                </a>
            </li>

            <li >
                <a href="<?php echo site_url("admin/Product_reviews"); ?>">
                    <i class="material-icons">timeline</i>
                    <p>User Comments</p>
                </a>
            </li>
            <!-- <li>
                <a href="<?php echo site_url("admin/dealofday"); ?>">
                    <i class="material-icons">date_range</i>
                    <p>Deal Products</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url("admin/help"); ?>">
                    <i class="material-icons">date_range</i>
                    <p>Raise a Ticket</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>