<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		$id = '';
	}
	$sql_chitiet = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'"); 
?>










<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
	                <li>Chi tiết sản phẩm </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<?php
	while($row_chitiet = mysqli_fetch_array($sql_chitiet)){ 
	?>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
		
				<img src="images/<?php echo $row_chitiet['sanpham_image'] ?>" style="width: 500px;height: 500px" >

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['sanpham_name'] ?></h3>
					<p class="mb-3">
						<p>Gía từ : <del class="mx-2 font-weight-light"><?php echo number_format($row_chitiet['sanpham_gia']).'vnđ' ?></del> </p>
						
						<p>Gỉam còn : <span class="item_price"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']).'vnđ' ?></span> </p>
						
						<br></br>
						<label>Miễn phí vận chuyển</label>
					</p>
					
					<div class="product-single-w3l">
						<p><?php echo $row_chitiet['sanpham_chitiet'] ?></p><br><br>
						<p><?php echo $row_chitiet['sanpham_mota'] ?></p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?quanly=giohang" method="post">
								<fieldset>
									<input type="hidden" name="tensanpham" value="<?php echo $row_chitiet['sanpham_name'] ?>" />
									<input type="hidden" name="sanpham_id" value="<?php echo $row_chitiet['sanpham_id'] ?>" />
									<input type="hidden" name="giasanpham" value="<?php echo $row_chitiet['sanpham_gia'] ?>" />
									<input type="hidden" name="hinhanh" value="<?php echo $row_chitiet['sanpham_image'] ?>" />
									<input type="hidden" name="soluong" value="1" />			
									<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" style=" background-image:linear-gradient(to right, #8d2bca , #740476);"/>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Single Page -->
	<?php
	} 
	?>