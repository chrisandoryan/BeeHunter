@extends('layouts.client.panel')

@section('content')
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <!-- <i class="fa fa-globe"></i> AdminLTE, Inc.
            <small class="pull-right">Date: 2/10/2014</small> -->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      

      

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report's Detail</h3>
            </div>
            <div class="box-body">

              <div class="form-group">
                <label>Title:</label><br>
                asdfasd
              </div>
              <div class="form-group">
                <label>Description:</label>

                
              </div>
              <div class="form-group">
                <label>Report Download:</label><br>
                <a href="" class="btn btn-sm btn-default btn-flat pull-left">Download</a>
              </div>
              
            
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <form action=""
      <div class="row no-print">
        <div class="col-xs-12">
          
          <a href="">
          <button type="button" class="btn btn-success pull-left"><i class="fa fa-credit-card"></i> Accept
          </button>
          </a>
          <button type="button" class="btn btn-primary pull-left" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Decline
          </button>
        </div>
      </div>
    </section>
    @endsection