@extends('layouts.client.panel')

@section('content') 
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
            Create Bounty Program
            {{--<small>Optional description</small>--}}
        </h1>
</section>
<section class="content container-fluid">
	{{-- {!! Form::open(['route' => 'BountyController@storeBountyProgram', 'method' => 'POST']) !!} --}}
    {!! Form::open(['route' => 'client.store.program']) !!}
    {{csrf_field()}}
    	<div class="form-group">
    		{{Form::label('title', 'Program Title')}}
    		{{Form::text('title','',['class' => 'form-control', 'placeholder' => 'e.g - Example Enterprise Hack Party 2018'])}}
    	</div>
        <div class="form-group">
    		<!-- {{Form::label('category', 'Category :')}} -->
    		<!-- {{Form::text('category','',['class' => 'form-control', 'placeholder' => 'category'])}} -->
            {{Form::label('scope_description', 'Program Category')}}
            <div>
                <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->category_id }}">
                        {{ $category->name }}   
                    </option>
                @endforeach
                </select>
            </div>
    	</div>
    	<div class="form-group">
    		{{Form::label('test_target', 'Testing Target(s) - separate with commas (,)')}}
    		{{Form::text('test_targets','',['class' => 'form-control', 'placeholder' => 'e.g - example.com, *.example.com'])}}
    	</div>
        <!-- <div class="form-group">
            {{Form::label('source_code', 'Source Codes (optional)')}}
            {{Form::text('source_code','',['class' => 'form-control', 'placeholder' => 'Source Code Link'])}}
        </div> -->
    	<div class="form-group">
    		{{Form::label('scope_description', 'Scope Description')}}
    		{{Form::textarea('scope_description','',['class' => 'form-control', 'placeholder' => 'describe every subject or vulnerability domain (e.g - RCE, Broken Access) that you wish to be eligible for the bounties'])}}
    	</div>
        <!-- <div class="form-group">
            {{Form::label('deadline', 'Program Dateline')}}
            {{Form::date('deadline', \Carbon\Carbon::now())}}
        </div> -->
        <div class="form-group">
            {{Form::label('disclosure_allowance', 'Diclosure Policy')}}
            <div>
                <p><input type="radio" name="disclosureable" value="1"> Yes! hope the world can learn from us</p>
                <p><input type="radio" name="disclosureable" value="0"> No. We'll keep this private, it may be dangerous</p>
            </div>
        </div>
        <!-- <div class="form-group">
            {{Form::label('disclosure_description', 'Disclosure Description')}}
            {{Form::textarea('disclosure_description','',['class' => 'form-control', 'placeholder' => 'Disclosure Description'])}}
        </div> -->
		<!-- <div class="form-group">
			{{Form::label('up_since', 'Up Since')}}
			{{Form::date('up_since', \Carbon\Carbon::now())}}
		</div>
        <div class="form-group">
            {{Form::label('exclusion_description', 'Exclusion Description :')}}
            {{Form::textarea('exclusion_description','',['class' => 'form-control', 'placeholder' => 'Exclusion Description'])}}
        </div>
        <div class="form-group">
    		{{Form::label('rewards_tagline', 'Reward :')}}
		    {{Form::select('rewards_tagline',[
			    'Free' => ['merchandise' => 'Merchandise'],
			    'Paid' => ['money' => 'Money'],
			])}}
		</div>
        <div class="form-group">
            {{Form::label('reward_description', 'Reward Description :')}}
            {{Form::textarea('reward_description','',['class' => 'form-control', 'placeholder' => 'Reward Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('reward_amound', 'Money Reward:')}}
            {{Form::selectRange('reward_amount_range_start', 10, 20)}} -
            {{Form::selectRange('reward_amount_range_end', 10, 20)}}
        </div> -->
    	{{Form::submit('Proceed', ['class' => 'btn btn-primary'])}}
	{!! Form::close() !!}  
    </form>
</section>
@endsection