<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('adminbackend/assets/images/valerie.jpg') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

			<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Product Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
						</li>
						<li> <a href="{{ route('add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
						</li>
						<li> <a href="{{ route('add.brand') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
						</li>
						<li> <a href="{{ route('add.category') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
						</li>

					</ul>
				</li>
				

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Sub Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
						</li>
						<li> <a href="{{ route('add.subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Add SubCategory</a>
						</li>

					</ul>
				</li>


<li>
<a href="javascript:;" class="has-arrow">
	<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
	<div class="menu-title">Slider Manage</div>
					</a>
					<ul>
	<li> <a href="{{ route('all.slider') }}"><i class="bx bx-right-arrow-alt"></i>All Slider</a>
						</li>
	<li> <a href="{{ route('add.slider') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
</ul>
	</li>


	<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Banner Manage</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.banner') }}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
						</li>
						<li> <a href="{{ route('add.banner') }}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
						</li>

					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Deliver Area</div>
					</a>
					<ul>
					<li> <a href="{{ route('all.region') }}"><i class="bx bx-right-arrow-alt"></i>All Regions</a>
						</li>
						<li> <a href="{{ route('all.township') }}"><i class="bx bx-right-arrow-alt"></i>All Wards</a>
						</li>
						<li> <a href="{{ route('all.ward') }}"><i class="bx bx-right-arrow-alt"></i>All Townships</a>
						</li>

					</ul>
				</li>


	
	

				<li class="menu-label">Tracking</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Order Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending Order</a>
						</li>
						<li> <a href="{{ route('confirm.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirm Order</a>
						</li>
						<li> <a href="{{ route('process.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing Order</a>
						</li>
						<li> <a href="{{ route('deliver.order') }}"><i class="bx bx-right-arrow-alt"></i>Deliver Order</a>
						</li>
						<li> <a href="{{ route('cancel.order') }}"><i class="bx bx-right-arrow-alt"></i>Cancel Order</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Return Order </div>
					</a>
					<ul>
						<li> <a href="{{ route('return.request') }}"><i class="bx bx-right-arrow-alt"></i>Return Request</a>
						</li>
						<li> <a href="{{ route('complete.return.request') }}"><i class="bx bx-right-arrow-alt"></i>Complete Request</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Reports Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('report.view') }}"><i class="bx bx-right-arrow-alt"></i>Report View</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Stocks Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('product.stock') }}"><i class="bx bx-right-arrow-alt"></i>Product Stock</a>
						</li>
						
					</ul>
				</li>
				

				
				



				
			</ul>
			<!--end navigation-->
		</div>