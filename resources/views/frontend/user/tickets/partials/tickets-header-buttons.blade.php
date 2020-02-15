<!--Action Button-->
@if( Active::checkUriPattern( 'admin/tickets' ) )
    <div class="btn-group">
        <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">Export
            <span class="caret d-none"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li id="copyButton"><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
            <li id="csvButton"><a href="#"><i class="fa fa-file-text-o"></i> CSV</a></li>
            <li id="excelButton"><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
            <li id="pdfButton"><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
            <li id="printButton"><a href="#"><i class="fa fa-print"></i> Print</a></li>
        </ul>
    </div>
@endif
<!--Action Button-->
<div class="btn-group">
    <!--<button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action-->
    <button type="button" class="sent-btn dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret d-none"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'frontend.user.tickets.index' ) }}">
                <i class="fa fa-list-ul"></i> {{ trans( 'menus.backend.tickets.all' ) }}
            </a>
        </li>
        
            <li>
                <a href="{{ route( 'frontend.user.tickets.create' ) }}">
                    <i class="fa fa-plus"></i> {{ trans( 'menus.backend.tickets.create' ) }}
                </a>
            </li>
       
    </ul>
</div>
<div class="clearfix"></div>
