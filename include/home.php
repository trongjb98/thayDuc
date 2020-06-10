<?php 
		$sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
	?>

    <!--thanh lướt sp -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                  
		                       	<?php
									$sql_product_sidebar = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_hot='0' ORDER BY sanpham_id DESC"); 
									while($row_sanpham_sidebar = mysqli_fetch_array($sql_product_sidebar)){
									?>
									  <div class="col-lg-3" style="background-color:white">

                               <div class="categories__item set-bg"  >
                               	<img src="images/<?php echo $row_sanpham_sidebar['sanpham_image'] ?>"style="height: 200px;width:250px" style="border :10px">
                                       <h5>
                                       	<a href="" style="width: auto;font-size: 14px ;border-radius: 10px ;margin-bottom: 10px ;background-image:linear-gradient(to right, #a58ab5  , #f978fb);" >
                                       		<?php echo $row_sanpham_sidebar['sanpham_name'] ?>
                                       		<?php echo number_format($row_sanpham_sidebar['sanpham_giakhuyenmai']).'vnđ' ?>
                                       	</a>
                                       </h5>
                                 </div>
                                </div>
									<?php
									} 
							  ?>

      
                   
                </div>
            </div>
        </div>
    </section>
    <!--thanh lướt sp -->



<!-- top Products -->
	<!-- Featured Phần thân chính -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Mặt hàng </h2>
                    </div>
               
                </div>
            </div>
            <div class="row featured__filter">
                       <?php
						$sql_cate_home = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
						while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
							$id_category = $row_cate_home['category_id'];
						?>
						<!--table 1 -->

                           <?php
								$sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC");
								while($row_sanpham = mysqli_fetch_array($sql_product))
								{ 
									if($row_sanpham['category_id']== $id_category)
									{
								?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix a_<?php echo $row_sanpham['category_id'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="images/<?php echo $row_sanpham['sanpham_image'] ?>">
                            <ul class="featured__item__pic__hover">

                                <li>
                                     <form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />	
													
													<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="btn btn-success"  style="background-color: #7d1294" />
												</fieldset>
                                		
                                	</form>
                                
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a></h6>
                           <h5><del><?php echo number_format($row_sanpham['sanpham_gia']).'  vnđ' ?></del></h5> 
                         <span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' ?></span>
                        </div>
                    </div>
                </div>
                 	<?php
						}
					} 
				?>
<!--table 1 -->

					<?php
							} 
							?>
	
            </div>
        </div>
    </section>
	<!-- //top products -->
