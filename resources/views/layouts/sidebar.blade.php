 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{url('/')}}" class="brand-link">
     <img src="{{ asset('/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Tijahrah24</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{ asset('/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">{{ Auth::user()->name}}</a>
       </div>
     </div>
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fas fas fa-user"></i>
             <p>
               Management
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('user.list')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>User List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('customer.list')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Customer List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('supplier.list')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Supplier List</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fas fas fa-user"></i>
             <p>
               Master Setup
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('producttype.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Product Type List</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('barcodesymbolgy.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Barcode Symbol List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('add.brand')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Brand List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('category.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Category List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('productunit.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Product Unit List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('purchaseunit.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Purchase Unit List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('saleunit.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Sale Unit List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('taxmethod.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Tax Method</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('warehouse.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Ware House</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('parchasestatus.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Purchase Status</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('ordertax.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Order Tax</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fas fas fa-user"></i>
             <p>
               Product
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('products.list')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Product List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{route('add.product')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Product</p>
               </a>
             </li>

           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fas fas fa-user"></i>
             <p>
               Purchase
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('purchase.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Purchase List</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('purchase.add')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Purchase</p>
               </a>
             </li>
           </ul>

         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fas fas fa-user"></i>
             <p>
               Sale
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{route('sale.view')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Sale List</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="{{route('add.sale')}}" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Sale</p>
               </a>
             </li>
           </ul>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>