@extends('layouts.client.panel')

@section('content') 
@includeWhen($errors->any(), 'layouts.error', $errors->all())
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
            Set Program Rewards
            {{--<small>Optional description</small>--}}
        </h1>
</section>
<section class="content container-fluid">
    {!! Form::open(['route' => 'client.store.reward']) !!}
    {{csrf_field()}}
        <div class="form-group">
    		<!-- {{Form::label('category', 'Category :')}} -->
    		<!-- {{Form::text('category','',['class' => 'form-control', 'placeholder' => 'category'])}} -->
            {{Form::label('program-reward-method', 'Reward Type')}}
            <div>
                <select name="reward_type" class="form-control">
                    <option selected disabled hidden>Choose One</option>
                    <option value="1">Payment</option>
                    <option value="2">Non-Payment</option>
                    <option value="3">Voluntary Program</option>
                </select>
            </div>
    	</div>
        <div class="form-group" id="payment-section">
            {{Form::label('minimum-reward', 'Minimum Reward')}}
            <div class="form-group" id="minimum">
                <label hidden class="control-label" for="minimum-reward"><i class="fa fa-times-circle-o"></i> Halt! </label>
                <div class="input-group">
                    <span class="input-group-addon">Rp. </span>
                    <input type="text" name="min_reward" id="minimum-reward" class="form-control">
                </div>
            </div>
            {{Form::label('maximum-reward', 'Maximum Reward')}}
            <div class="form-group" id="maximum">
                <label hidden class="control-label" for="maximum-reward"><i class="fa fa-times-circle-o"></i> Halt! </label>
                <div class="input-group">
                    <span class="input-group-addon">Rp. </span>
                    <input type="text" name="max_reward" id="maximum-reward" class="form-control">
                </div>
                <span class="help-block" id="maximum-error"></span>
            </div>
        </div>
        <div class="form-group" id="nonpayment-section">
            <div class="form-group">
                {{Form::label('reward_description', 'Reward Description')}}
                {{Form::textarea('reward_description','',['class' => 'form-control', 'placeholder' => 'describe what kind of unpaid benefits the participant would receive by testing your application'])}}
            </div>
        </div>
        <div class="form-group">
    		{{Form::label('password', 'Password')}}
    		{{Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Please retype your password for confirmation'])}}
    	</div>
    	{{Form::submit('Set Reward', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}  
    </form>
    <script>
    $('#payment-section').hide();
    $('#nonpayment-section').hide();
    $(document).ready(function() {
        $('select').on('change', function() { 
            switch(this.value) {
                case '1':
                    $('#payment-section').show(100);
                    $('#nonpayment-section').hide();
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
                    $('#nonpayment-section').show(100);
                    $('#payment-section').hide();
                break;
            }
        });
    });
    </script>
</section>
@endsection