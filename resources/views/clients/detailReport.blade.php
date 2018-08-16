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
                <b><h3 class="box-title">Bug Bounty Program:</h3></b>
                <h2>{{$bounty_program->title}}</h2>
            </div>
            <div class="box-header">
              <h3 class="box-title">Report's Detail</h3>
            </div>
            <div class="box-body">

              <div class="form-group">
                <label>Title:</label><br>
                {{$report->title}}
              </div>
              <div class="form-group">
                <label>Description:</label><br>
                {{$report->description}}
              </div>
              <div class="form-group">
                  <label>Submitted at:</label><br>
                  {{$report->submitted_datetime}}
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label>Report Download:</label><br>
                  <a href="{{$report->stored_report_path}}" class="btn btn-sm btn-default btn-flat pull-left">Download</a>
                </div>
              </div><br>
              @if($report->is_approved_as_bug == 1)
              <div class="form-group">
                <label>Click to set as Reviewed :</label>
                <div class="btn-group">
                    <a href="{{ route('client.reviewedSub') }}">
                      <button type="button" class="btn btn-warning">Reviewed</button>
                    </a>
                </div>
              </div>
              @elseif($report->is_approved_as_bug == 2)
                    <div class="form-group">
                      <label>Choose your action with the report submission : </label>
                        <select name="action" class="form-control">
                            <option selected disabled hidden>Choose One</option>
                            <option value="1">Accept</option>
                            <option value="2">Decline</option>
                        </select>
                    </div>
                    <div class="form-group" id="accept-section">
                    {!! Form::open(['route' => 'client.pay.reward', 'method' => 'post']) !!}
                    {{csrf_field()}}
                    @if($bounty_program->is_paid_reward == 1)
                      {{Form::label('set-reward', 'Set Reward')}}
                      <div class="form-group" id="minimum">
                        Your Bounty's reward range : Rp. {{$bounty_program->minimum_reward}} - {{$bounty_program->maximum_reward}} 
                        <label hidden class="control-label" for="minimum-reward"><i class="fa fa-times-circle-o"></i> Halt! </label>
                        <div class="input-group">
                          <span class="input-group-addon">Rp. </span>
                        <input type="number" name="paid_reward" id="minimum-reward" class="form-control" placeholder="{{$bounty_program->minimum_reward}} - {{$bounty_program->maximum_reward}}">
                        </div>
                      </div>
                    <div class="form-group">
                    @else
                      <div class="form-group">
                        <label>Reward Description : </label>
                        {{$bounty_program->rewards_description}}
                      </div>
                    @endif
                    {{Form::label('password', 'Password')}}
                    {{Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Please retype your password for confirmation'])}}
                    </div>
                    {{Form::submit('Pay Reward', ['class' => 'btn btn-primary', 'id' => 'pay-button'])}}
                    {!! Form::close() !!}  
                    </div>

                    <div class="form-group" id="decline-section">
                        <div class="btn-group">
                            <a href="{{ route('client.declineSub') }}">
                              <button type="button" class="btn btn-danger">Decline</button>
                            </a>
                        </div>
                    </div>
              @endif
              
            
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      
      
      <script>
        $('#accept-section').hide();
        $('#decline-section').hide();
        $('#pay-button').hide();
        $(document).ready(function() {
            $('select').on('change', function() { 
                switch(this.value) {
                    case '1':
                        $('#accept-section').show(100);
                        $('#pay-button').show(100);
                        $('#decline-section').hide();
                        $('#maximum-reward').blur(function() {
                        if(this.value > {{ Auth::guard('client')->user()->balance }}) {
                            $('#maximum').addClass('has-error');
                            $('#maximum-error').text("Sorry, your balance is not enough");
                            $('.btn').attr("disabled", "disabled")
                            $('#password').attr("disabled", "disabled")
                        }
                        else {
                            $('#maximum').removeClass('has-error');
                            $('#maximum-error').text("");
                            $('.btn').removeAttr("disabled");          
                            $('#password').removeAttr("disabled");          
                        }
                        });
                    break;
                    default:
                        $('#decline-section').show(100);
                        $('#accept-section').hide();
                        $('#pay-button').hide();
                    break;
                }
            });
        });
        </script>
    </section>
    @endsection